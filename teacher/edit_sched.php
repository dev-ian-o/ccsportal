<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php teacher_confirm_logged_in()?> 
<?php
    if(!isset($_GET['id'])){
        redirect_2('schedule.php');
    }
?>
<?php require_once("header.php");?> 

<?php
$id_user = $_SESSION['teacher_id'];
$level_user = $_SESSION['level_user'];
$id_schedule = $_GET['id']; 
    $query = "SELECT * FROM tblschedule WHERE id_schedule ='$id_schedule'";
    $result = @mysql_query($query);
    $row = mysql_fetch_array($result);
?>
<div id="content">
    <h3 style="font-family: Harlow Solid Italic;"><center>Edit Schedule</center></h3>                               
            <div id="edit"></div>
            <div id="message"></div> 
          <form method="post" id="editschedule">
                  <fieldset data-role="controlgroup" data-mini="true">
                    <label>For:</label>
                  <?php
                  $arr_section = array();
                  $arr_handled_section = array();
                  $id = $_SESSION['teacher_id'];

                  $query5 = "SELECT * FROM tblsched_for WHERE id_schedule = '$id_schedule'";
                  $result5 = @mysql_query($query5);
                  $a = 0;
                while ($row5 = mysql_fetch_array($result5)){
                    $arr_section[$a] = $row5['sched_for'];
                    $a++;
                }

                $query3 = "SELECT section,course_year,course,id_sem_sched FROM tblsem_sched WHERE teacher ='$id'";
                  $result3 = @mysql_query($query3);
                  while($row3 = mysql_fetch_array($result3))
                  {
                    if($row3['course'] == "BS Information Technology major in Service Management"){$course = "ITSM";}
                    else if($row3['course'] == "BS Computer Science"){ $course = "CSAD";}
                    else if($row3['course'] == "Computer Network Administration") {$course = "CNA";}    
                    $section = $row3['course_year'].'-'.$row3['section'].$course;
                    $checked = "";
                    for($a = 0; $a < count($arr_section); $a++){
                        if($section == $arr_section[$a]){
                            $checked = "checked";
                        }
                    }

                    echo '<input type="checkbox" name="for[]" id="checkbox-v-6'.$row3['id_sem_sched'].'" value="'.$row3['course_year'].'-'.$row3['section'].$course.'" '.$checked.'>';
                    echo '<label for="checkbox-v-6'.$row3['id_sem_sched'].'">'.$row3['course_year'].'-'.$row3['section'].$course.'</label>';

                  }


                  ?>     



                </fieldset>

                  <label for="un" class="">Title:</label>
                  <input type="text" name="title" maxlength="50"<?php if(isset($row['title'])){ echo "value='".$row['title']."'"; } ?>required="required">

                  <label for="un" class="">Place:</label>
                  <input type="text" name="place" <?php if(isset($row['place'])){ echo "value='".$row['place']."'"; } ?> required="required">

                  <label for="un" class="">Date:</label>            
                  <input type="date" name="date" placeholder="mm-dd-yyyy" <?php if(isset($row['date_sched'])){ echo "value='".formatDate($row['date_sched'])."'"; } ?> required="required"  <?php echo "min='".formatDate(dateNow())."'";?>><br>

                  <label for="un" class="">Time:</label>
                  <input type="time" name="time" placeholder="hh:mm" <?php if(isset($row['date_sched'])){ echo "value='".formatTime($row['date_sched'])."'"; } ?>  required="required">

                  <label for="un" class="">Description/Notes:</label>
                  <textarea name="desc"  rows="5"  required="required" maxlength="200"><?php if(isset($row['description'])){ echo $row['description']; } ?> </textarea>

                  <input type="hidden" name="id_user" <?php echo "value='".$_SESSION['teacher_id']."'";?>>
                  <input type="hidden" name="editSchedule" value="editSchedule">
                  <input type="hidden" name="id_schedule" <?php echo "value='".$id_schedule."'";?>>
                  <p><button id="ian" type="submit" name="submit">Save</button></p>

          </form>
          <?php 
            if(isset($_POST['submit']))
            {

            }

          ?>
</div>
<?php require_once("footer.php");?>         
<script type="text/javascript">
    $(document).ready(function(){
        $(".mm-prev").click(function(){
            $('#myschedule').trigger('close');
        });


    
    $('#editschedule').submit(function(){
         postData = $('#editschedule').serialize();
        if(confirm("Are you sure you want to edit this?"))
        {
            $.post('process.php', postData+'&action=submit&ajaxrequest=1', function(msg) {
               $("#edit").html(""+msg+"");
            });
        } 
        return false;
    });

    });
</script>