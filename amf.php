<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php teacher_confirm_logged_in(); ?>
<?php
function add_grades($subject,$school_year,$midterm_grade,$finalterm_grade,$sem_grade,$id_student,$id_teacher)
{

    $query = "INSERT INTO tblgrades(subject,school_year,midterm_grade,finalterm_grade,sem_grade,id_student,id_teacher)
    VALUES  ('$subject','$school_year','$midterm_grade','$finalterm_grade','$sem_grade','$id_student','$id_teacher')";
    $result = @mysql_query($query);
                
}
function edit_grades($id_grades,$subject,$school_year,$midterm_grade,$finalterm_grade,$sem_grade,$id_student,$id_teacher)
{

    $query = "UPDATE tblgrades SET 
        subject = '$subject',
        school_year = '$school_year',
        midterm_grade = '$midterm_grade',
        finalterm_grade = '$finalterm_grade',
        sem_grade = '$sem_grade',
        id_student = '$id_student',
        id_teacher = '$id_teacher'
        WHERE id_grades = '$id_grades'";    
    $result = @mysql_query($query);
                
}

if(isset($_POST['submit']))
{
    if(isset($_POST['id_teacher'])){ $id_teacher = $_POST['id_teacher']; } else { $id_teacher = "";}
    if(isset($_POST['id_student'])){ $id_student = $_POST['id_student']; } else { $id_student = "";}
    if(isset($_POST['id_grades'])){ $id_grades = $_POST['id_grades']; } else { $id_grades = "";}
    if(isset($_POST['school_year'])){ $school_year = $_POST['school_year']; } else { $school_year = "";}
    if(isset($_POST['finalterm'])){ $finalterm_grade = $_POST['finalterm']; } else { $finalterm_grade = "";}
    if(isset($_POST['midterm'])){ $midterm_grade = $_POST['midterm']; } else { $midterm_grade = "";}
    if($_POST['id_grades'] != '')
    {
        $sem_grade = ($finalterm_grade+ $midterm_grade)/2;      
        edit_grades($_POST['id_grades'],$id_subject,$school_year,$midterm_grade,$finalterm_grade,$sem_grade,$id_student,$id_teacher);
    }
    else
    {
        if(!empty($_POST['midterm']))
        {
            $sem_grade = ($finalterm_grade+ $midterm_grade)/2;
            add_grades($id_subject,$school_year,$midterm_grade,$finalterm_grade,$sem_grade,$id_student,$id_teacher);        
        }
    }
}

?>
<?php require_once("header.php");?>     

<div id="content">
<h3 style="font-family: Harlow Solid Italic;"><center>My Students</center></h3>                               
    Records:
<?php
    $id = $_SESSION['teacher_id'];
    $query = "SELECT id_sem_sched,subject,section,course_year,course,teacher FROM tblsem_sched WHERE teacher ='$id'";
    $result = @mysql_query($query);
    $a = 1;
    while($row = mysql_fetch_array($result))
    {
        
        $section = "section".$a;
        $subject = $row['subject'];
        $query2 = "SELECT subject_desc,id_subject FROM tblsubject WHERE id_subject ='$subject'";
        $result2 = @mysql_query($query2);
        $row2 = mysql_fetch_array($result2);    
        if($row['course'] == "BS Information Technology major in Service Management"){$course = "ITSM";}

        echo "<a href='#".$section."' data-role='button'>".$row2['subject_desc'].' '.$row['course_year'].'-'.$row['section'].$course."</a>";
        $a++;
    }

   
?>
</div>
<?php
   
    $query = "SELECT id_sem_sched,subject,section,course_year,course,teacher FROM tblsem_sched WHERE teacher ='$id'";
    $result = @mysql_query($query);
    $c = 1;
    while($row = mysql_fetch_array($result))
    {
        
        $section2 = "section".$c;
        $subject = $row['subject'];
        $query2 = "SELECT subject_desc,id_subject FROM tblsubject WHERE id_subject ='$subject'";
        $result2 = @mysql_query($query2);
        $row2 = mysql_fetch_array($result2);    
        $id_sem_sched = $row['id_sem_sched'];
        $id_subject = $row2['id_subject'];
        $section = $row['section'];
        $course_year = $row['course_year'];
        $course = $row['course'];
        $id_teacher = $row['teacher'];

        if($course_year == 1){ $course_year = 'first';}
        if($course_year == 2){ $course_year = 'second';}
        if($course_year == 3){ $course_year = 'third';}
        if($course_year == 4){ $course_year = 'fourth';}       
        $c++;
   
        echo '<div id="'.$section2.'">
        <!-- Overview panel -->
        <div id="panel-overview">';
        echo "<h3>".$subject.' '.$section2."</h3>";
        echo '<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">';
        echo ' <thead>';
        echo '  <th>#</th>';
        echo '  <th>Student No</th>';
        echo '  <th>Name</th>';
        echo '  <th>Midterm Grade</th>';
        echo '  <th>Finalterm Grade</th>';
        echo '  <th>Sem. Grade</th>';
        echo '  <th></th>';
        echo '  </thead>';
        echo '<tbody>';
            $query3 = "SELECT * FROM tblstudent WHERE course = '$course' AND section = '$section' AND yr = '$course_year'";
            $result3 = @mysql_query($query3);
            $b = 1;
            while($row3 = mysql_fetch_array($result3))
            {       
                $query4 = "SELECT * FROM tblsem_sched WHERE id_sem_sched = '$id_sem_sched'";
                $result4 = @mysql_query($query4);
                $row4 = mysql_fetch_array($result4);
                $subject = $row4['subject'];

                if(isset($row4['teacher']))   { $id_teacher = $row4['teacher'];} else{ $id_teacher = "";}
                if(isset($row4['school_year']))   { $school_year = $row4['school_year'];} else{ $school_year = "";}
                if(isset($row3['id_student']))   { $id_student = $row3['id_student'];} else{ $id_student = "";}

                $query5= "SELECT * FROM tblgrades WHERE id_student = '$id_student' AND school_year = '$school_year' AND subject='$subject'";
                $result5 = @mysql_query($query5);
                $row5 = mysql_fetch_array($result5);


                if(isset($row5['id_grades']))   { $id_grades = $row5['id_grades'];} else{ $id_grades = "";}
                if(isset($row5['finalterm_grade']))   { $finalterm = $row5['finalterm_grade'];} else{ $finalterm = "";}
                if(isset($row5['midterm_grade']))   { $midterm = $row5['midterm_grade'];} else{ $midterm = "";}
                

                echo "<tr>";
                echo "<td>".$b++."</td>";
                echo "      <td>".$row3['student_no']."</td>";
                echo "      <td>".strtoupper($row3['lastname']).', '.strtoupper($row3['firstname'])."</td>";

                echo "<form method='post'>";
                echo "      <td><input type='number' name='midterm' value='".$midterm."'></td>"; 
                echo "      <td><input type='number' name='finalterm' value='".$finalterm."'></td>";
                echo "<td>
                        ".(($midterm+$finalterm)/2)."
                        <input type='hidden' name='id_student' value='".$id_student."'>
                        <input type='hidden' name='id_grades' value='".$id_grades."'>
                        <input type='hidden' name='id_teacher' value='".$id_teacher."'>
                        <input type='hidden' name='school_year' value='".$school_year."'>
                    </td>";
                echo "      <td>";
                echo "          <button type='submit' name='submit' data-role='button' id='sub'>Record</button>";
                echo "</form>";
                echo "      </td>"; 
                echo "</tr>";

            }
        
        echo '</tbody>';
echo '</table>';

        echo'  <h3 class="Header" id="something">Edit about yourself...</h3>
          <a href="#page" class="Prev" id="this"></a>
      </div>
    </div>
';
    }

?>
<?php



?>

        </div>
    </body>
</html>
        <script type="text/javascript" src="../js/jquery.js"></script>      
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/hammer.js/1.0.5/jquery.hammer.min.js"></script>
        <script type="text/javascript" src="../js/jquery.mmenu.min.all.js"></script>
        <script type="text/javascript">
            $(function() {

                var $menu = $('nav#menu-right');

                $menu.mmenu({
                    position    : 'right',
                    classes     : 'mm-light',
                    dragOpen    : true,
                    counters    : true,
                    searchfield : true,
                    labels      : {
                        fixed       : !$.mmenu.support.touch
                    },
                    header      : {
                        add         : true,
                        update      : true,
                        title       : 'Contacts'
                    }
                });
            });
            $(function() {
                $('nav#menu').mmenu({
                    position    : 'left',
                    classes     : 'mm-light',
                    dragOpen    : true                  
                });

                $('div#aboutme').mmenu({
                    classes     : 'mm-fullscreen mm-light',
                    position    : 'right',
                    zposition   : 'front',
                    header      : true
                });
                $('div#third').mmenu({
                    classes     : 'mm-fullscreen mm-light',
                    position    : 'right',
                    zposition   : 'front',
                    header      : true
                });
                $('div#myschedule').mmenu({
                    classes     : 'mm-fullscreen mm-light',
                    position    : 'right',
                    zposition   : 'front',
                    header      : true
                });
                $('div#addsched').mmenu({
                    classes     : 'mm-fullscreen mm-light',
                    position    : 'right',
                    zposition   : 'front',
                    header      : true
                });
<?php
    $id = $_SESSION['teacher_id'];
    $query = "SELECT id_sem_sched,subject,section,course_year,course,teacher FROM tblsem_sched WHERE teacher ='$id'";
    $result = @mysql_query($query);
    $a = 1;
    while($row = mysql_fetch_array($result))
    {
        $section = "section".$a;
        $a++;
        echo "$('div#".$section."').mmenu({
                    classes     : 'mm-fullscreen mm-light',
                    position    : 'right',
                    zposition   : 'front',
                    header      : true
                });";
    }

?>
       });
        </script>
        <script>
        $(document).bind( "mobileinit", function(){
            $.mobile.ajaxEnabled = false;
        });            
        </script>
        <script type="text/javascript" src="../js/jquery.mobile-1.3.2.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/ajax_script.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('form').submit(function(){
                alert("a");
        });
        $(".mm-prev").click(function(){
            <?php
    $id = $_SESSION['teacher_id'];
    $query = "SELECT id_sem_sched,subject,section,course_year,course,teacher FROM tblsem_sched WHERE teacher ='$id'";
    $result = @mysql_query($query);
    $a = 1;
    while($row = mysql_fetch_array($result))
    {
        
        $section = "section".$a;     
        $a++;
        echo "$('#".$section."').trigger('close');";
    }

?>
        
        });
    });
</script>
