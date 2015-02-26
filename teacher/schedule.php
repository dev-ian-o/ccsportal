<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php teacher_confirm_logged_in()?> 
<?php require_once("header.php");?>	

<?php
$id_user = $_SESSION['teacher_id'];
$level_user = $_SESSION['level_user'];
    $query = "SELECT * FROM tblschedule WHERE id_user = '$id_user' AND level_user = '$level_user'
    ORDER BY DATE_FORMAT(date_sched, '%Y') DESC,DATE_FORMAT(date_sched, '%m') DESC,DATE_FORMAT(date_sched, '%d') DESC, DATE_FORMAT(date_sched, '%H') DESC, DATE_FORMAT(date_sched, '%i') DESC, DATE_FORMAT(date_sched, '%s') DESC";
    $result = @mysql_query($query);
?>
<div id="content">
    <h3 style="font-family: Harlow Solid Italic;"><center>Schedule</center></h3>                               
    <a href="#myschedule" data-role="button">My Schedule</a>         		
      <span><a href="#addsched" data-role="button" data-theme="e">Add Schedule</a></span>
    <div data-role="collapsible-set" data-theme="c" data-content-theme="d" data-inset="true" data-icon="false">
    <div data-role="collapsible" data-collapsed="false">

        <h2>Calendar</h2>
        <ul data-role="listview" id="getSched"  data-theme="d" data-divider-theme="d">
        <?php 
               while ($row = mysql_fetch_array($result)) {
                $id_schedule = $row['id_schedule'];
                
                 if( full_date(dateNow()) == full_date($row['date_sched']) ){ $today = "Today";} else { $today = "";}
                 if(formatDate($row['date_editted']) != formatDate("0000-00-00")) 
                  { $time = "<small>Modified:".full_time($row['date_editted']).' '.formatDate($row['date_editted']);} 
                else { $time = "<small>Created:".full_time($row['date_created']).' '.$row['date_created'];}
                    echo '<li data-role="list-divider">'.full_date($row['date_sched']).' '.full_time($row['date_sched']).'<span class="ui-li-count">'.$today.'</span></li>';
                    echo '<li><a href="edit_sched.php?id='.$id_schedule.'">';
                    echo "    <h3>".$row['title']."</h3>";
                    echo "    <p><strong>Author: ".$row['author']."</strong></p>";
                 $query4 = "SELECT * FROM tblsched_for WHERE id_schedule = '$id_schedule'";
                $result4 = @mysql_query($query4);
                    echo "    <p><strong>For: ";
                  while ($row4 = mysql_fetch_array($result4)) {   
                    echo $row4['sched_for'].',';
                  }
                    echo "</strong></p>";
                    echo "    <p>".$row['description']."</p>";
                    echo '    <p class="ui-li-aside"><strong>'.$time.'</strong></small></p>';
                 
                    echo "  </a></li>";  
              
        }
        ?>

        </ul>
    </div>
    </div>
</div>
<div id="addsched">
	      <div id="panel-overview">
         
          <div id="message"></div>
          <form method="post" id="addschedule">
              <div style="padding:10px 20px;">
                  <h3>Add Event/Schedule</h3>

                  <div id="add"></div> 
                  <fieldset data-role="controlgroup" data-mini="true">
                    <label>For:</label>
                  <?php
                  $id = $_SESSION['teacher_id'];
                  $query3 = "SELECT section,course_year,course,id_sem_sched FROM tblsem_sched WHERE teacher ='$id'";
                  $result3 = @mysql_query($query3);
                  while($row3 = mysql_fetch_array($result3))
                  {
                    if($row3['course'] == "BS Information Technology major in Service Management"){$course = "ITSM";}
                    else if($row3['course'] == "BS Computer Science"){ $course = "CSAD";}
                    else if($row3['course'] == "Computer Network Administration") {$course = "CNA";}

                    echo '<input type="checkbox" name="for[]" id="checkbox-v-6'.$row3['id_sem_sched'].'" value="'.$row3['course_year'].'-'.$row3['section'].$course.'" class="group-required">';
                    echo '<label for="checkbox-v-6'.$row3['id_sem_sched'].'">'.$row3['course_year'].'-'.$row3['section'].$course.'</label>';

                  }
                  ?>                    

                </fieldset>

                  <label for="un" class="">Title:</label>
                  <input type="text" name="title" maxlength="50"<?php if(isset($_SESSION['sched_edit']) && (isset($row['title']))){ echo "value='".$row['title']."'"; } ?>required="required">

                  <label for="un" class="">Place:</label>
                  <input type="text" name="place" <?php if(isset($_SESSION['sched_edit']) && (isset($row['place']))){ echo "value='".$row['place']."'"; } ?> required="required">

                  <label for="un" class="">Date:</label>            
                  <input type="date" name="date" placeholder="mm-dd-yyyy" <?php if(isset($_SESSION['sched_edit']) && (isset($row['date_sched']))){ echo "value='".formatDate($row['date_sched'])."'"; } ?> required="required"  <?php echo "min='".formatDate(dateNow())."'";?>><br>

                  <label for="un" class="">Time:</label>
                  <input type="time" name="time" placeholder="hh:mm" <?php if(isset($_SESSION['sched_edit']) && (isset($row['date_sched']))){ echo "value='".formatTime($row['date_sched'])."'"; } ?>  required="required">

                  <label for="un" class="">Description/Notes:</label>
                  <textarea name="desc"  rows="5"  required="required" maxlength="200"><?php if(isset($_SESSION['sched_edit']) && (isset($row['description']))){ echo $row['description']; } ?> </textarea>

                  <input type="hidden" name="id_user" <?php echo "value='".$_SESSION['teacher_id']."'";?>>
                  <input type="hidden" name="addSchedule" value="addSchedule">

                  <p><button type="submit" name="submit">Save</button></p>

              </div>
          </form>

                  <!-- header info -->
          <h3 class="Header">Add Schedule</h3>
          <a href="#page" class="Prev"></a>
          </div>
      </div>
<div id="myschedule">
      <div id="panel-overview">
         <center>
         <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
          <thead>
            <th>Subject</th>
            <th>Days</th>
            <th>Time</th>
            <th>Room</th>
            <th>Section</th>
          </thead>
          <tbody>
        <?php
        	$id = $_SESSION['teacher_id'];
          $query = "SELECT * FROM tblsem_sched WHERE teacher = '$id'";
          $result = @mysql_query($query);
          while($row = mysql_fetch_array($result))
            {
            if(isset($row['days'])){ $days = $row['days']; $days = str_split($days); } else { $days = 0; }
            

            if(count($days) != 0)
            {
              $day = "";
              for($a = 0;$a < count($days); $a++)
              {

                if($days[$a] =="M"){ $day .= "Mon,";}
                if($days[$a] == "T"){ $day .= "Tue,";}
                if($days[$a] == "W"){ $day .= "Wed,";}
                if($days[$a] == "t"){ $day .= "Thurs,";}
                if($days[$a] == "F"){ $day .= "Fri,";}
                if($days[$a] == "s"){ $day .= "Sat,";}
                if($days[$a] == "S"){ $day .= "Sun";}
              }   

            }
            $subject = $row['subject'];
            $query2 = "SELECT * FROM tblsubject WHERE id_subject ='$subject'";
            $result2 = @mysql_query($query2);
            $row2 = mysql_fetch_array($result2);

            echo "<tr>";
            echo "  <th>".$row2['subject_desc']."</th>";
            echo "  <td>".$day."</td>";
            echo "  <td>".full_time($row['start_time']).'-'.full_time($row['end_time'])."</td>";
            echo "  <td>".$row['room']."</td>";
            echo "  <td>".$row['course_year'].'-'.$row['section']."</td>";
            echo "</tr>";
          }
        ?>
          </tbody>
        </table>
        </center>  
                  <!-- header info -->
          <h3 class="Header">My Schedule</h3>
          <a href="#page" class="Prev"></a>
      </div>
</div>
<?php require_once("footer.php");?>			
<script type="text/javascript">
	$(document).ready(function(){
		$(".mm-prev").click(function(){
			$('#myschedule').trigger('close');
		});

    $('#addschedule').submit(function(){
        if(confirm("Are you sure you want to add this?"))
        {
          postData = $('#addschedule').serialize();
   
        $.post('process.php', postData+'&action=submit&ajaxrequest=1', function(msg) {
            $("#add").html(""+msg+"");
        });
        } 
        return false;
    });

	});
</script>