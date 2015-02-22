<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php teacher_confirm_logged_in(); ?>
<?php require_once("header.php");?>     

<div id="content">
  <h3 style="font-family: Harlow Solid Italic;"><center>Settings</center></h3>
<form id="form_pass" method="post" >

<div data-role="content" class="content">
                <h3>Change password</h3>
                <label for="password1" id="lbloldpass">*Old Password:</label> 
                <label id="oldpass" class="error" for="password1"></label> 
                <input type="password"  id="password1" name="old" value="<?php if (isset($old)) { echo $old; } ?>" autocomplete="off" placeholder="Type your old password" required>
                
                <label for="password2" id="lblnewpass">*New Password:</label> 
                <label class="error" for="password2"></label>  
                <input type="password"  id="password2" name="new" value="<?php if (isset($new)) { echo $new; } ?>" autocomplete="off" placeholder="Type your new password" required>
                

                <label for="password" id="lblretype"> *Re-type Password:</label> 
                <label class="error" for="password"></label> 
                <input type="password"  id="password" name="retype" value="<?php if (isset($retype)) { echo $retype; } ?>" autocomplete="off" placeholder="Re-type your new password" required>               
                
                <p>
                    <center><button id="submit" type="submit" data-role="button" name="submit" data-theme="b" data-inline="true">Save</button></center>
                </p>
</div><!-- /content -->
</form>
</div>


<?php require_once("footer.php");?> 