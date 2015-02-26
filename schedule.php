<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("header.php");?>			
<?php
if($row['yr'] == "first"){ $course_year = 1;}
if($row['yr'] == "second"){ $course_year = 2;}
if($row['yr'] == "third"){ $course_year = 3;}
if($row['yr'] == "fourth"){ $course_year = 4;}
$section = $row['section'];
$course = $row['course'];

if($row['course'] == "BS Information Technology major in Service Management"){$course2 = "ITSM";}
else if($row['course'] == "BS Computer Science"){ $course2 = "CSAD";}
else if($row['course'] == "Computer Network Administration") {$course2 = "CNA";}

$for = $course_year.'-'.$section.$course2;


?>
<div id="content">
    <h3 style="font-family: Harlow Solid Italic;"><center>Schedule</center></h3>                               
    <a href="#myschedule" data-role="button">My Schedule</a>         		
    <div data-role="collapsible-set" data-theme="c" data-content-theme="d" data-inset="true" data-icon="false">
    <div data-role="collapsible" data-collapsed="false">
        <h2>Calendar</h2>
        <ul data-role="listview" data-theme="d" data-divider-theme="d">
        <?php 

    $query5 = "SELECT * FROM tblsched_for WHERE sched_for = '$for'";
    $result5 = @mysql_query($query5);

    while ($row5 = mysql_fetch_array($result5)){
        $id_schedule = $row5['id_schedule'];
        $query = "SELECT * FROM tblschedule WHERE id_schedule = '$id_schedule' ORDER BY DATE_FORMAT(date_sched, '%Y') DESC,DATE_FORMAT(date_sched, '%m') DESC, DATE_FORMAT(date_sched, '%d') DESC, DATE_FORMAT(date_sched, '%H') DESC, DATE_FORMAT(date_sched, '%i') DESC, DATE_FORMAT(date_sched, '%s') DESC";
        $result = @mysql_query($query);

      

     
       while ($row = mysql_fetch_array($result)) {
        $id_schedule = $row['id_schedule'];
                      
               if( full_date(dateNow()) == full_date($row['date_sched']) ){ $today = "Today";} else { $today = "";}
               if(formatDate($row['date_editted']) != "0000-00-00") { $time = "<small>Editted:".full_time($row['date_editted']);} else { $time = "<small>Created:".full_time($row['date_created']);}
                  echo '<li data-role="list-divider">'.full_date($row['date_sched']).' '.full_time($row['date_sched']).'<span class="ui-li-count">'.$today.'</span></li>';
                  echo '<li>';
                  echo "    <h3>".$row['title']."</h3>";
                  echo "    <p><strong>Author: ".$row['author']."</strong></p>";
                $query4 = "SELECT * FROM tblsched_for WHERE id_schedule = '$id_schedule' AND sched_for = '$for'";
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
    }
        ?>

        </ul>
    </div>
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

          $query = "SELECT * FROM tblsem_sched WHERE course_year ='$course_year' AND course = '$course' AND section = '$section'";
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