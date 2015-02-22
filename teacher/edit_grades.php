<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php teacher_confirm_logged_in(); ?>
<style type="text/css">



</style>
<?php require_once("header.php");?>     

<?php
$id_sem_sched = $_SESSION['id_sem_sched'];//id
$id_subject = $_SESSION['id_subject'];//id
$section = $_SESSION['section'];// ABCD
$course = $_SESSION['course'];//full
$course_year = $_SESSION['course_year'];//
$id_teacher = $_SESSION['teacher'];// id
if($course_year == 1){ $course_year = 'first';}
if($course_year == 2){ $course_year = 'second';}
if($course_year == 3){ $course_year = 'third';}
if($course_year == 4){ $course_year = 'fourth';}
?>
<?php 

function add_grades($subject,$school_year,$midterm_grade,$finalterm_grade,$sem_grade,$id_student,$id_teacher,$midterm_grading,$finalgrading)
{

    $query = "INSERT INTO tblgrades(subject,school_year,midterm_grade,finalterm_grade,sem_grade,id_student,id_teacher,midterm_grading,finalgrading)
    VALUES  ('$subject','$school_year','$midterm_grade','$finalterm_grade','$sem_grade','$id_student','$id_teacher','$midterm_grading','$finalgrading')";
    $result = @mysql_query($query);
                
}
function edit_grades($id_grades,$subject,$school_year,$midterm_grade,$finalterm_grade,$sem_grade,$id_student,$id_teacher,$midterm_grading,$finalgrading)
{

    $query = "UPDATE tblgrades SET 
        subject = '$subject',
        school_year = '$school_year',
        midterm_grade = '$midterm_grade',
        finalterm_grade = '$finalterm_grade',
        sem_grade = '$sem_grade',
        id_student = '$id_student',
        midterm_grading = '$midterm_grading',
        finalgrading = '$finalgrading',
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
    if(isset($_POST['midterm_grading'])){ $midterm_grading = $_POST['midterm_grading']; } else { $midterm_grading = "";}
    if(isset($_POST['finalgrading'])){ $finalgrading = $_POST['finalgrading']; } else { $finalgrading = "";}
    if(isset($_POST['sem_grade'])){ $sem_grade = $_POST['sem_grade']; } else { $sem_grade = "";}
    if($_POST['id_grades'] != '')
    {
        edit_grades($_POST['id_grades'],$id_subject,$school_year,$midterm_grade,$finalterm_grade,$sem_grade,$id_student,$id_teacher,$midterm_grading,$finalgrading);
    }
    else
    {
        if(!empty($_POST['midterm']))
        {
            add_grades($id_subject,$school_year,$midterm_grade,$finalterm_grade,$sem_grade,$id_student,$id_teacher,$midterm_grading,$finalgrading);        
        }
    }
}
if(isset($_POST['submit2']))
{

    if(isset($_POST['mgrade'])){ $midterm_grading = $_POST['mgrade']; } else { $midterm_grading = "";}
    if(isset($_POST['fgrade'])){ $finalgrading = $_POST['fgrade']; } else { $finalgrading = "";}
    
        $query = "UPDATE tblgrades SET
        midterm_grading = '$midterm_grading',
        finalgrading = '$finalgrading'
        WHERE id_teacher = '$id_teacher'        AND subject='$id_subject'";    
    $result = @mysql_query($query);
}
//line of codes for today is 131.. 3 more functions to go..  newsfeed(withnotifiicationlfb) and notification plus the wall of fame and design.. maybe ny sunday tapos na to..
?>
<div id="content">
<h3 style="font-family: Harlow Solid Italic;"><center>Edit Records</center></h3>        
<h3><center><?php echo $_SESSION['title'];?></center></h3>                               
<div class="input-append pull-left">
<a href="students.php" class="btn btn-warning">Back</a>
</div>
<?php
    $query6= "SELECT * FROM tblgrades WHERE subject='$id_subject' AND id_teacher='$id_teacher'";
    $result6 = @mysql_query($query6);
    $row6 = mysql_fetch_array($result6);

    if($row6['midterm_grading'] == 0 && $row6['finalgrading'] == 0)
    {
     $row6['midterm_grading'] = 40;
     $row6['finalgrading'] = 60;
    }
?>
<div class="table-responsive">
    <form method="post">
    <table class="table" id="grading">
            <thead>
                <td colspan="2">Grading</td>
            </thead>
            <tr>
                <td>Midterm</td>

                <td><input type="text" name="mgrade" required <?php echo "value='".$row6['midterm_grading']."'";?>></td>
            </tr>
            <tr>
                <td>Final Term</td>
                <td><input type="text" name="fgrade" required <?php echo "value='".$row6['finalgrading']."'";?>></td>
            </tr>
            <tr>
                <td colspan="2"><center><button type="submit" class="btn" name="submit2">OK</button></center></td>
            </tr>
    </table>
    </form>
</div>
<div class="table-responsive">
<center>
<table class="table">
        <thead>
            <th>Name</th>
            <th>Midterm Grade</th>
            <th>Finalterm Grade</th>
            <th>Sem. Grade</th>
            <th></th>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM tblstudent WHERE course = '$course' AND section = '$section' AND yr = '$course_year'";
            $result = @mysql_query($query);
            $b = 1;
            while($row = mysql_fetch_array($result))
            {       
                $query2 = "SELECT * FROM tblsem_sched WHERE id_sem_sched = '$id_sem_sched'";
                $result2 = @mysql_query($query2);
                $row2 = mysql_fetch_array($result2);


                if(isset($row2['teacher']))   { $id_teacher = $row2['teacher'];} else{ $id_teacher = "";}
                if(isset($row2['school_year']))   { $school_year = $row2['school_year'];} else{ $school_year = "";}
                if(isset($row['id_student']))   { $id_student = $row['id_student'];} else{ $id_student = "";}
                $subject = $row2['subject'];
                $query3= "SELECT * FROM tblgrades WHERE id_student = '$id_student' AND school_year = '$school_year' AND subject='$subject'";
                $result3 = @mysql_query($query3);
                $row3 = mysql_fetch_array($result3);


                if(isset($row3['id_grades']))   { $id_grades = $row3['id_grades'];} else{ $id_grades = "";}
                if(isset($row3['finalterm_grade']))   { $finalterm = $row3['finalterm_grade'];} else{ $finalterm = "0";}
                if(isset($row3['midterm_grade']))   { $midterm = $row3['midterm_grade'];} else{ $midterm = "0";}
                
                $finalgrade = ($midterm * (0.01*$row6['midterm_grading'])) +  ($finalterm * (0.01*$row6['finalgrading']));
                echo "<form method='post' id='grades'> ";
                echo "<tr>";
                echo "      <th>".strtoupper($row['lastname']).', '.strtoupper($row['firstname'])."</th>";

                echo "      <td><input type='text' name='midterm' value='".number_format($midterm,1)."' style='width: 70px; height: 30px;'></td>"; 
                echo "      <td><input type='text' name='finalterm' value='".number_format($finalterm,1)."' style='width: 70px; height: 30px;'></td>";
                echo "<td>
                        ".$finalgrade."
                        <input type='hidden' name='id_student' value='".$id_student."'>
                        <input type='hidden' name='id_grades' value='".$id_grades."'>
                        <input type='hidden' name='id_teacher' value='".$id_teacher."'>
                        <input type='hidden' name='school_year' value='".$school_year."'>
                        <input type='hidden' name='midterm_grading' value='".$row6['midterm_grading']."'>
                        <input type='hidden' name='finalgrading' value='".$row6['finalgrading']."'>
                        <input type='hidden' name='sem_grade' value='".$finalgrade."'>
                    </td>";
                echo "      <td>";
                echo "      <button type='submit' name='submit' class='btn btn-success'>OK</button>";
                echo "      </td>"; 
                echo "</tr>";
                echo "</form>";
            }
        ?>
        </tbody>
</table>
</center>
</div>


</div>
        </div>
    </body>
</html>
        <script type="text/javascript" src="../js/jquery.js"></script>      
        <script type="text/javascript" src="../js/jquery.mmenu.min.all.js"></script>

        <script type="text/javascript">
            $(function() {

                var $menu = $('nav#menu-right');

                $menu.mmenu({
                    position    : 'right',
                    classes     : 'mm-light',
                 
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
                    classes     : 'mm-light'
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
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/ajax_script.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    
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

