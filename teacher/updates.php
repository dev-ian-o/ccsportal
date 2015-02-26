<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php teacher_confirm_logged_in()?> 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone-no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
    <title>Newsfeed</title>
<?php require_once("header.php"); ?>
    <div data-role="navbar">
        <ul>

            <li><a href="home.php" data-role="Button" data-transition="fade" data-icon="home" rel="external"></a></li>
            <li><a href="profile.php" data-role="Button" data-transition="fade" data-icon="user" rel="external"></a></li>
            <li><a href="updates.php" data-theme="b" data-role="Button" data-transition="fade" data-icon="search" rel="external"></a></li>
        </ul>
    </div><!-- /navbar -->
</div><!-- /container -->
</div>

<?php
    $query = "SELECT * FROM tblschedule ORDER BY date_sched DESC";
    $result = @mysql_query($query);
?>


<div data-role="content" class="content">
            <h3 style="font-family: Harlow Solid Italic;"><center>Updates</center></h3>
            <span><a href="#popupLogin" data-rel="popup" data-position-to="window" data-role="button" data-icon="plus" data-theme="e" data-transition="pop">Add Schedule</a></span>
          
                <div data-role="collapsible-set" data-theme="c" data-content-theme="d" data-inset="false">
    <div data-role="collapsible" data-collapsed="false">
        <h2>Calendar</h2>
        <ul data-role="listview" data-theme="d" data-divider-theme="d">
        <?php 
        while ($row = mysql_fetch_array($result)) {
               if( full_date(dateNow()) == full_date($row['date_sched']) ){ $today = "Today";} else { $today = "";}
               if(formatDate($row['date_editted']) != "0000-00-00") { $time = "<small>Editted:".full_time($row['date_editted']);} else { $time = "<small>Created:".full_time($row['date_created']);}
                  
                  echo '<li data-role="list-divider">'.full_date($row['date_sched']).' '.full_time($row['date_sched']).'<span class="ui-li-count">'.$today.'</span></li>';
                  echo '<li>';
                  echo "    <h3>".$row['title']."</h3>";
                  echo "    <p><strong>Author: ".$row['author']."</strong></p>";
                  echo "    <p>".$row['description']."</p>";
                  echo '    <p class="ui-li-aside"><strong>'.$time.'</strong></small></p>';
                  echo "<form method='post' action='edit_updates.php' data-ajax='false'>";
                  echo "    <input type='hidden' name='id_edit' value='".$row['id_schedule']."'>";
                  //echo "    <p><button type='submit' data-role='button' data-position='inline' data-mini='true' data-theme='b'>Edit</button></p>";
                  echo "</form>";
                  echo " </li>";                
        }
        
        ?>
        </ul>
    </div>
</div>
</div><!-- /content -->
        <?php if(isset($_POST['submit']))
              {
                //redirect_to("edit_updates.php");
              }
          ?>
          
      <div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
          <form method="post">
              <div style="padding:10px 20px;">
                  <h3>Add Event/Schedule</h3>
                  <label for="un" class="">Title:</label>
                  <input type="text" name="title" <?php if(isset($_SESSION['sched_edit']) && (isset($row['title']))){ echo "value='".$row['title']."'"; } ?> data-theme="a" required="required">

                  <label for="un" class="">Place:</label>
                  <input type="text" name="place" <?php if(isset($_SESSION['sched_edit']) && (isset($row['place']))){ echo "value='".$row['place']."'"; } ?> data-theme="a" required="required">

                  <label for="un" class="">Date:</label>            
                  <input type="date" name="date" <?php if(isset($_SESSION['sched_edit']) && (isset($row['date_sched']))){ echo "value='".formatDate($row['date_sched'])."'"; } ?> data-theme="a" required="required"><br>

                  <label for="un" class="">Time:</label>
                  <input type="time" name="time" <?php if(isset($_SESSION['sched_edit']) && (isset($row['date_sched']))){ echo "value='".formatTime($row['date_sched'])."'"; } ?> data-theme="a" required="required">

                  <label for="un" class="">Description/Notes:</label>
                  <textarea name="desc" col="5" rows="3" data-theme="a" required="required"><?php if(isset($_SESSION['sched_edit']) && (isset($row['description']))){ echo $row['description']; } ?></textarea>


                
                  <button type="submit" name="submit" data-theme="b" data-icon="check">Save</button>
              </div>
          </form>
      </div>
    <div data-role="panel" data-position="left" data-position-fixed="true" data-display="push" data-theme="b" id="add-form">
        <ul data-role="listview" class="nav-search">
                <li style="width:220px;"><a href="home.php" rel="external">Newsfeed</a></li>
                <li><a href="grades.php" rel="external">My Grades</a></li>
                <li><a href="aboutus.html" rel="external">About Us</a></li>
                <li><a href="settings.php" rel="external">Settings</a></li>
                <li><a href="logout.php" rel="external">Logout</a></li>
        </ul>
    </div><!-- /panel -->
</div><!-- /page -->



<?php 
if(isset($_POST['submit']))
{
    // if(($_POST['date'] >= dateNow()))
    //  {
    //     if(($_POST['date'] == dateNow()) && (formatTime(($_POST['time'])) > formatTime(timeNow()))){echo "Invalid Time.";$date = false;}
    //     else{$date = true;}
    //  }   
    //  else{
    //     $date = false;
    //     echo "Invalid date. Input today or advance.";
    //  }
    $date = true;
    if((!empty($_POST['title']) && (!empty($_POST['place']) && (!empty($_POST['desc']) && (!empty($_POST['time']) && $date && (!empty($_POST['date'])))))))
    {
        echo "work";
        add_schedule($_POST['title'],$_POST['place'],$_POST['date'],$_POST['desc'],$_POST['time'].":00",$_SESSION['level_user']);
        // edit_schedule($_SESSION['sched_edit'],$_POST['title'],$_POST['place'],$_POST['date'],$_POST['desc'],$_POST['time'].":00",$_SESSION['level_user']);
        unset($_SESSION['sched_edit']);
    }
    else{
        echo "not work";
    }
}


?>

</body>
</html>