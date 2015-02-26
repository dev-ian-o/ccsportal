<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php teacher_confirm_logged_in(); ?>

<?php require_once("header.php");?>     

<div id="content">
<h3 style="font-family: Harlow Solid Italic;"><center>My Students</center></h3>                               
  
  
<?php
    if(isset($_POST['submit']))
    {
        $_SESSION['id_sem_sched'] = $_POST['id_sem_sched'];
        $_SESSION['id_subject'] = $_POST['id_subject'];
        $_SESSION['section'] = $_POST['section'];
        $_SESSION['course_year'] = $_POST['course_year'];
        $_SESSION['course'] = $_POST['course'];
        $_SESSION['teacher'] = $_POST['teacher'];
        $_SESSION['title'] = $_POST['title'];
        redirect_2("edit_grades.php");
    }
    $id = $_SESSION['teacher_id'];
    $query = "SELECT id_sem_sched,subject,section,course_year,course,teacher FROM tblsem_sched WHERE teacher ='$id'";
    $result = @mysql_query($query);
    while($row = mysql_fetch_array($result))
    {
        $subject = $row['subject'];
        $query2 = "SELECT subject_desc,id_subject FROM tblsubject WHERE id_subject ='$subject'";
        $result2 = @mysql_query($query2);
        $row2 = mysql_fetch_array($result2);    
        if($row['course'] == "BS Information Technology major in Service Management"){$course = "ITSM";}
        else if($row['course'] == "BS Computer Science"){ $course = "CSAD";}
        else if($row['course'] == "Computer Network Administration") {$course = "CNA";}

        echo "<form method='post'>";
        echo "<input type='hidden' name='id_sem_sched' value='".$row['id_sem_sched']."'>";
        echo "<input type='hidden' name='id_subject' value='".$row2['id_subject']."'>";
        echo "<input type='hidden' name='section' value='".$row['section']."'>";
        echo "<input type='hidden' name='course' value='".$row['course']."'>";
        echo "<input type='hidden' name='course_year' value='".$row['course_year']."'>";
        echo "<input type='hidden' name='teacher' value='".$row['teacher']."'>";
        $title = $row2['subject_desc'].' '.$row['course_year'].'-'.$row['section'].$course;

        echo "<input type='hidden' name='title' value='".$title."'>";
        echo "<button type='submit' name='submit'>".$row2['subject_desc'].' '.$row['course_year'].'-'.$row['section'].$course."</button>";
        echo "</form>";
    }


?>
</div>
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

            $('.hidden').fadeIn(1000).removeClass('hidden');       
    });
</script>
