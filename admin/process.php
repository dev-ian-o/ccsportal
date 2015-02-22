<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
$isset = true;
if(!empty($_POST['firstname'])) { $firstname = $_POST['firstname'];} else{ 
	$isset = false;}
if(!empty($_POST['middlename'])) { $middlename = $_POST['middlename'];} else{ 
	$isset = false;}
if(!empty($_POST['lastname'])) { $lastname = $_POST['lastname'];} else{ 
	$isset = false;}
if(!empty($_POST['bday'])) { $dob = $_POST['bday'];} else{ 
	$isset = false;}
if(!empty($_POST['gender'])) { $gender = $_POST['gender'];} else{ 
	$isset = false;}
if(!empty($_POST['stno'])) { $add_no = $_POST['stno'];} else{ 
	$isset = false;}
if(!empty($_POST['st'])) { $add_str = $_POST['st'];} else{ 
	$isset = false;}
if(!empty($_POST['brgy'])) { $add_brgy = $_POST['brgy'];} else{ 
	$isset = false;}
if(!empty($_POST['city'])) { $city = $_POST['city'];} else{ 
	$isset = false;}
if(!empty($_POST['contactno'])) { $contactno = $_POST['contactno'];} else{ 
	$isset = false;}
if(!empty($_POST['course'])) { 

	if($_POST['course']=="bsit")
	{
		$course = "BS Information Technology major in Service Management";
	}	
	else if($_POST['course']=="bscs")
	{
		$course = "BS Computer Science";
	}
	else
	{
		$course = "BS Network Administrator";
	}
} else{ 
	$isset = false;}
if(!empty($_POST['year'])) { $yr = $_POST['year'];} else{ 
	$isset = false;}
if(!empty($_POST['section'])) { $section = $_POST['section'];} else{ 
	$isset = false;}
if(!empty($_POST['student_no'])) { $student_no = $_POST['student_no'];} else{ 
	$isset = false;}
$password = rtnEncrypt(randomPassword());    


// echo $_POST['file'];
// echo "tmpname:".$_FILES["file"]["tmp_name"];
//     echo "<br>";
//     echo  "name:".$_FILES["file"]["name"];
//     echo "<br>";
//     echo    "type".$_FILES["file"]["type"];
//     echo "<br>";
//     echo    "size:".$_FILES["file"]["size"];
//     echo "<br>";
//     echo     "eroo".$_FILES["file"]["error"];

 // function printTable(){
 //        $query = "SELECT *
 //                  FROM tblstudent";
 //        $result = @mysql_query($query);
 //        while($row = mysql_fetch_array($result))
 //        {
 //            echo "<tr>";
 //            echo "<td>".$row[0]."</td>";
 //            echo '<td><img src="../avatars/avatar.png"/></td>';
 //            echo "<td>".$row['lastname']."</td>";
 //            echo "<td>".$row['firstname']."</td>";
 //            echo "<td>".$row['middlename']."</td>";
 //            echo "<td>".$row['dob']."</td>";
 //            echo "<td>".$row['gender']."</td>";
 //            echo "<td>".$row['add_city']."</td>";
 //            echo "<td>".$row['contact_no']."</td>";
 //            if($row[12] == 'first'){ $yrandsec = '1ST'; } else if($row[12] == 'second'){ $yrandsec = '2ND'; }
 //            else if($row[12] == 'third'){ $yrandsec = '3RD'; } else if($row[12] == 'fourth') { $yrandsec = '4TH';}
 //            else { $yrandsec = '5TH';};
 //            echo "<td>".$yrandsec."</td>";
 //            echo "<td>".$row['section']."</td>";
 //            echo "<td>".$row['course']."</td>";
 //            echo "<td>";
 //            echo '<a href="#"class="tooltip-success" data-rel="tooltip" title="Edit" alt="Edit">
 //                    <i class="icon-edit bigger-120"></i>
 //                </a>';
 //            echo '<a href="#"class="tooltip-success" data-rel="tooltip" title="Delete" alt="Delete">
 //                    <i class="icon-trash bigger-120"></i>
 //                </a>';
 //            print  '<form method="POST"><input type="hidden" name="edit_id" value="'.$row[0].'"/></form>';
 //            print  '<form method="POST"><input type="hidden" name="delete_id" value="'.$row[0].'"/></form>';
 //            echo "</td>";
 //            echo "</tr>";           
 //        }
 //    }


    // $image = upload_pic($filename,$_FILES["file"]["name"]
    //     ,$_FILES["file"]["type"]
    //     ,$_FILES["file"]["size"]
    //     ,$_FILES["file"]["error"]
    //     ,$_FILES["file"]["tmp_name"]); 

if ($isset != false)
    {	
    // $image = upload_pic($filename,$_FILES["file"]["name"]
    //     ,$_FILES["file"]["type"]
    //     ,$_FILES["file"]["size"]
    //     ,$_FILES["file"]["error"]
    //     ,$_FILES["file"]["tmp_name"]); 
    
	function addua_student($firstname,$middlename,$lastname,$dob,$add_no,$add_str,$add_brgy,$city,$contactno,$gender,$student_no,$yr,$section,$course,$password,$image){
        
    	$query = "INSERT  INTO tblstudent
    			(lastname,firstname,middlename,dob,add_no,add_street,add_brgy,add_city,contact_no,gender,student_no,yr,section,course,password,image)
		VALUES  ('$lastname','$firstname','$middlename','$dob','$add_no','$add_str','$add_brgy','$city','$contactno','$gender','$student_no','$yr','$section','$course','$password','$image')";
		$result = @mysql_query($query);
    }
    
    // $image = "0JfncNE8.png"; 
    addua_student($firstname,$middlename,$lastname,$dob,$add_no,$add_str,$add_brgy,$city,$contactno,$gender,$student_no,$yr,$section,$course,$password,$image);	
	echo '<script>$("#addNewUser").modal("hide");</script>';
	$isset = false;
	echo '<script>$("#form_newacc")[0].reset();</script>';
	echo '<script>location.reload(false);</script>';	
}

if(isset($_POST['id_delete']))
{    
        $id_delete = $_POST['id_delete'];
        $query = "DELETE FROM tblstudent WHERE id_student ='$id_delete'";
        $result = @mysql_query($query);
        $_SESSION['delete_id'] = "";
        echo '<script>location.reload(false);</script>';    
}    
if(isset($_POST['id_delete']))
{    
        $id_delete = $_POST['id_delete'];
        $query = "DELETE FROM tblteacher WHERE id_teacher ='$id_delete'";
        $result = @mysql_query($query);
        $_SESSION['delete_id2'] = "";
        echo '<script>location.reload(false);</script>';    
}    

?>