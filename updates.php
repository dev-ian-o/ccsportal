<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); 
?>  
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

            <li><a href="home.php" data-role="Button" data-transition="none" data-icon="home" rel="external"></a></li>
            <li><a href="profile.php" data-role="Button" data-transition="none" data-icon="user" rel="external"></a></li>
            <li><a href="updates.php" data-theme="b" data-role="Button" data-transition="none" data-icon="search" rel="external"></a></li>
        </ul>
    </div><!-- /navbar -->
</div><!-- /container -->
</div>

<?php
    $query = "SELECT * FROM tblschedule";
    $result = @mysql_query($query);


?>


<div data-role="content" class="content">
            <h3 style="font-family: Harlow Solid Italic;"><center>Updates</center></h3>
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
               
                  echo "  </a></li>";  
        }
        
        ?>
        </ul>
    </div>
</div>
</div><!-- /content -->

    
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





</body>
</html>