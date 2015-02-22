<!-- function for password generator, display , print button -->
function for password generator, display , print button <br><br>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
// $password = rtnEncrypt(randomPassword());    

// $query = "UPDATE tblstudent SET password = '$password' WHERE id_student='7'";
// $result = @mysql_query($query);
	
$query = "SELECT id_student,student_no,password,image FROM tblstudent";
$result = @mysql_query($query);
// $row = mysql_fetch_array($result);
// echo rtnDecrypt("Dz2Voy36v7V9o1shvAlxiE1FChAhTqoPOK68m7H12lE=");
// echo "<br>".rtnDecrypt($row['password']);

$ian = rtnEncrypt(randomPassword());
echo $ian;
echo rtnDecrypt("$ian");
$ian = rtnEncrypt("JwDwBO4W");

echo "<span id='formLink'></span>";
//student users
echo "<table>";
        while($row = mysql_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo '<td><img src="upload/'.$row[3].'"/></td>';
            echo "<td>".$row[1]."</td>";
            echo "<td>".rtnDecrypt($row[2])."</td>";
          	echo "<td>";
            print  '<form id="'.$row[0].'" method="POST"><input type="hidden" name="newpass_id" value="'.$row[0].'"/>';
            echo '<button type="submit" class="delBtn tooltip-success" data-rel="tooltip" title="New Password" alt="New Password" name="newpass">new password
                </button>';
                    //<i class="icon-edit bigger-120"></i>
            print '<input type="hidden" name="edit_id" value="'.$row[0].'"/>';
            echo '<button type="submit" class="delBtn tooltip-success" data-rel="tooltip" title="Delete" alt="Delete"  name="edit">
                    edit
                 </button>';
            print '</form>';
            echo "</td>";
            echo "</tr>";           
        }

echo "</table>";

if(isset($_POST['newpass'])){
	$id = $_POST['newpass_id'];
	$query = "UPDATE tblstudent SET
		 			password = '".rtnEncrypt(randomPassword())."'
			        WHERE id_student = '$id'"; 
    $result = @mysql_query($query); 

}
if(isset($_POST['edit'])){
	$_SESSION['edit_id'] = $_POST['edit_id'];
	echo "<script>window.location = 'edit_student.php';</script>";

}

?>

<form id="printAndsort" action="print.php" post="post">
Course <select name="course">
    <option value="BS Information Technology major in Service Management">ITSM</option>
    <option value="BS Computer Science">CSAD</option>
    <option value="BS Computer Network Administration">CNA</option>
</select><br>
Section<select name="section">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
</select><br>
Year<select name="year">
    <option value="first">First</option>
    <option value="second">Second</option>
    <option value="third">Third</option>
    <option value="fourth">Fourth</option>
</select>
<!-- <input type"hidden" id="section_id" value=""/>
<input type"hidden" id="year_id" value=""/> -->
<button id='printBtn' type="submit">Print</button>
</form>
<form enctype="multipart/form-data" name="uploadform" method="post" id="from">
          <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
            <tr> 
               <td>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input name="file" type="file" id="userfile"/>
                <input name="upload" type="submit" class="myc" id="upload" value="Upload"/>
               </td>
            </tr>
          </table>
</form>
<?php 
if(isset($_POST['upload']))
{

	echo upload_pic(random_string());
	echo "tmpname:".$_FILES["file"]["tmp_name"];
	echo "<br>";
	echo  "name:".$_FILES["file"]["name"];
	echo "<br>";
	echo    "type".$_FILES["file"]["type"];
	echo "<br>";
	echo    "size:".$_FILES["file"]["size"];
	echo "<br>";
	echo     "eroo".$_FILES["file"]["error"];
}
?>
<?php
if(isset($_SESSION['sched_edit']))
{
    $id = $_SESSION['sched_edit'];
    $query = "SELECT * FROM tblschedule WHERE id_schedule = '$id'";
    $result = @mysql_query($query);
    $row = mysql_fetch_array($result);
}
?>

<h4>Add Schedule/Event</h4>
<form method="post" enctype="multipart/form-data">
    Title:<input type="text" name="title" <?php if(isset($_SESSION['sched_edit']) && (isset($row['title']))){ echo "value='".$row['title']."'"; } ?>><br>
    Place:<input type="text" name="place" <?php if(isset($_SESSION['sched_edit']) && (isset($row['place']))){ echo "value='".$row['place']."'"; } ?>><br>
    Date:<input type="date" name="date" <?php if(isset($_SESSION['sched_edit']) && (isset($row['date_sched']))){ echo "value='".formatDate($row['date_sched'])."'"; } ?>><br>
    Time:<input type="time" name="time" <?php if(isset($_SESSION['sched_edit']) && (isset($row['date_sched']))){ echo "value='".formatTime($row['date_sched'])."'"; } ?>><br>
    Description: <textarea name="desc" col="5" rows="5"><?php if(isset($_SESSION['sched_edit']) && (isset($row['description']))){ echo $row['description']; } ?></textarea> <br>
    <input type="submit" name="submit" value="submit">
</form>




<?php

//automatic author and date created 
//kulang pa ng schedule for
/*
kulang pa ng author dapat automatic na sya kapag ang nakalogon 
kung sino ung maglolog na gagamit ng add schedule form sya ung magigigng author
 so kailang gumawa ng user_logs,user_log_date and time and issesion ung user_level
 tapos automatic na ung author..

 hmm ano pa ba un na siguro un... 

 schedule for na choices
 magsosort ng from all year/ course /yr and section/ year and course

 then ayun ung malalagay..

enden lagyan ng picture if guston nila choose from Semeinar icon/ party-icon/ meeting icon/ no-classes icon/ heart icon

////////!!!design and validation of time and date:]
*/

$date = date('Y-m-d');
// echo $time;

// function formatTime($time){
//             return date("H:i", strtotime($time));    
// }
// function formatDate($date){
//             return date("Y-m-d", strtotime($date));    
// }

// function timeNow(){
//         date_default_timezone_set('Etc/GMT+8');   
//         $time = date('h:i:s A');
//         return date("H:i", strtotime($time));
// }
// function dateNow(){
//         date_default_timezone_set('Etc/GMT+8');   
//         return date("Y-m-d");
// }

// function dateNow_db_format(){
//         date_default_timezone_set('Etc/GMT+8');   
//         return date("Y-m-d")." ".date("H:i:s");   
// }


echo "<input type='time' value='".timeNow()."'>";
// function add_schedule($title,$place,$date,$desc,$time,$author){
//         $created = dateNow_db_format();
//         $date .= " ";
//         $date .= $time;
//         $query = "INSERT INTO tblschedule(title,place,date_sched,description,date_created,author)
//         VALUES  ('$title','$place','$date','$desc','$created','$author')";
//         $result = @mysql_query($query);
// }
// function edit_schedule($id,$title,$place,$date,$desc,$time,$author){
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


if(isset($_POST['submit']))
{
    if(($_POST['date'] >= dateNow()))
     {
        if(($_POST['date'] == dateNow()) && (formatTime(($_POST['time'])) > formatTime(timeNow()))){echo "Invalid Time.";$date = false;}
        else{$date = true;}
     }   
     else{
        $date = false;
        echo "Invalid date. Input today or advance.";
     }

    if((!empty($_POST['title']) && (!empty($_POST['place']) && (!empty($_POST['desc']) && (!empty($_POST['time']) && $date && (!empty($_POST['date'])))))))
    {
        echo "work";
        add_schedule($_POST['title'],$_POST['place'],$_POST['date'],$_POST['desc'],$_POST['time'].":00",$_SESSION['level_user']);
        // edit_schedule($_SESSION['sched_edit'],$_POST['title'],$_POST['place'],$_POST['date'],$_POST['desc'],$_POST['time'].":00",$_SESSION['level_user']);
        unset($_SESSION['sched_edit']);
    }
    else{
        echo "not work";
    }
}
echo get_author("teacher");
// function full_date($date){
//     return date('l, M j, Y',strtotime($date));   
// }
// function full_time($date){
//     return date('h:i A',strtotime($date));
// }

//retrieve data
$query = "SELECT * FROM tblschedule";
$result = @mysql_query($query);
while ($row = mysql_fetch_array($result)) {
    echo "Title:".$row['title']."<br>";
    echo "Place:".$row['place']."<br>";
    echo "Date:".full_date($row['date_sched'])."<br>";
    echo "Time:".full_time($row['date_sched'])."<br>";
    echo "Description:".$row['description']."<br>";
    echo "Author:".$row['author']."<br>";
    echo "date created:".full_date($row['date_created'])."<br>";
    echo "time created:".full_time($row['date_created'])."<br>";
    echo "<form method='post'><br><br>";
    echo '<input type="hidden" name="sched_edit" value="'.$row[0].'">';
    echo '<input type="submit" name="submit2" value="EDIT">';    
    echo "</form>";

}

if(isset($_POST['submit2'])){
    $_SESSION['sched_edit'] = $_POST['sched_edit'];
}
?>










<script src="lib/jquery/jquery.1.9.0.min.js"> </script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#from").submit(function(){
			postData = $('#from').serialize();
			alert(""+postData+"");
		})
		$("#printBtn").click(function(){

		});
	});
</script>