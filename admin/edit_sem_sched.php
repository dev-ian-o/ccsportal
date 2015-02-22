<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("header.php"); ?>


<br>

<?php
$course = $_SESSION['course'];
$section = $_SESSION['section'];
$school_year = $_SESSION['school_year'];
$course_year = $_SESSION['course_year'];
$semester = $_SESSION['semester'];
?>
<?php
	 // <input type="text" name="room"> <!-- must be combo box -->
	 // <input type="text" name="start_time"> <!-- must be combo box -->
	 // <input type="text" name="end_time"> <!-- must be combo box -->
?>
	 	
<div class="row-fluid">
            <div class="span10 offset1">
                <section class="widget">
                    <header>
                
                        <h4>
                            	<center><br><strong>SCHEDULE</strong><br></center>
	 							<small>COURSE: <?php echo $_SESSION['course'];?><br>
	 							SECTION: <?php echo $_SESSION['course_year'].'-'.$_SESSION['section'];?><br>
	 							SCHOOL YEAR: <?php echo $_SESSION['school_year'];?> </small>
                       </h4>
                    </header>
                    <div class="body">
<table class="table-bordered">
		<thead>
			<th>#</th>
			<th>Subject Code</th>
			<th>Subject Description</th>
			<th>Days</th>
			<th>Start time-End time</th>
			<th>Teacher</th>
			<th>Room</th>
			<th></th>
		</thead>
		<tbody>
		<?php
			$query = "SELECT * FROM tblsubject WHERE course = '$course' AND course_year = '$course_year' AND semester='$semester'";
	        $result = @mysql_query($query);
	        $b = 1;
	        while($row = mysql_fetch_array($result))
        	{		
				$subject = $row['id_subject'];        		
				$query2 = "SELECT * FROM tblsem_sched WHERE subject = '$subject' AND course = '$course' AND course_year = '$course_year' AND semester='$semester' AND school_year='$school_year' AND section ='$section'";
		        $result2 = @mysql_query($query2);
		        $row2 = mysql_fetch_array($result2);
		        
		        if(isset($row2['start_time'])){ $start_time = formatTime($row2['start_time']) ;} else{ $start_time = "";}
		        if(isset($row2['end_time'])){ $end_time = formatTime($row2['end_time']);} else{ $end_time = "";}
		        if(isset($row2['teacher']))   { $teacher = $row2['teacher'];} else{ $teacher = "";}
		        if(isset($row2['room']))      { $room = $row2['room'];} else{ $room = "";}
		        if(isset($row2['id_sem_sched']))      { $id_sem_sched = $row2['id_sem_sched'];} else{ $id_sem_sched = "";}
		        if(isset($row2['days'])){ $days = $row2['days']; $days = str_split($days); } else { $days = 0; }
		        

		        if(count($days) != 0)
		        {
		        	$sun = ""; $mon = ""; $tue = ""; $wed = ""; $thurs = ""; $fri = ""; $sat = ""; $sun = "";
		        	for($a = 0;$a < count($days); $a++)
		        	{

		        		if($days[$a] =="M"){ $mon = "checked='checked'";}
		        		if($days[$a] == "T"){ $tue = "checked='checked'";}
		        		if($days[$a] == "W"){ $wed = "checked='checked'";}
		        		if($days[$a] == "t"){ $thurs = "checked='checked'";}
		        		if($days[$a] == "F"){ $fri = "checked='checked'";}
		        		if($days[$a] == "s"){ $sat = "checked='checked'";}
		        		if($days[$a] == "S"){ $sun = "checked='checked'";}
		        	}		

		        }

        		echo '<form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>';
        		echo "<tr>";
        		echo "<td>".$b++."</td>";
        		echo "		<td>".$row['subject_code']."</td>";        		
        		echo "		<td>".$row['subject_desc']."</td>";
				echo "		<td>";

				echo '<input type="checkbox" id="checkbox-1" '.$sun.' class="uniform"  name="days[]" value="S"> Sun'; //validation if meron ng available
				echo '<input type="checkbox" id="checkbox-1" '.$mon.'  class="uniform"  name="days[]" value="M"> Mon';
				echo '<input type="checkbox" id="checkbox-1" '.$tue.'  class="uniform"  name="days[]" value="T"> Tue';
				echo '<input type="checkbox" id="checkbox-1" '.$wed.'  class="uniform"  name="days[]" value="W"> Wed';
				echo '<input type="checkbox" id="checkbox-1" '.$thurs.'  class="uniform"  name="days[]" value="t"> Thurs';
				echo '<input type="checkbox" id="checkbox-1"  '.$fri.' class="uniform"  name="days[]" value="F"> Fri';
				echo '<input type="checkbox" id="checkbox-1"  '.$sat.' class="uniform"  name="days[]" value="s"> Sat';

				echo "		</td>";
				echo "		<td>";

				echo '<input type="time" class="span6" name="start" value="'.$start_time.'">-';
				echo '<input type="time" class="span6"name="end" value="'.$end_time.'">';

				echo "		</td>";

				echo display_teachers($teacher);
				
				echo "		<td><input type='text' class='span20' name='room' value='".$room."'></td>";	

				echo "		<td>";
				echo " 		<input type='hidden' name='subject_id' value='".$row['id_subject']."'>";
				echo " 		<input type='hidden' name='teacher_id' value='".$teacher."'>";
				echo " 		<input type='hidden' name='sched_id' value='".$id_sem_sched."'>";
				echo "		<button type='submit' class='btn btn-success' name='submit'>OK</button>";
				echo "		</td>";	
				echo "</tr>";
				echo "</form>";
        	}
		?>
		</tbody>
</table>
					</div>
				</section>
			</div>
</div>



<?php
	if(isset($_POST['submit'])){
		if(isset($_POST['subject_id'])){ $subject = $_POST['subject_id']; } else { $subject = "";}
		if(isset($_POST['teacher'])){ $teacher = $_POST['teacher']; } else { $teacher = "";}
		if(isset($_POST['sched_id'])){ $id_sem_sched = $_POST['sched_id']; } else { $id_sem_sched = "";}
		if(isset($_POST['start'])){ $start_time = $_POST['start']; } else { $start_time = "";}
		if(isset($_POST['end'])){ $end_time = $_POST['end']; } else { $end_time = "";}
		if(isset($_POST['room'])){ $room = $_POST['room']; } else { $room = "";}
		if (isset($_POST['days'])) {
			$days = "";
		for ($i=0; $i < count($_POST['days']); $i++) { 
            $days .= $_POST['days'][$i];
        	}
		}
echo $end_time;
		$course = $_SESSION['course'];
		$section = $_SESSION['section'];
		$school_year = $_SESSION['school_year'];
		$course_year = $_SESSION['course_year'];
		$semester = $_SESSION['semester'];		

			if($_POST['sched_id'] != "") //edit here the tblsem_sched
			{
				if(!empty($_POST['days']) && (!empty($start_time)) && 
				(!empty($end_time)) && (!empty($room)) && (!empty($teacher)))
				{
					$id_sem_sched = $_POST['sched_id'];
					echo $id_sem_sched;
					edit_sem_sched($id_sem_sched,$school_year,$semester,$course_year,$section,$course,$subject,$room,$start_time,$end_time,$teacher,$days);
				}	
			}	
			else if(!empty($_POST['days']) && (!empty($start_time)) && 
				(!empty($end_time)) && (!empty($room)) && (!empty($teacher)))
			{
				echo "ok";
				add_sem_sched($school_year,$semester,$course_year,$section,$course,$subject,$room,$start_time,$end_time,$teacher,$days);				
			}
			else 
			{ echo "hindi ok";}



	}

?>

<?php

function add_sem_sched($school_year,$semester,$course_year,$section,$course,$subject,$room,$start_time,$end_time,$teacher,$days)
{
	$query = "INSERT INTO tblsem_sched(school_year,semester,course_year,section,course,subject,room,start_time,end_time,teacher,days)
    VALUES  ('$school_year','$semester','$course_year','$section','$course','$subject','$room','$start_time','$end_time','$teacher','$days')";
    $result = @mysql_query($query);
				
}

function edit_sem_sched($id_sem_sched,$school_year,$semester,$course_year,$section,$course,$subject,$room,$start_time,$end_time,$teacher,$days)
{
	$query = "UPDATE tblsem_sched SET 
		school_year = '$school_year',
		semester = '$semester',
		course_year = '$course_year',
		section = '$section',
		course = '$course',
		subject = '$subject',
		room = '$room',
		start_time = '$start_time',
		end_time = '$end_time',
		teacher = '$teacher',
		days = '$days'
		WHERE id_sem_sched = '$id_sem_sched'";	
    $result = @mysql_query($query);
				
}



function display_teachers($id_teacher){
	$query = "SELECT * FROM tblteacher";
	$result = @mysql_query($query);
	
	echo "<td>";
	echo "<select name='teacher' class='selectpicker span15'>";
	echo "<option></option>";
	while($row = mysql_fetch_array($result))
	{
		if($row['id_teacher'] == $id_teacher){ $checked = "selected='selected'"; } else { $checked = "";}
		echo "<option ".$checked." value='".$row['id_teacher']."'>Prof. ".$row['lastname']."</option>";
	}
	echo "</select>";
	echo "</td>";
}

/*
	pag pinindot ung ok iADD or ieeddit niya ung values sa tbl_sem_sched 
	bali iddisplay ung values kapag existing na sya 


	tanong pano ko malalamn kung existing na sya... hmmmm


	sige so pag submit ng ok
	aalamin nya kung ung query ng sem grade ay existing... if wala
	edi iaadd nya un
	pero kung meron edi ieedit nya un.. tama ba...

	if(isset($_POST['submit']))
	{
			$query = ""
	}

*/


	//todays line of codes 266+226
?>

<?php require_once("footer.php"); ?>



