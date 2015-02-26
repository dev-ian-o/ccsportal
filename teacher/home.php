<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php teacher_confirm_logged_in()?> 
<?php require_once("header.php");?>	

<?php
$post_for = 'all';
$subject_for = '';
$subject_for2 = '';

if(isset($_POST['submit2'])){
    $post_for = $_POST['post_for'];
    if(isset($_POST['subject_for'])) {$subject_for2 = $_POST['subject_for'];
        $subject_for = "AND subject_for = '$subject_for2'";}
    else{$subject_for = "";}
}
?>

<?php

    function add_post($user_id,$level_user,$post,$date_post){
        $query = "INSERT INTO tblpost(id_user,level_user,post,date_post)
        VALUES  ('$user_id','$level_user','$post','$date_post')";
        $result = @mysql_query($query);
    }
    

 	$name = $row['firstname'].' '.$row['lastname'];
    $id_teacher = $row['id_teacher'];
?>

			<div id="content">

					<div class="widget-box ">
         				<div class="widget-body">
                            <div class="widget-main no-padding">
                                <div class="dialogs">                                                
                                <h3 style="font-family: Harlow Solid Italic;"><center>Newsfeed</center>  
                                <a href="#popupMenu" data-mini='true' data-rel="popup" data-role="button" data-inline="true" data-transition="slideup" data-icon="gear" data-theme="e">Sort By: 

                                <?php echo ucwords($post_for).' '.$subject_for2;?>
                                </a></h3>                                               

                                <div data-role="popup" id="popupMenu" data-theme="d">
                                        <ul data-role="listview" data-inset="true" style="min-width:210px;" data-theme="d">
                                            <li data-role="divider" data-theme="e">Sort by:</li>
                                          
                                           <form method="post">
                                               <input type="hidden" name="post_for" value="all">
                                               <button type='submit' name='submit2'>All</button>
                                           </form>
                                          
 
<?php 

// if($row['yr'] == "first"){ $course_year = 1;}
// if($row['yr'] == "second"){ $course_year = 2;}
// if($row['yr'] == "third"){ $course_year = 3;}
// if($row['yr'] == "fourth"){ $course_year = 4;}
// $section = $row['section'];
// $course = $row['course'];

// if($row['course'] == "BS Information Technology major in Service Management"){$course2 = "ITSM";}
// else if($row['course'] == "BS Computer Science"){ $course2 = "CSAD";}
// else if($row['course'] == "Computer Network Administration") {$course2 = "CNA";}
$what = 0;
$arr_what = array();
$query4 = "SELECT * FROM tblsem_sched WHERE teacher='$id_teacher'";
$result4 = @mysql_query($query4);
while($row4 = mysql_fetch_array($result4))
{
    if($row4['course'] == "BS Information Technology major in Service Management"){$course2 = "ITSM";}
    else if($row4['course'] == "BS Computer Science"){ $course2 = "CSAD";}
    else if($row4['course'] == "Computer Network Administration") {$course2 = "CNA";}

    $section = $row4['course_year'].'-'.$row4['section'].$course2;
    $subject = $row4['subject'];
    $query5 = "SELECT * FROM tblsubject WHERE id_subject ='$subject'";
    $result5 = @mysql_query($query5);
    $row5 = mysql_fetch_array($result5);
    $arr_what[$what] = $what;
    echo '<form method="post" id="sortby'.$what++.'">';    
    echo "<li>";
    echo '<input type="hidden" name="post_for" value="'.$section.'">';
    echo '<input type="hidden" name="subject_for" value="'.$row5['subject_desc'].'">';
    echo '                                  <li><button type="submit" name="submit2">'.$row5['subject_desc'].'</button></li>';
    echo '</form>';
    

}
?>

                                        </ul>
                                </div>
    <div id="edit"></div>

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
                                                 <?php echo '<input type="hidden" name="post_for" value="'.$post_for.'">'; ?>
                                                 <?php echo '<input type="hidden" name="subject_for" value="'.$subject_for2.'">'; ?>
		                                     		<button type="submit" name="submit" data-role="button" data-corners="false" data-theme="b" data-shadow="false" data-mini="true">POST</button>
		                                        </form>
	                                        </div>
	                                </div>
<?php $id= ""; $level_user = ""; ?>
<span id="newpost"></span>
<?php
$query2 = "SELECT * FROM tblpost WHERE post_for = '$post_for' ".$subject_for." ORDER BY DATE_FORMAT(date_post, '%Y') DESC,DATE_FORMAT(date_post, '%m') DESC,DATE_FORMAT(date_post, '%d') DESC, DATE_FORMAT(date_post, '%H') DESC, DATE_FORMAT(date_post, '%i') DESC, DATE_FORMAT(date_post, '%s') DESC";
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

?>




                                </div><!--end of dialog-->
                            </div>
                        </div>
    				</div> <!-- end of widget box newsfeed -->

			</div>


<?php require_once("footer.php");?>			