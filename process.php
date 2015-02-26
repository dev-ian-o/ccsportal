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


if(isset($_POST['post_for']) && isset($_POST['subject_for'])){
// 	$post_for = $_POST['post_for'];
// 	$subject_for = $_POST['subject_for'];
// 	echo "<script>$('#content').html('');</script>";
// 	echo '<div class="widget-box ">';
//     echo '    				<div class="widget-body">';
//     echo '                   <div class="widget-main no-padding">';
//     echo '                          <div class="dialogs">';                                                
//     echo '     						<h3 style="font-family: Harlow Solid Italic;"><center>Newsfeed</center>';
//     echo '                         <a href="#popupMenu" data-mini="true" data-rel="popup" data-role="button" data-inline="true" data-transition="slideup" data-icon="gear" data-theme="e">Sort By</a></h3>';                                        		

//     echo '                         <div data-role="popup" id="popupMenu" data-theme="d">';
//     echo '                                <ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="d">';
//     echo '                                     <li data-role="divider" data-theme="e">Sort by:</li>';
//     echo '                                     <li>';
//     echo '                                     <form method="post" name="sortbyall">';
//     echo '                                     <input type="hidden" name="sortAll" value="all">';
//     echo '                                     <button type="submit" name="submit2">All</button>';
//     echo '                                     </form>';
//     echo '                                     </li>';
 

// if($row['yr'] == "first"){ $course_year = 1;}
// if($row['yr'] == "second"){ $course_year = 2;}
// if($row['yr'] == "third"){ $course_year = 3;}
// if($row['yr'] == "fourth"){ $course_year = 4;}
// $section = $row['section'];
// $course = $row['course'];

// if($row['course'] == "BS Information Technology major in Service Management"){$course2 = "ITSM";}
// else if($row['course'] == "BS Computer Science"){ $course2 = "CSAD";}
// else if($row['course'] == "Computer Network Administration") {$course2 = "CNA";}
// $what = 0;
// $arr_what = array();
// $query4 = "SELECT * FROM tblsem_sched WHERE course_year ='$course_year' AND course = '$course' AND section = '$section'";
// $result4 = @mysql_query($query4);
// while($row4 = mysql_fetch_array($result4))
// {
//     if($row4['course'] == "BS Information Technology major in Service Management"){$course2 = "ITSM";}
//     else if($row4['course'] == "BS Computer Science"){ $course2 = "CSAD";}
//     else if($row4['course'] == "Computer Network Administration") {$course2 = "CNA";}

//     $section = $row4['course_year'].'-'.$row4['section'].$course2;
//     $subject = $row4['subject'];
//     $query5 = "SELECT * FROM tblsubject WHERE id_subject ='$subject'";
//     $result5 = @mysql_query($query5);
//     $row5 = mysql_fetch_array($result5);
//     $arr_what[$what] = $what;
//     echo '<form method="post" id="sortby'.$what++.'">';    
//     echo "<li>";
//     echo '<input type="hidden" name="post_for" value="'.$section.'">';
//     echo '<input type="hidden" name="subject_for" value="'.$row5['subject_desc'].'">';
//     echo '                                  <li><button type="submit" name="submit2">'.$row5['subject_desc'].'</button></li>';
//     echo '</form>';
    

// }

//     echo '                                 </ul>';
//     echo '                          </div>';
//     echo '<div id="edit"></div>';

// 	echo '                              <div class="itemdiv dialogdiv">';
// 	echo '                              <div class="user">';
// 	                                       echo '<img src="admin/upload/'.$image.'"/>';
// 	echo '                               </div>';
// 	echo '                                  <div class="body">';
// 	echo '                                      <form method="post" id="posting">';
// 	echo '                                           <div class="name">';
// 	                                              echo '<a href="#">'.$name.'</a><span></span>';
// 	echo '                                           </div>';
// 	echo '                                     		<textarea style="font-size:14px;" name="post" placeholder="Write something here..."  required="required"></textarea>';
		                                     	
//                                                   echo '<input type="hidden" name="user_id" value="'.$row['id_student'].'">';
//                                                   echo '<input type="hidden" name="level_user" value="'.$_SESSION['level_user'].'">'; 

// 	echo '                                    		<button type="submit" name="submit" data-role="button" data-corners="false" data-theme="b" data-shadow="false" data-mini="true">POST</button>';
// 	echo '	                                        </form>';
// 	echo '                                        </div>';
// 	echo '                                </div>';
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
                                                if($id != $_SESSION['user_id']  && $level_user != "student" ){
                                                    echo '       <a href="others.php?id='.$id.'&user='.$level_user.'"><img src="admin/upload/'.$image.'" /></a>';
                                                 }else {
                                                    echo '<a href="profile.php"><img src="admin/upload/'.$image.'" /></a>';
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


