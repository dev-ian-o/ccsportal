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
$id_student = $_SESSION['user_id'];
?>
<div id="content">
    <h3 style="font-family: Harlow Solid Italic;"><center>My Grades</center></h3>                               
    <a href="#first" data-role="button">1st Year Grades</a> 
    <a href="#second" data-role="button">2nd Year Grades</a> 
    <a href="#third" data-role="button">3rd Year Grades</a> 
    <a href="#fourth" data-role="button">4th Year Grades</a>       
</div>

<div id="third">

        <!-- Overview panel -->
        <div id="panel-overview">
          <ul class="List">
            <li>
              <span>
                First Semester Grade
              </span>
              <em class="Counter">5</em>
              <div id="panel-nature-1">
                          <center>
                         <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
                            <thead>
                              <th>Subject</th>
                              <th>Units</th>
                              <th>Midterm Grade</th>
                              <th>Final Term Grade</th>
                              <th>Total Grade</th>
                            </thead>
                            <tbody>
                          <?php

                            $query = "SELECT * FROM tblgrades WHERE id_student = '$id_student'";
                            $result = @mysql_query($query);
                            while($row = mysql_fetch_array($result))
                              {
 
                              $subject = $row['subject'];
                              $query2 = "SELECT * FROM tblsubject WHERE id_subject ='$subject' AND semester = 'first'";
                              $result2 = @mysql_query($query2);
                              $row2 = mysql_fetch_array($result2);
                              if($row2['subject_desc'] != "")
                              {
                                echo "<tr>";
                                echo "  <th>".$row2['subject_desc']."</th>";
                                echo "  <td>".$row2['subject_unit']."</td>";
                                echo "  <td>".$row['midterm_grade']."</td>";
                                echo "  <td>".$row['finalterm_grade']."</td>";
                                echo "  <td>".$row['sem_grade']."</td>";
                                echo "</tr>";
                              }
                            }
                          ?>
                            </tbody>
                          </table>
                          </center>  

                <!-- header info -->
                <h3 class="Header">3rd Year - First Semester Grade</h3>
                <a href="#panel-overview" class="Prev"></a>
              </div>
            </li>

            <li>
              <span>
                Second Semester Grade
              </span>
              <em class="Counter">6</em>
              <div id="panel-nature-2">
                            <center>
                             <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
                            <thead>
                              <th>Subject</th>
                              <th>Units</th>
                              <th>Midterm Grade</th>
                              <th>Final Term Grade</th>
                              <th>Total Grade</th>
                            </thead>
                            <tbody>
                          <?php

                            $query = "SELECT * FROM tblgrades WHERE id_student = '$id_student'";
                            $result = @mysql_query($query);
                            while($row = mysql_fetch_array($result))
                              {
 
                              $subject = $row['subject'];
                              $query2 = "SELECT * FROM tblsubject WHERE id_subject ='$subject' AND semester = 'second'";
                              $result2 = @mysql_query($query2);
                              $row2 = mysql_fetch_array($result2);
                              if($row2['subject_desc'] != "")
                              {
                                echo "<tr>";
                                echo "  <th>".$row2['subject_desc']."</th>";
                                echo "  <td>".$row2['subject_unit']."</td>";
                                echo "  <td>".$row['midterm_grade']."</td>";
                                echo "  <td>".$row['finalterm_grade']."</td>";
                                echo "  <td>".$row['sem_grade']."</td>";
                                echo "</tr>";
                              }
                            }
                          ?>
                            </tbody>
                          </table>
                          </center>  
                
                <!-- header info -->
                <h3 class="Header">3rd Year - Second Semester Grade</h3>
                <a href="#panel-overview" class="Prev"></a>
              </div>
            </li>
           </ul> 
         <center>
                  <!-- header info -->
          <h3 class="Header">3rd Year Grades</h3>
          <a href="#page" class="Prev"></a>
      </div>
</div>
<div id="second">

        <!-- Overview panel -->
        <div id="panel-overview">
          <ul class="List">
            <li>
              <span>
                First Semester Grade
              </span>
              <em class="Counter">5</em>
              <div id="panel-nature-1">
                          <center>
                         <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
                            <thead>
                              <th>Subject</th>
                              <th>Units</th>
                              <th>Midterm Grade</th>
                              <th>Final Term Grade</th>
                              <th>Total Grade</th>
                            </thead>
                            <tbody>
                          <?php

                            $query = "SELECT * FROM tblgrades WHERE id_student = '$id_student'";
                            $result = @mysql_query($query);
                            while($row = mysql_fetch_array($result))
                              {
 
                              $subject = $row['subject'];
                              $query2 = "SELECT * FROM tblsubject WHERE id_subject ='$subject' AND semester = 'first'";
                              $result2 = @mysql_query($query2);
                              $row2 = mysql_fetch_array($result2);
                              if($row2['subject_desc'] != "")
                              {
                                echo "<tr>";
                                echo "  <th>".$row2['subject_desc']."</th>";
                                echo "  <td>".$row2['subject_unit']."</td>";
                                echo "  <td>".$row['midterm_grade']."</td>";
                                echo "  <td>".$row['finalterm_grade']."</td>";
                                echo "  <td>".$row['sem_grade']."</td>";
                                echo "</tr>";
                              }
                            }
                          ?>
                            </tbody>
                          </table>
                          </center>  

                <!-- header info -->
                <h3 class="Header">3rd Year - First Semester Grade</h3>
                <a href="#panel-overview" class="Prev"></a>
              </div>
            </li>

            <li>
              <span>
                Second Semester Grade
              </span>
              <em class="Counter">6</em>
              <div id="panel-nature-2">
                            <center>
                             <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table-stroke">
                            <thead>
                              <th>Subject</th>
                              <th>Units</th>
                              <th>Midterm Grade</th>
                              <th>Final Term Grade</th>
                              <th>Total Grade</th>
                            </thead>
                            <tbody>
                          <?php

                            $query = "SELECT * FROM tblgrades WHERE id_student = '$id_student'";
                            $result = @mysql_query($query);
                            while($row = mysql_fetch_array($result))
                              {
 
                              $subject = $row['subject'];
                              $query2 = "SELECT * FROM tblsubject WHERE id_subject ='$subject' AND semester = 'second'";
                              $result2 = @mysql_query($query2);
                              $row2 = mysql_fetch_array($result2);
                              if($row2['subject_desc'] != "")
                              {
                                echo "<tr>";
                                echo "  <th>".$row2['subject_desc']."</th>";
                                echo "  <td>".$row2['subject_unit']."</td>";
                                echo "  <td>".$row['midterm_grade']."</td>";
                                echo "  <td>".$row['finalterm_grade']."</td>";
                                echo "  <td>".$row['sem_grade']."</td>";
                                echo "</tr>";
                              }
                            }
                          ?>
                            </tbody>
                          </table>
                          </center>  
                
                <!-- header info -->
                <h3 class="Header">3rd Year - Second Semester Grade</h3>
                <a href="#panel-overview" class="Prev"></a>
              </div>
            </li>
           </ul> 
         <center>
                  <!-- header info -->
          <h3 class="Header">3rd Year Grades</h3>
          <a href="#page" class="Prev"></a>
      </div>
</div>


<?php require_once("footer.php");?>	
<script type="text/javascript">
  $(document).ready(function(){
    $(".mm-prev").click(function(){
      $('#panel-nature-1').trigger('close');
      $('#panel-nature-2').trigger('close');
      $('#third').trigger('close');      
      $('#second').trigger('close');
      

    });

  });
</script>