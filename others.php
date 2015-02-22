<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php confirm_logged_in(); ?>
<?php require_once("header.php");?>	


<?php 
	if(isset($_REQUEST['id'])){$id = $_REQUEST['id'];} else { $id = "";}
	if(isset($_REQUEST['user'])){$level_user = $_REQUEST['user'];} else { $level_user = "";}

	if($level_user == 'student')
	{
		$query = "SELECT * FROM tblstudent WHERE id_student = '$id'";
	   	$result = @mysql_query($query);
	   	$row = mysql_fetch_array($result);
	  	if ($row['image'] == ""){ $image = "default.png";} else { $image = $row['image'];}
	  	if($row[12] == 'first'){ $yrandsec = 'I - '; } else if($row[12] == 'second'){ $yrandsec = 'II - '; }
        else if($row[12] == 'third'){ $yrandsec = 'III - '; } else if($row[12] == 'fourth') { $yrandsec = 'IV - ';}
        else { $yrandsec = 'V - ';};
        $yrandsec .= $row[13];
        $course = $row[15];
	}	
	if($level_user == 'teacher')
	{
		$query = "SELECT * FROM tblteacher WHERE id_teacher = '$id'";
	   	$result = @mysql_query($query);
	   	$row = mysql_fetch_array($result);
	  	if ($row['image'] == ""){ $image = "default.png";} else { $image = $row['image'];}
	}	
		
?>

<?php 

$bday = formatDate($row['dob']);
$age = date("Y", strtotime($bday));
$age2 = date("Y", strtotime(dateNow()));
$age = $age2 - $age;
?>

<div id="content" style="padding: 20px;">
		
<div class="row-fluid">
            <h3 style="font-family: Harlow Solid Italic;"><center>Profile</center></h3>
	<div class="span3 center">
		
		<?php echo '<img id="profile" src="admin/upload/'.$image.'" />';?>
		
		<div class="space space-4"></div>
 <?php
        $fullname = $row['firstname']." ".$row['lastname'];
        $address = $row['add_no']." ".$row['add_street']." ".$row['add_brgy'].", ".$row['add_city'];

?>

	</div><!--/span-->

	<div class="span9">
		<h4 class="blue">
			<span class="middle"><?php echo ucwords(strtolower($fullname));?></span><?php//name?>

			<span class="label label-purple arrowed-in-right" style="color:White">
				<i class="icon-circle smaller-80"></i>
				<?php echo ucfirst($level_user);?>
			</span>
		</h4>

		<div class="profile-user-info">
			<div class="profile-info-row">
				<div class="profile-info-name"> 
			<?php if($level_user == 'teacher' ){ echo "Employee No.";} else{ echo "Student No.";}?> </div>

				<div class="profile-info-value">
					<span>
			<?php if($level_user == 'teacher' ){ echo $row['employee_no'];} else{ echo $row['student_no'];}?> </span>
				</div>
			</div>

			<?php 
		if($level_user != "teacher")
		echo '

			<div class="profile-info-row">
				<div class="profile-info-name"> Course </div>

				<div class="profile-info-value">
					<span>'.$course.'</span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Year & Section </div>

				<div class="profile-info-value">
					<span>'.$yrandsec.'</span>
				</div>
			</div>

		';

		?>

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
						echo "";
					}else{
						echo htmlspecialchars($row['aboutme']);
					}

					?>
					<br>
					</p>
				</div>
			</div>
		</div>
	</div>


</div>
</div>



				
			</div>

<?php require_once("footer.php");?>			