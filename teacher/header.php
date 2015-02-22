
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />

		<meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=no" />

		<title>UMak CCS Portal</title>

		<link type="text/css" rel="stylesheet" href="../demo.css" />
		<link type="text/css" rel="stylesheet" href="../css/jquery.mmenu.all.css" />
		<link type="text/css" rel="stylesheet" href="../css/jquery.mobile.structure-1.3.2.min.css" />
		<link type="text/css" rel="stylesheet" href="../css/ace.min.css" />
		<link type="text/css" rel="stylesheet" href="../css/jquery.mobile.theme-1.3.2.min.css" />
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />
        <?php 

	    $id = $_SESSION['teacher_id']; // primary key userid
        $id_no = $_SESSION['id_no'] ;                                                              
		$query ="SELECT * FROM tblteacher WHERE employee_no = '$id_no' AND id_teacher = '$id'";                                                    
	   	$result = @mysql_query($query);
	   	$row = mysql_fetch_array($result);
	  	if ($row['image'] == ""){ $image = "default.png";} else { $image = $row['image'];}

		?>
<?php
echo	'<style type="text/css">';
echo	'	#header a.friends,';
echo	'	.header a.friends';
echo	'	{';
echo	'		margin: 1px 8px 0 0;';
echo	'		border-radius: 24px;';
echo	'		border: 2px solid #FFF;';
echo	'		max-width: 40px!important;';
echo	"		background-image: url('../admin/upload/".$image."');";
echo 	"		background-size: auto 45px;";
echo	'		}';
?>
			.widget-body{
			    background-color: transparent;
			    border: none;

			}
			


		</style>
		<style type="text/css">
			.Header,
			.Prev,
			.Next
			{
				display: none;
			}

			#page #photos
			{
				display: none;
			}
			h4
			{
				margin: 0 0 10px 0;
			}
			.thumb
			{
				display: block;
				width: 23%;
				margin: 0 2% 2% 0;
				float: left;
			}
			.thumb img
			{
				float: left;
				width: 100%;
				height: auto;
			}
			.thumb-xs
			{
				vertical-align: middle;
				display: inline-block;
				margin: -5px 10px -5px 0;
			}
			.clear
			{
				clear: both;
				display: block;
				padding: 5px 0;
				margin-bottom: 20px;
			}
			.large
			{
				width: 100%;
				height: auto;
			}

			label.error{
			    color: Red;
			    font-size: 14px;
			    font-style: italic;;
			    text-align: center;
			}
			#formmessage p {
			    padding: 20px;
			    text-align: center;
			}
		</style>


	</head>
	<body>
		<div id="page">
			<div id="header">
				<a href="#menu"></a>
				UMak-CCS App
				<a href="#menu-right" class="friends right"></a>
			</div>
				<nav id="menu">
				<ul>
					<li><a href="home.php">Newsfeed</a></li>
					<li><a href="profile.php">My Profile</a></li>
					<li><a href="students.php">My Students</a></li>
					<li><a href="schedule.php">Schedules</a></li>
					<li><a href="settings.php">Settings</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</nav>

			<nav id="menu-right"> <!-- Menu on right-->
				<ul>
					<li>
						<span>Teachers</span>
						<ul>
				<?php

	    $query8 = "SELECT * FROM tblteacher";                                                             
	   	$result8 = @mysql_query($query8);

while($row8 = mysql_fetch_array($result8)){
		  	if ($row8['image'] == ""){ $image8 = "default.png";} else { $image8 = $row8['image'];}
		echo '			<li class="img">
								<a href="others.php?id='.$row8['id_teacher'].'&user=teacher">
									<img src="../admin/upload/'.$image8.'" />
									'.$row8['firstname'].'<br />
									<small>'.$row8['lastname'].'</small>
								</a>
							</li>
				';

}
				?>		
							

						</ul>
					</li>
					
					<li>
						<span>Students</span>
						<ul>
				<?php

	    $query8 = "SELECT * FROM tblstudent";                                                             
	   	$result8 = @mysql_query($query8);

while($row8 = mysql_fetch_array($result8)){
		  	if ($row8['image'] == ""){ $image8 = "default.png";} else { $image8 = $row8['image'];}
		echo '			<li class="img">
								<a href="others.php?id='.$row8['id_student'].'&user=student">
									<img src="../admin/upload/'.$image8.'" />
									'.ucwords(strtolower($row8['firstname'])).'<br />
									<small>'.ucwords(strtolower($row8['lastname'])).'</small>
								</a>
							</li>
				';

}
				?>		
							

						</ul>
					</li>
					

				</ul>
			</nav>