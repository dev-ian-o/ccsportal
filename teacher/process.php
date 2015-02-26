<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/variables.php"); ?>
<?php teacher_confirm_logged_in()?> 



<?php
if(isset($_POST['editSchedule'])){
	$title = $_POST['title'];
	$place = $_POST['place'];
	$date = formatDate($_POST['date']) .' '. formatTime($_POST['time']);
	$time = $_POST['time'];
	$desc = $_POST['desc'];
	$for = $_POST['for'];
	$id_schedule = $_POST['id_schedule'];

	$query4 = "SELECT * FROM tblschedule WHERE title!='$title' AND date_sched='$date' AND id_schedule != '$id_schedule'";
	$result4 = @mysql_query($query4);
	$row4 = mysql_fetch_array($result4);
	if($row4){
		echo "<script>alert('Invalid Time! There is another schedule created with the same time.');</script>";
	}
	else{
		if(($title != "") && ($place != "") && ($time != "") && ($for != "") && ($desc != ""))
		{
			if(formatDate($date) == dateNow())
			{
				if(timeNow() <= formatTime($time)){

	                  $query5 = "SELECT * FROM tblsched_for WHERE id_schedule = '$id_schedule'";
	                  $result5 = @mysql_query($query5);
	                  $a = 0;
	                while ($row5 = mysql_fetch_array($result5)){
	                    $arr_section[$a] = $row5['sched_for'];
	                    $a++;
	                }

					edit_schedule($id_schedule,$_POST['title'],$_POST['place'],$_POST['date'],$_POST['desc'],$_POST['time'].":00",$_SESSION['level_user']);
					
						$query = "DELETE FROM  tblsched_for WHERE id_schedule = '$id_schedule'";
				        $result = @mysql_query($query);
				    
				    for($i=0; $i < count($for); $i++) { 
					$for_now = $for[$i];
			    	$query = "INSERT  INTO tblsched_for
			    			(id_schedule,sched_for)
					VALUES  ('$id_schedule','$for_now')";
					$result = @mysql_query($query);
		    		}
					echo "<script>$('#message').html('<center>Schedule Modified.</center>'); $('#editschedule').hide();</script>";			
			
					echo "<script>setTimeout(function () {
						$('#message').html('');
						window.location.href= 'schedule.php';				
					},3000);</script>";

				}
				else{
					echo "<script>alert('Invalid Time! Time must not be later than the current time.');</script>";
				}
			}
			else {

		
				      $query5 = "SELECT * FROM tblsched_for WHERE id_schedule = '$id_schedule'";
	                  $result5 = @mysql_query($query5);
	                  $a = 0;
	                while ($row5 = mysql_fetch_array($result5)){
	                    $arr_section[$a] = $row5['sched_for'];
	                    $a++;
	                }

					edit_schedule($id_schedule,$_POST['title'],$_POST['place'],$_POST['date'],$_POST['desc'],$_POST['time'].":00",$_SESSION['level_user']);
					
						$query = "DELETE FROM  tblsched_for WHERE id_schedule = '$id_schedule'";
				        $result = @mysql_query($query);
				    for($i=0; $i < count($for); $i++) { 
					$for_now = $for[$i];
			    	$query = "INSERT  INTO tblsched_for
			    			(id_schedule,sched_for)
					VALUES  ('$id_schedule','$for_now')";
					$result = @mysql_query($query);
		    		}
					echo "<script>$('#message').html('<center>Schedule Modified.</center>'); $('#editschedule').hide();</script>";			
			
					echo "<script>setTimeout(function () {
						$('#message').html('');
						window.location.href= 'schedule.php';				
					},3000);</script>";

			}	
	} else{
			echo "<script>alert('Please fill up all fields!');</script>";		
	}
	



	}



}

if(isset($_POST['addSchedule'])){

	$title = $_POST['title'];
	$place = $_POST['place'];
	$date = formatDate($_POST['date']) .' '. formatTime($_POST['time']);
	$time = $_POST['time'];
	$desc = $_POST['desc'];
	$for = $_POST['for'];
	
	$query4 = "SELECT * FROM tblschedule WHERE title='$title' AND date_sched='$date'";
	$result4 = @mysql_query($query4);
	$row4 = mysql_fetch_array($result4);
	if($row4){
		echo "<script>alert('Schedule is already created!');</script>";
	}
	else{
		if(($title != "") && ($place != "") && ($time != "") && ($for != "") && ($desc != ""))
		{
			if(formatDate($date) == dateNow())
			{
				if(formatTime(timeNow()) <= formatTime($time)){
					add_schedule($_POST['title'],$_POST['place'],$_POST['date'],$_POST['desc'],$_POST['time'].":00",$_SESSION['level_user'],$_POST['id_user'],$_SESSION['level_user']);
					$query4 = "SELECT * FROM tblschedule";
					$result4 = @mysql_query($query4);
					while ($row4 = mysql_fetch_array($result4)){
						$id = $row4['id_schedule'];
					}
						for($i=0; $i < count($for); $i++) { 
						$for_now = $for[$i];
				    	$query = "INSERT  INTO tblsched_for
				    			(id_schedule,sched_for)
						VALUES  ('$id','$for_now')";
						$result = @mysql_query($query);
		    		}
					echo $_SESSION['level_user'];
					echo "<script>$('#message').html('<center>Schedule Saved.</center>'); $('#addschedule').hide();</script>";			
			
					echo "<script>setTimeout(function () {
						$('#addsched').trigger('close');
						$('#addschedule').show();
						$('#message').html('');
						window.location.href= 'schedule.php';				
					},3000);</script>";

				}
				else{
					echo "<script>alert('Invalid Time! Time must not be later than the current time.');</script>";
				}
			}
			else {

				add_schedule($_POST['title'],$_POST['place'],$_POST['date'],$_POST['desc'],$_POST['time'].":00",$_SESSION['level_user'],$_POST['id_user'],$_SESSION['level_user']);
				$query4 = "SELECT * FROM tblschedule";
				$result4 = @mysql_query($query4);
				while ($row4 = mysql_fetch_array($result4)){
					$id = $row4['id_schedule'];
				}
					for($i=0; $i < count($for); $i++) { 
					$for_now = $for[$i];
			    	$query = "INSERT  INTO tblsched_for
			    			(id_schedule,sched_for)
					VALUES  ('$id','$for_now')";
					$result = @mysql_query($query);
	    		}
				echo $_SESSION['level_user'];
				echo "<script>$('#message').html('<center>Schedule Saved.</center>'); $('#addschedule').hide();</script>";			
		
				echo "<script>setTimeout(function () {
					$('#addsched').trigger('close');
					$('#addschedule').show();
					$('#message').html('');
					window.location.href= 'schedule.php';				
				},3000);</script>";

			}	
		}
		else {
			echo "<script>alert('Please fill up all fields!');</script>";
		}
	}

}

if(isset($_POST['post']) && isset($_POST['level_user']) && isset($_POST['user_id']))
{
	    function add_post($user_id,$level_user,$post,$date_post,$post_for,$subject_for){
        $query = "INSERT INTO tblpost(id_user,level_user,post,date_post,post_for,subject_for)
        VALUES  ('$user_id','$level_user','$post','$date_post','$post_for','$subject_for')";
        $result = @mysql_query($query);
    	}

    	$user_id = $_POST['user_id'];
        $post = $_POST['post'];
        $level_user = $_POST['level_user'];

        $post_for = $_POST['post_for'];
        $subject_for = $_POST['subject_for'];
        $date_post = dateNow_db_format();

        add_post($user_id,$level_user,$post,$date_post,$post_for,$subject_for);
       $query2 = "SELECT * FROM tblpost WHERE id_user = '$user_id' AND level_user = '$level_user' AND post = '$post' AND date_post = '$date_post'
        ORDER BY DATE_FORMAT(date_post, '%d') DESC,DATE_FORMAT(date_post, '%Y') DESC,DATE_FORMAT(date_post, '%m') DESC, DATE_FORMAT(date_post, '%H') DESC, DATE_FORMAT(date_post, '%i') DESC, DATE_FORMAT(date_post, '%s') DESC";
		$result2 = @mysql_query($query2);

        while($row2 = mysql_fetch_array($result2))
{
    $id_user = $row2['id_user'];
    $level_user = $row2['level_user'];
    	
    if($level_user == "student")
    {    
        $query3 = "SELECT * FROM tblstudent WHERE id_student='$id_user'";
        $result3 = @mysql_query($query3);
        $row3 = mysql_fetch_array($result3);
        $section = "";
        if($row3['id_student'] != "") 
        {    
            if($row3['image'] != "") {$image = $row3['image'];} else{ $image = "default.png";}
            if($row3['gender'] == "Male") {$name = "Mr.";} else{ $name = "Ms.";}
            $name .= ' '.$row3['lastname'];
             if($row3['yr']== "first"){$section .= "I-";}
             else if($row3['yr']== "second"){$section .= "II-";}
             else if($row3['yr']== "third"){$section .= "III-";}
             else if($row3['yr']== "fourth"){$section .= "IV-";}

             if($row3['section']== "A"){$section .= "A";}
             else if($row3['section']== "B"){$section .= "B";}
             else if($row3['section']== "C"){$section .= "C";}
             
             if($row3['course']== "BS Information Technology major in Service Management"){$section .= "ITSM";}
             else if($row3['course']== "BS Computer Network Administration"){$section .= "CNA";}
             else if($row3['course']== "BS Computer Science"){$section .= "CSAD";}
            $section = '<span class="label label-info arrowed arrowed-in-right" style="color:White;">'.$section.'</span>';
            $id = $row3['id_student']; 
            $level_user = "student";
        }
    }
    else if($level_user == "teacher")
    {    
        $query3 = "SELECT * FROM tblteacher WHERE id_teacher = '$id_user'";
        $result3 = @mysql_query($query3);
        $row3 = mysql_fetch_array($result3);
        if($row3['id_teacher'] != "") 
        {    
            if($row3['image'] != "") {$image = $row3['image'];} else{ $image = "default.png";}

            $name = $row3['firstname'].' '.$row3['lastname'];
            $section = '<span class="label label-info arrowed arrowed-in-right" style="color:White;">Teacher</span>';

            $id = $row3['id_teacher']; 
            $level_user = "teacher";
        }

    }


                                                    echo '<div class="itemdiv dialogdiv">';
                                                    echo '   <div class="user">';
                                                 if($id != $_SESSION['teacher_id'] && $level_user != "teacher" ){
                                                    echo '       <a href="others.php?id='.$id.'&user='.$level_user.'"><img src="../admin/upload/'.$image.'" /></a>';
                                                 }else {
                                                 	echo '<a href="profile.php"><img src="../admin/upload/'.$image.'" /></a>';
                                                 }
                                                    echo '   </div>';

                                                    echo '   <div class="body">';
                                                    echo '       <div class="time">';
                                                    echo '           <i class="icon-time"></i>';
                                                    if(formatDate($row2['date_post']) == formatDate(dateNow())){
                                                        $time = formatTime($row2['date_post']);
                                                    } 
                                                    else {
                                                        $time = formatDate($row2['date_post']);
                                                    }
                                                    echo '           <span class="green">'.$time.'</span>';
                                                    echo '       </div>';

                                                    echo '       <div class="name">';
                                                    echo '        <a href="#">'.ucwords(strtolower($name)).'</a>'.' '.$section;
                                                    echo '       </div>';
                                                    echo '      <div class="text">'.htmlspecialchars($row2['post']).'</div>';
                                                    // echo '       <div><small><a href="#" style="color: Gray;text-decoration: none;">Comments(3)</a></small></div>';

                                                    echo '   </div>';
                                                    echo '</div>';

}


}


if($_REQUEST['old'] && isset($_POST['old']))
{
		$id_no = $_SESSION['id_no'];	
		$query = "SELECT password
				  FROM tblteacher 
				  WHERE employee_no = '$id_no'";

	    $result = @mysql_query($query);
	    $row = mysql_fetch_array($result,MYSQL_NUM);
	    if(rtnDecrypt($row[0]) === $old)
		{
			$row = true;
		}
		else {$row = false;}

	    if (!($row)){
	    	echo "<script>$('#lbloldpass').after('<center><label class=\"error\">Invalid old password.</label></center>');</script>"; 
	    	$noError = false;
	    }	
		if(($new == $retype) && (isset($_POST['new'])) && ($_POST['retype']) && ($row))
		{	

			$id_no = $_SESSION['id_no'];
			$id = $_SESSION['teacher_id'];	//EMPLOYEE NUM/ STUD. NO
			change_password($new,$id,$id_no,$_SESSION['level_user']);
			echo "<script>$('#form_pass').before('<div id=\"formmessage\"><p>Your password is being changed.</p></div>'); $('#form_pass').hide();</script>";			
			echo "<script>setTimeout(function () {
				window.location.href= 'settings.php';
			},3000);</script>";
		}
}


?>


