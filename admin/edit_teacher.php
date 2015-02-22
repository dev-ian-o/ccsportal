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
                            User Accounts<strong> | Teachers</strong><small> (Edit Account)</small>
						<span class="pull-right">
						    <a href="ua_teacher.php" class="btn btn-warning" id="btnAddNew"><i class="icon-undo"></i> Back to Teacher Users</a>
						</span>                            
                       </h4>
                    </header>
                    <div class="body">


<?php

/********************
FUNCTION FOR edit student

*********************/
	
		

	if(isset($_SESSION['edit_id2']))
	{
		$query = "SELECT * FROM tblteacher WHERE id_teacher = '$_SESSION[edit_id2]'";		
		$result = @mysql_query($query);
		$row = mysql_fetch_array($result);

       if($row['gender'] == 'Male'){ $selected11 = true; } else if($row['gender'] == 'Female'){ $selected12 = true;}
	}	

       

?>


	<form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" id="form_newacc" enctype="multipart/form-data"/>
                        <fieldset> 
                            <legend class="section">
                            </legend>
                            <center><?php echo "<img src='upload/".$row['image']."'/>"; ?></center>
                            <br>
                            <div class="control-group">
                                <label class="control-label" for="basic">Student Number:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="employee_no" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['employee_no']."'";}?>/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">First Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="firstname" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['firstname']."'";}?> />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Middle Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="middlename" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['middlename']."'";}?>/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Last Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="lastname" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['lastname']."'";}?> />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Birthday</label>
                                <div class="controls">
                                    <input type="date" id="basic" name="bday" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".date('Y-m-d',strtotime($row['dob']))."'";}?>/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="simple-big">Gender</label>
                                <div class="controls controls-row">
                                    <select class="selectpicker span2" data-style="btn-primary" name="gender" tabindex="-1" id="simple-big">
                                        <option value="Male" <?php if(isset($_SESSION['edit_id2']) && isset($selected11)){ echo "selected";}?>/>Male
                                        <option value="Female" <?php if(isset($_SESSION['edit_id2']) && isset($selected12)){ echo "selected";}?>/>Female
                                    </select>
                                </div>
                            </div>
                            <legend class="section" style="color:Black;">
                                Address
                            </legend>

                            <div class="control-group">
                                <label class="control-label" for="basic">Street No.</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="stno" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['add_no']."'";}?>/>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Street</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="st" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['add_street']."'";}?>/>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">Barangay</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="brgy" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['add_brgy']."'";}?>/>
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">City</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="city" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['add_city']."'";}?>/>
                                </div>
                            </div>
                            <legend class="section">
                            </legend>
                            <div class="control-group">
                                <label class="control-label" for="basic">Contact Number</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="contactno" required="required" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['contact_no']."'";}?>/>
                                </div>
                            </div>
                            <div class="control-group">
                            <label class="control-label" for="basic">Email Address</label>
                                    <div class="controls">
                                        <input id="email" type="email" id="basic" data-trigger="change" required="required" class="span6 parsley-validated parsley-success" name="email" value=<?php if(isset($_SESSION['edit_id2'])){ echo "'".$row['emailadd']."'";}?>>
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
		if((!empty($_POST['employee_no'])) && (!empty($_POST['firstname'])) && (!empty($_POST['lastname'])) && (!empty($_POST['middlename'])) && (!empty($_POST['bday'])) && (!empty($_POST['gender'])) && (!empty($_POST['stno'])) && (!empty($_POST['st'])) && (!empty($_POST['brgy'])) && (!empty($_POST['city'])) && (!empty($_POST['email'])) && (!empty($_POST['contactno'])))
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
			$employee_no = $_POST['employee_no'];		
            
			$image = upload_pic(random_string());
            $emailadd = $_POST['email'];
            edit_teacher($_SESSION['edit_id2'],$lastname,$firstname,$middlename,$dob,$add_no,$add_street,$add_brgy,$add_city,$contactno,$gender,$employee_no,$image,$emailadd);
			print "<script>window.location = 'edit_teacher.php';</script>";
		}

	}
?>

<?php require_once("footer.php"); ?>
</div></section></div></div></body></html>