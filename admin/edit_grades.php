<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>


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


<table border="1">
		<thead>
			<th>#</th>
			<th>Student No</th>
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

		        $query3= "SELECT * FROM tblgrades WHERE id_student = '$id_student' AND school_year = '$school_year'";
		        $result3 = @mysql_query($query3);
		        $row3 = mysql_fetch_array($result3);


		        if(isset($row3['id_grades']))   { $id_grades = $row3['id_grades'];} else{ $id_grades = "";}
		     	if(isset($row3['finalterm_grade']))   { $finalterm = $row3['finalterm_grade'];} else{ $finalterm = "";}
		     	if(isset($row3['midterm_grade']))   { $midterm = $row3['midterm_grade'];} else{ $midterm = "";}
		     	

        		echo "<form method='post'> ";
        		echo "<tr>";
        		echo "<td>".$b++."</td>";
        		echo "		<td>".$row['student_no']."</td>";
        		echo "		<td>".strtoupper($row['lastname']).', '.strtoupper($row['firstname'])."</td>";
				echo "		<td><input type='number' name='midterm' value='".$midterm."'></td>"; 
				echo "		<td><input type='number' name='finalterm' value='".$finalterm."'></td>";
				echo "<td>
						".(($midterm+$finalterm)/2)."
						<input type='hidden' name='id_student' value='".$id_student."'>
						<input type='hidden' name='id_grades' value='".$id_grades."'>
						<input type='hidden' name='id_teacher' value='".$id_teacher."'>
						<input type='hidden' name='school_year' value='".$school_year."'>
					</td>";
				echo "		<td>";
				echo "		<button type='submit' name='submit'>OK</button>";
				echo "		</td>";	
				echo "</tr>";
				echo "</form>";
        	}
		?>
		</tbody>
</table>



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

//line of codes for today is 131.. 3 more functions to go..  newsfeed(withnotifiicationlfb) and notification plus the wall of fame and design.. maybe ny sunday tapos na to..
?>
