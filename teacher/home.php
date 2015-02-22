<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php teacher_confirm_logged_in()?> 
<?php require_once("header.php");?>	
<?php
    function add_post($user_id,$level_user,$post,$date_post){
        $query = "INSERT INTO tblpost(id_user,level_user,post,date_post)
        VALUES  ('$user_id','$level_user','$post','$date_post')";
        $result = @mysql_query($query);
    }
    if(isset($_POST['submit'])){
        // $user_id = $_POST['user_id'];
        // $post = $_POST['post'];
        // $level_user = $_POST['level_user'];
        // $date_post = dateNow_db_format();

        // add_post($user_id,$level_user,$post,$date_post);
    }

 	$name = $row['firstname'].' '.$row['lastname'];
?>

			<div id="content">

					<div class="widget-box ">
         				<div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="dialogs">                                                
          						<h3 style="font-family: Harlow Solid Italic;"><center>Newsfeed</center></h3>                                        		

	                                <div class="itemdiv dialogdiv">
	                                    <div class="user">
	                                        <?php echo '<img src="../admin/upload/'.$image.'"/>';?>
	                                    </div>
	                                        <div class="body">
		                                        <form method="post" id="posting">
		                                            <div class="name">
	                                             <?php echo '<a href="#">'.$name.'</a><span></span>';?>
		                                            </div>
		                                      		<textarea style="font-size:14px;" name="post" placeholder="Write something here..."  required="required"></textarea>
		                                     	
                                                 <?php echo '<input type="hidden" name="user_id" value="'.$row['id_teacher'].'">'; ?>
                                                 <?php echo '<input type="hidden" name="level_user" value="'.$_SESSION['level_user'].'">'; ?>

		                                     		<button type="submit" name="submit" data-role="button" data-corners="false" data-theme="b" data-shadow="false" data-mini="true">POST</button>
		                                        </form>
	                                        </div>
	                                </div>
<?php $id= ""; $level_user = ""; ?>
<span id="newpost"></span>
<?php
$query2 = "SELECT * FROM tblpost ORDER BY DATE_FORMAT(date_post, '%d') DESC,DATE_FORMAT(date_post, '%Y') DESC,DATE_FORMAT(date_post, '%m') DESC, DATE_FORMAT(date_post, '%H') DESC, DATE_FORMAT(date_post, '%i') DESC, DATE_FORMAT(date_post, '%s') DESC";
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

?>




                                </div><!--end of dialog-->
                            </div>
                        </div>
    				</div> <!-- end of widget box newsfeed -->

			</div>


<?php require_once("footer.php");?>			