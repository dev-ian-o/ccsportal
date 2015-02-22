<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
	if(isset($_POST['submit']))
	{
		if($_POST['aboutme'] != "")
		{
			// $id = $_SESSION['user_id'];
			// $aboutme = htmlentities(htmlspecialchars($_POST['aboutme']));
			// $query = "UPDATE tblstudent SET 
			// aboutme = '$aboutme'
			// WHERE id_student = '$id'";		
			// $result = @mysql_query($query);
		}
	}
?>

<?php require_once("header.php"); ?>
<div id="content" style="padding: 20px;">
		
<div class="row-fluid">
            <h3 style="font-family: Harlow Solid Italic;"><center>My Profile</center></h3>
	<div class="span3 center">
		
		<?php echo '<img id="profile" src="admin/upload/'.$image.'" />';?>
		
		<div class="space space-4"></div>
 <?php

        $fullname = $row[2]." ".$row[1];
        $address = $row[5]." ".$row[6]." ".$row[7].", ".$row[8];
        if($row[12] == 'first'){ $yrandsec = 'I - '; } else if($row[12] == 'second'){ $yrandsec = 'II - '; }
        else if($row[12] == 'third'){ $yrandsec = 'III - '; } else if($row[12] == 'fourth') { $yrandsec = 'IV - ';}
        else { $yrandsec = 'V - ';};
        $yrandsec .= $row[13];
        $course = $row[15];

?>
<?php 

$bday = formatDate($row['dob']);
$age = date("Y", strtotime($bday));
$age2 = date("Y", strtotime(dateNow()));
$age = $age2 - $age;
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
				<div class="profile-info-name"> Student No. </div>

				<div class="profile-info-value">
					<span><?php echo $id_no;?></span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Course </div>

				<div class="profile-info-value">
					<span><?php echo $course;?></span>
				</div>
			</div>

			<div class="profile-info-row">
				<div class="profile-info-name"> Year & Section </div>

				<div class="profile-info-value">
					<span><?php echo $yrandsec;?></span>
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
					<div  id='about'></div>
					<?php 
					if($row['aboutme'] == ""){
						echo "<p id='here'>Write something here...</p>";
					}else{
						echo "<p id='here'>".htmlspecialchars($row['aboutme']).'</p>';
					}

					?>
					<br>
		
					<a href="#aboutme" data-role="button" data-inline="true" data-mini="true" data-shadow="false" >Edit</a>
				</div>
			</div>
		</div>
	</div>



</div>
</div>
		
<div id="aboutme">
        <!-- Overview panel -->
        <div id="panel-overview">
        	<form method="post" id="abouts">
        	<?php echo '<textarea name="aboutme" id="aboutText" placeholder="Write a brief information about yourself...." rows="10" cols="10" required="">'.$row['aboutme'].'</textarea>'?>
        	<button type="submit" name="submit" id="save">Save</button>
                  <!-- header info -->
            </form>
          <h3 class="Header" id="something">Edit about yourself...</h3>
          <a href="#page" class="Prev" id="this"></a>
      </div>
</div>


				
			</div>
<?php require_once("footer.php");?>		
<script type="text/javascript">
	$("#save").click(function(){
		var about = $("#aboutText").val();
        $("#here").html(about);
		$('#aboutme').trigger('close');
	});
</script>