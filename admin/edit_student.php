<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("header.php"); ?>



<div class="row-fluid">
            <div class="span8 offset2">
                <section class="widget">
                    <header>
                
                        <h4>
                            <i class="icon-file-alt"></i>
                            User Accounts<strong> | Students</strong><small> (Edit Account)</small>
						<span class="pull-right">
						    <a href="ua_student.php" class="btn btn-warning" id="btnAddNew"><i class="icon-undo"></i> Back to Student Users</a>
						</span>                            
                       </h4>
                    </header>
                    <div class="body">


<?php

/********************
FUNCTION FOR edit student

*********************/
	
		

	if(isset($_SESSION['edit_id']))
	{
		$query = "SELECT * FROM tblstudent WHERE id_student = '$_SESSION[edit_id]'";		
		$result = @mysql_query($query);
		$row = mysql_fetch_array($result);
	}	

		if($row['course'] == "BS Information Technology major in Service Management"){ $selected1 = true; }	
		else if($row['course'] == "BS Computer Science"){$selected2 = true;} else{ $selected3 = true; }

		if($row[12] == 'first'){ $selected4 = true; } else if($row[12] == 'second'){ $selected5 = true; }
        else if($row[12] == 'third'){ $selected6 = true; } else if($row[12] == 'fourth') { $selected7 = true;}
       
       if($row['section'] == 'A'){ $selected8 = true; } else if($row['section'] == 'B'){ $selected9 = true; }
        else if($row['section'] == 'C'){ $selected10 = true; }

       if($row['gender'] == 'Male'){ $selected11 = true; } else if($row['gender'] == 'Female'){ $selected12 = true;}
       

?>


	<form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>
                        <fieldset> 
                            <legend class="section">
                            </legend>
                            <?php if($row['image'] != ""){ $image = $row['image'];} else {$image = "default.png";}?>
                            <center><?php echo "<img src='upload/".$image."'/>"; ?></center>
                            <br>
                            <div class="control-group">
                                <label class="control-label" for="basic">Student Number:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="student_no" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row[11]."'";}?>/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">First Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="firstname" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row['firstname']."'";}?> />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Middle Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="middlename" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row['middlename']."'";}?>/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Last Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="lastname" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row['lastname']."'";}?> />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Birthday</label>
                                <div class="controls">
                                    <input type="date" id="basic" name="bday" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".date('Y-m-d',strtotime($row['dob']))."'";}?>/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="simple-big">Gender</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span2" data-style="btn-primary" name="gender" tabindex="-1" id="simple-big">
                                        <option value="Male" <?php if(isset($_SESSION['edit_id']) && isset($selected11)){ echo "selected";}?>/>Male
                                        <option value="Female" <?php if(isset($_SESSION['edit_id']) && isset($selected12)){ echo "selected";}?>/>Female
                                    </select>
                                </div>
                            </div>
                            <legend class="section" style="color:Black;">
                                Address
                            </legend>

                            <div class="control-group">
                                <label class="control-label" for="basic">Street No.</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="stno" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row['add_no']."'";}?>/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Street</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="st" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row['add_street']."'";}?>/>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">Barangay</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="brgy" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row['add_brgy']."'";}?>/>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">City</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="city" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row['add_city']."'";}?>/>
                                </div>
                            </div>
                            <legend class="section">
                            </legend>
                            <div class="control-group">
                                <label class="control-label" for="basic">Contact Number</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="contactno" required="required" value=<?php if(isset($_SESSION['edit_id'])){ echo "'".$row['contact_no']."'";}?>/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Course</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span5" data-style="btn-primary" name="course" tabindex="-1" id="simple-big">
                                        <option value="bsit" <?php if(isset($_SESSION['edit_id']) && isset($selected1)){ echo "selected";}?>/>BS Information Technology 
                                        <option value="bscs" <?php if(isset($_SESSION['edit_id']) && isset($selected2)){ echo "selected";}?>/>BS Computer Science
                                        <option value="bsnetad" <?php if(isset($_SESSION['edit_id']) && isset($selected3)){ echo "selected";}?>/>BS Network Administration
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Year</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span2" data-style="btn-primary" name="year" tabindex="-1" id="simple-big">
                                        <option value="first" <?php if(isset($_SESSION['edit_id']) && isset($selected4)){ echo "selected";}?>/>1st
                                        <option value="second" <?php if(isset($_SESSION['edit_id']) && isset($selected5)){ echo "selected";}?>/>2nd
                                        <option value="third" <?php if(isset($_SESSION['edit_id']) && isset($selected6)){ echo "selected";}?>/>3rd
                                        <option value="fourth" <?php if(isset($_SESSION['edit_id']) && isset($selected7)){ echo "selected";}?>/>4th
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Section</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span2" data-style="btn-primary" name="section" tabindex="-1" id="simple-big">
                                        <option value="A" <?php if(isset($_SESSION['edit_id']) && isset($selected8)){ echo "selected";}?>/>A
                                        <option value="B" <?php if(isset($_SESSION['edit_id']) && isset($selected9)){ echo "selected";}?>/>B
                                        <option value="C" <?php if(isset($_SESSION['edit_id']) && isset($selected10)){ echo "selected";}?>/>C
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="simple-big">Image:</label>
                                <div class="controls controls-row">
                               			<input name="file" type="file" id="userfile"/>  
                                    
                                </div>
                            </div>
						</fieldset>
						<div class="form-actions">
                            <button type="submit" name="submit" class="btn btn-primary">Validate &amp; Submit</button>
                           
                        </div>
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
	if(isset($_POST['submit']))
	{
		if((!empty($_POST['student_no'])) && (!empty($_POST['firstname'])) && (!empty($_POST['lastname'])) && (!empty($_POST['middlename'])) && (!empty($_POST['bday'])) && (!empty($_POST['gender'])) && (!empty($_POST['stno'])) && (!empty($_POST['st'])) && (!empty($_POST['brgy'])) && (!empty($_POST['city'])) && (!empty($_POST['contactno'])) && (!empty($_POST['course'])) && (!empty($_POST['year'])) && (!empty($_POST['contactno'])))
		{
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$dob = $_POST['bday'];
			$add_no = $_POST['stno'];
			$add_street = $_POST['st'];
			$add_brgy = $_POST['brgy'];
			$add_city= $_POST['city'];
			$contactno = $_POST['contactno'];
			$gender = $_POST['gender'];
			$student_no = $_POST['student_no'];
			$yr = $_POST['year'];
			$section = $_POST['section'];

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
				$course = "BS Network Administration";
			}
			$image = upload_pic(random_string());
			edit_student($_SESSION['edit_id'],$lastname,$firstname,$middlename,$dob,$add_no,$add_street,$add_brgy,$add_city,$contactno,$gender,$student_no,$yr,$section,$course,$image);
			print "<script>window.location = 'edit_student.php';</script>";
		}

	}
?>

<?php require_once("footer.php"); ?>
</div></section></div></div></body></html>