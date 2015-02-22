<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php
	if(isset($_POST['submit']))
	{
		if($_POST['aboutme'] != "")
		{
			$id = $_SESSION['teacher_id'];
			$aboutme = htmlentities(htmlspecialchars($_POST['aboutme']));
			$query = "UPDATE tblteacher SET 
			aboutme = '$aboutme'
			WHERE id_teacher = '$id'";		
			$result = @mysql_query($query);
		}
	}
?>
<?php teacher_confirm_logged_in()?> 
<?php require_once("header.php");?>	

<?php 

$bday = formatDate($row['dob']);
$age = date("Y", strtotime($bday));
$age2 = date("Y", strtotime(dateNow()));
$age = $age2 - $age;
?>
<div id="content" style="padding: 20px;">
		
<div class="row-fluid">
            <h3 style="font-family: Harlow Solid Italic;"><center>My Profile</center></h3>
	<div class="span3 center">
		
		<?php echo '<img id="profile" src="../admin/upload/'.$image.'" />';?>
		
		<div class="space space-4"></div>
 <?php

        $fullname = $row['firstname']." ".$row['lastname'];
        $address = $row['add_no']." ".$row['add_street']." ".$row['add_brgy'].", ".$row['add_city'];

?>

	</div><!--/span-->

	<div class="span9">
		<h4 class="blue">
			<span class="middle"><?php echo $fullname;?></span><?php//name?>

			<span class="label label-purple arrowed-in-right" style="color:White">
				<i class="icon-circle smaller-80"></i>
				<?php echo ucfirst($_SESSION['level_user']);?>
			</span>
		</h4>

		<div class="profile-user-info">
			<div class="profile-info-row">
				<div class="profile-info-name"> Employee No. </div>

				<div class="profile-info-value">
					<span><?php echo $id_no;?></span>
				</div>
			</div>
		


			<div class="profile-info-row">
				<div class="profile-info-name"> Address </div>

				<div class="profile-info-value">
					<span><?php print $address;?></span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Birthday </div>

				<div class="profile-info-value">
					<span><?php echo date('M j, Y',strtotime($row['dob'])); ?></span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Age </div>
				<div class="profile-info-value">
					<span><?php echo $age;?></span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Contact No. </div>
				<div class="profile-info-value">
					<span><?php echo $row['contact_no'];?></span>
				</div>
			</div>

		</div>

		
	</div><!--/span-->
</div><!--/row-fluid-->

<div class="space-20"></div>

<div class="row-fluid">
	<div class="span6">
		<div class="widget-box transparent">
			<div class="widget-header widget-header-small">
				<h4 class="smaller">
					<i class="icon-check bigger-110"></i>
					Little About Me
				</h4>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<p>
					<?php 
					if($row['aboutme'] == ""){
						echo "Write something here...";
					}else{
						echo htmlspecialchars($row['aboutme']);
					}

					?>
					<br>
					<a href="#aboutme" data-role="button" data-inline="true" data-mini="true" data-shadow="false" >Edit</a>
					</p>
				</div>
			</div>
		</div>
	</div>


</div>
</div>
<div id="aboutme">
        <!-- Overview panel -->
        <div id="panel-overview">
        	<form method="post">
        	<?php echo '<textarea name="aboutme" placeholder="Write a brief information about yourself...." rows="10" cols="10" required="">'.$row['aboutme'].'</textarea>'?>
        	<button type="submit" name="submit">Save</button>
                  <!-- header info -->
            </form>
          <h3 class="Header" id="something">Edit about yourself...</h3>
          <a href="#page" class="Prev" id="this"></a>
      </div>
</div>



				
			</div>

<?php require_once("footer.php");?>			