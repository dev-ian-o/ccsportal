<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
		unset($_SESSION['section']);
		unset($_SESSION['course_year']);
		unset($_SESSION['course']);
		unset($_SESSION['school_year']);
		unset($_SESSION['semester']);
?>
<?php

// function add_sem_sched($title,$place,$date,$desc,$time,$author ){
// 		$author = get_Author($author);
//         $created = dateNow_db_format();
//         $date .= " ";
//         $date .= $time;
//         $query = "INSERT INTO tblschedule(title,place,date_sched,description,date_created,author)
//         VALUES  ('$title','$place','$date','$desc','$created','$author')";
//         $result = @mysql_query($query);
// }
// function add_sem_sched($id,$title,$place,$date,$desc,$time,$author){
//         $author = get_Author($author);
//         $editted = dateNow_db_format();
//         $date .= " ";
//         $date .= $time;
//         $query = "UPDATE tblschedule SET 
//         title = '$title',
//         place = '$place',
//         date_sched = '$date',
//         description = '$desc',
//         author = '$author',
//         date_editted = '$editted'
//         WHERE id_schedule = '$id'";
//         $result = @mysql_query($query);
// }

?>
<?php

/*

bali ang mangyayari ay mag kakaroon ng combo box
ididisplay ang mga irerecommend na subjects
den paglagay sa school year
aww mejo mahirap pla too hmm sige gawan natin ng logic

so mag-aadd ako ng table for
school year
kung saan ilalagay ko ang mga available school year magcrecreate
ng form tapos new school- year

function kung ang year ay above current year invalid syemrpre
isang year lng tapos automatic na ung add 1 year then ito ung lalabas sa
sa form ng edit sem sched



pili muna ng school year 2013-2014
tapos pipili ng course
tapos pipili ng course year
and then pag nakapili na sa sya
ireredirect sya sa edit schedule
pipili sya ng section
tapos
ipapakita ung mga subjects tapos
nakatable
per row ung from
tapos isusubmit kung ok or no.. and then tapos na


tapos 

what if it displays all
the subjects in every semester year and course

then a table where admin could edit a
*/
?>
Add School Year:
<form method="post"> 
 	School Year:<input type="text" name="school_year"><br>
				<input type="submit" name="submit">
</form>



<?php
if(isset($_POST['submit']))
{
	if($_POST['school_year'] != "")
	{	
		$school_year = $_POST['school_year'];
		$query = "INSERT INTO tblschool_year(school_year)
        VALUES  ('$school_year')";
        $result = @mysql_query($query);
    }
}
?>

Add Schedule
<form method="post" />
School Year:
<select class="selectpicker span2" data-style="btn-primary" name="school_year" tabindex="-1" id="simple-big">
       	<?php 
	       	$query = "SELECT * FROM tblschool_year";
	        $result = @mysql_query($query);
	        while($row = mysql_fetch_array($result))
        	{
				echo "<option value'".$row[1]."'' >".$row[1]."</option>";
        	}

        ?>
</select><br>

Course:
<select class="selectpicker span5" data-style="btn-primary" name="course" tabindex="-1" id="simple-big">
    <option value="BS Information Technology major in Service Management" />BS Information Technology 
    <option value="BS Computer Science" />BS Computer Science
	<option value="BS Computer Network Administration" />BS Network Administration
</select><br>

Course Year:
<select class="selectpicker span2" data-style="btn-primary" name="course_year" tabindex="-1" id="simple-big">
	 <option value="1"/>1st
	 <option value="2"/>2nd
	 <option value="3"/>3rd
	 <option value="4"/>4th
</select><br>
Section
<select class="selectpicker span2" data-style="btn-primary" name="section" tabindex="-1" id="simple-big">
	<option value="A"/>A
	<option value="B"/>B
	<option value="C"/>C
</select><br>
Semester
<select class="selectpicker span2" data-style="btn-primary" name="semester" tabindex="-1" id="simple-big">
	<option value="first"/>First Semester
	<option value="second"/>Second Semester
</select><br>

<input type="submit" name="submit2">
</form>

<?php
	if(isset($_POST['submit2']))
	{
		$_SESSION['section'] = $_POST['section'];
		$_SESSION['course_year'] = $_POST['course_year'];
		$_SESSION['course'] = $_POST['course'];
		$_SESSION['school_year'] = $_POST['school_year'];
		$_SESSION['semester'] = $_POST['semester'];
		redirect_to("edit_sem_sched.php");
	}
?>

	 <input type="text" name="school_year"> <!-- must be combo box -->
	 <input type="text" name="year"> <!-- must be combo box -->
	 <input type="text" name="section"> <!-- must be combo box -->
	 <input type="text" name="course"> <!-- must be combo box -->
	 <input type="text" name="room"> <!-- must be combo box -->
	 <input type="text" name="start_time"> <!-- must be combo box -->
	 <input type="text" name="end_time"> <!-- must be combo box -->


<br>
<br>

MY SCHEDULE



<table border="1">
	<thead>
		<th>Time</th>
		<th>Subject</th>
		<th>Room</th>
		<th>Section</th>
	</thead>
	<tbody>
<?php

	$query = "SELECT * FROM tblsem_sched WHERE teacher ='2'";
	$result = @mysql_query($query);
	while($row = mysql_fetch_array($result))
    {
    	$subject = $row['subject'];
		$query2 = "SELECT * FROM tblsubject WHERE id_subject ='$subject'";
		$result2 = @mysql_query($query2);
		$row2 = mysql_fetch_array($result2);

		echo "<tr>";
		echo "	<td>".full_time($row['start_time']).'-'.full_time($row['end_time'])."</td>";
		echo "	<td>".$row2['subject_desc']."</td>";
		echo "	<td>".$row['room']."</td>";
		echo "	<td>".$row['course_year'].'-'.$row['section']."</td>";
		echo "</tr>";
	}
?>
	</tbody>
</table>

Records:
<?php

	$query = "SELECT id_sem_sched,subject,section,course_year,course,teacher FROM tblsem_sched WHERE teacher ='2'";
	$result = @mysql_query($query);
	while($row = mysql_fetch_array($result))
    {
    	$subject = $row['subject'];
    	$query2 = "SELECT subject_desc,id_subject FROM tblsubject WHERE id_subject ='$subject'";
		$result2 = @mysql_query($query2);
		$row2 = mysql_fetch_array($result2);	
    	if($row['course'] == "BS Information Technology major in Service Management"){$course = "ITSM";}

    	echo "<form method='post'>";
    	echo "<input type='hidden' name='id_sem_sched' value='".$row['id_sem_sched']."'>";
    	echo "<input type='hidden' name='id_subject' value='".$row2['id_subject']."'>";
    	echo "<input type='hidden' name='section' value='".$row['section']."'>";
    	echo "<input type='hidden' name='course' value='".$row['course']."'>";
    	echo "<input type='hidden' name='course_year' value='".$row['course_year']."'>";
    	echo "<input type='hidden' name='teacher' value='".$row['teacher']."'>";
    	echo "<button type='submit' name='submit'>".$row2['subject_desc'].' '.$row['course_year'].'-'.$row['section'].$course."</button>";
    	echo "</form>";
	}

	if(isset($_POST['submit']))
	{
		$_SESSION['id_sem_sched'] = $_POST['id_sem_sched'];
		$_SESSION['id_subject'] = $_POST['id_subject'];
		$_SESSION['section'] = $_POST['section'];
		$_SESSION['course_year'] = $_POST['course_year'];
		$_SESSION['course'] = $_POST['course'];
		$_SESSION['teacher'] = $_POST['teacher'];

		redirect_2("edit_grades.php");
	}
?>




