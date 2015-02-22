<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/variables.php"); ?>
<?php require_once("header.php"); ?>
<?php
	if(isset($_SESSION['new_user']))
	{
		if($_SESSION['new_user'] == "new_user")
		{
			if($_SESSION['level_user']  == "teacher")
			{
				$userid = $_SESSION['teacher_id'];
				$level = "teacher";
			}
			else if($_SESSION['level_user'] == "student")
			{
				$userid = $_SESSION['user_id'];
				$level = "student";
			}	
		}	
		else
		{
			redirect_to("home.php");
		}
	}
	else
	{
		redirect_to("home.php");
	}	
	
?>
<div id="content" style="padding: 20px;">
	<div id="samps"></div>
	<h3 style="font-family: Harlow Solid Italic;"><center>Change Password</center></h3>
	<form id="form_pass" method="post" >
	<div data-role="content" class="content">

	                <label for="password2" id="lblnewpass">*New Password:</label> 
	                <label class="error" for="password2"></label>  
	                <input type="password"  id="password2" name="new" value="<?php if (isset($new)) { echo $new; } ?>" autocomplete="off" placeholder="Type your new password" required>
	                

	                <label for="password" id="lblretype"> *Re-type Password:</label> 
	                <label class="error" for="password"></label> 
	                <input type="password"  id="password" name="retype" value="<?php if (isset($retype)) { echo $retype; } ?>" autocomplete="off" placeholder="Re-type your new password" required>               
	            	<input type="hidden" name="userid" <?php if(isset($userid)){ echo "value='".$userid."'";}?>>
	            	<input type="hidden" name="user" <?php if(isset($userid)){ echo "value='".$level."'";}?>>    
	                <p>
	                    <center><button id="submit" type="submit" data-role="button" name="submit" data-theme="b" data-inline="true" data-icon="check">Save</button></center>
	                </p>
	</div><!-- /content -->
	</form>
	<span id="oldpass"></span>

</div>
<?php require_once("footer.php");?>		