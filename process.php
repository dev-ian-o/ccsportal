<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/variables.php"); ?>
<?php

if(isset($_POST['aboutme'])){
			$id = $_SESSION['user_id'];
			$aboutme = htmlentities(htmlspecialchars($_POST['aboutme']));
			$query = "UPDATE tblstudent SET aboutme = '$aboutme' WHERE id_student = '$id'";		
			$result = @mysql_query($query);			
}


if(isset($_POST['post']) && isset($_POST['level_user']) && isset($_POST['user_id']))
{
	    function add_post($user_id,$level_user,$post,$date_post){
        $query = "INSERT INTO tblpost(id_user,level_user,post,date_post)
        VALUES  ('$user_id','$level_user','$post','$date_post')";
        $result = @mysql_query($query);
    	}

    	$user_id = $_POST['user_id'];
        $post = $_POST['post'];
        $level_user = $_POST['level_user'];
        $date_post = dateNow_db_format();

        add_post($user_id,$level_user,$post,$date_post);

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
                                                if($id != $_SESSION['user_id']  && $level_user != "student" ){
                                                    echo '       <a href="others.php?id='.$id.'&user='.$level_user.'"><img src="admin/upload/'.$image.'" /></a>';
                                                 }else {
                                                    echo '<a href="profile.php"><img src="admin/upload/'.$image.'" /></a>';
                                                 }
                                                    echo '   </div>';

                                                    echo '   <div class="body">';
                                                    echo '       <div class="time">';
                                                    echo '           <i class="icon-time"></i>';
                                                    echo '           <span class="green">4 sec</span>';
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


if(isset($_POST['userid']))
{

	if($_POST['user'] == "teacher"){
		$id_no = $_SESSION['id_no'];
		$id = $_SESSION['teacher_id'];	//EMPLOYEE NUM/ STUD. NO
		if(($new == $retype) && (isset($_POST['new'])) && ($_POST['retype']))
		{
			change_password($new,$id,$id_no,$_POST['user']);
			echo "<script>$('#form_pass').before('<div id=\"formmessage\"><p>Your password is being changed...</p></div>'); $('#form_pass').hide();</script>";			
			echo "<script>setTimeout(function () {
				window.location.href= 'home.php';

			},3000);</script>";
		}
	}
	else if($_POST['user'] == "student"){
		$id_no = $_SESSION['id_no'];
		$id = $_SESSION['user_id'];	//EMPLOYEE NUM/ STUD. NO

		if(($new == $retype) && (isset($_POST['new'])) && ($_POST['retype']))
		{
			change_password($new,$id,$id_no,$_POST['user']);
			echo "<script>$('#form_pass').before('<div id=\"formmessage\"><p>Your password is being changed...</p></div>'); $('#form_pass').hide();</script>";			
			echo "<script>setTimeout(function () {
				window.location.href= 'home.php';

			},3000);</script>";
		}
	}

}

if($_REQUEST['old'] && isset($_POST['old']))
{
	
		$query = "SELECT password
				  FROM tblstudent 
				  WHERE student_no = '$id_no'";
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
			change_password($new,$id,$id_no,$_SESSION['level_user']);
			echo "<script>$('#form_pass').before('<div id=\"formmessage\"><p>Your password is being changed...</p></div>'); $('#form_pass').hide();</script>";			
			echo "<script>setTimeout(function () {
				window.location.href= 'settings.php';
			},3000);</script>";
		}
}

if(isset($_POST['password']) && isset($_POST['username']))
{
	   $userid = $_POST['username'];
	   $password = $_POST['password'];
 	   
 	   	$query = "SELECT password,status
				  FROM tblstudent 
				  WHERE student_no = '$userid'";

		    $result = @mysql_query($query);
		    $row = mysql_fetch_array($result,MYSQL_NUM);
		    if($row)
		    {
		    	if(rtnDecrypt($row[0]) === $password)
			    {	$query = "SELECT id_student,student_no,status
						  FROM tblstudent 
						  WHERE student_no = '$userid'";
						 
					$result = @mysql_query($query); 

		    		$row = mysql_fetch_array($result,MYSQL_NUM);
			    	$_SESSION['user_id'] = $row[0];
			    	$_SESSION['id_no'] = $row[1]; // username ID NUMBER
			    	$_SESSION['level_user'] = "student";
			    	if($row[2] != "new"){redirect_2("home.php");}
			    	else {
			    		$_SESSION['new_user'] = "new_user";
			    		redirect_2("change_password.php");
			    	}
			    		$error = true;
			    }
			   	else{$error = false;}
			   	
		    }

		
	    
		    $query = "SELECT password,status
					  FROM tblteacher 
					  WHERE employee_no = '$userid'";

		    $result = @mysql_query($query);
		    $row = mysql_fetch_array($result,MYSQL_NUM);
		    if($row)
		    {
		    	if(rtnDecrypt($row[0]) === $password)
			    {	$query = "SELECT id_teacher,employee_no,status
						  FROM tblteacher 
						  WHERE employee_no = '$userid'";
						 
					$result = @mysql_query($query); 

		    		$row = mysql_fetch_array($result,MYSQL_NUM);
			    	$_SESSION['teacher_id'] = $row[0];
			    	$_SESSION['id_no'] = $row[1]; // username ID NUMBER
			    	$_SESSION['level_user'] = "teacher";
			    	if($row[2] != "new"){redirect_2("teacher/home.php");}
			    	else {
			    		$_SESSION['new_user'] = "new_user";
			    		redirect_2("change_password.php");
			    	}
			 		$error = true;   	
			    }
			   	else{$error = false;}
		    }
		
	  	
		    $query = "SELECT id,admin_id
					  FROM tbladmin 
					  WHERE admin_id = '$userid' 
					  AND password = SHA('$password')";
		    $result = @mysql_query($query);
		    $row = mysql_fetch_array($result,MYSQL_NUM);
		    
		    if($row)
		    {
		    	$_SESSION['admin_id'] = $row[0];
		    	$_SESSION['id_no'] = $row[1]; // username ID NUMBER
		    	$_SESSION['level_user'] = "admin";
		    	redirect_2("admin/ua_student.php");

			 	$error = true;   	
	 	    }
	 	    if(!$error){echo "<script>alert('Incorrect username or password.');</script>";}

 	    
}

?>


