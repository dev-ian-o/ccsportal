<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php admin_confirm_logged_in()?>
<!DOCTYPE html>
<html>
<head>
    <title>CCS Portal Admin</title>
    <link href="css/application.min.css" rel="stylesheet" />
    <link rel="shortcut icon" href="img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body class="background-dark">
<div class="logo">
    <h4><a href="home.php">CCS PORTAL<strong>| ADMIN</strong></a></h4>
</div>

<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
        <li>
            <a href="index.html"><i class="icon-desktop"></i> <span class="name">Dashboard</span></a>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#forms-collapse"><i class="icon-user-md"></i> <span class="name">User Account</span></a>
            <ul id="forms-collapse" class="accordion-body collapse in">
                <li class="active"><a href="ua_student.php">Student</a></li>
                <li><a href="ua_teacher.php">Teacher</a></li>
                <li><a href="ua_admin.php">Admin</a></li>
            </ul>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#stats-collapse"><i class="icon-bar-chart"></i> <span class="name">Statistics</span></a>
            <ul id="stats-collapse" class="accordion-body collapse">
                <li><a href="stat_statistics.html">Stats</a></li>
                <li><a href="stat_charts.html">Charts</a></li>
                <li><a href="stat_realtime.html">Realtime</a></li>
            </ul>
        </li>
    </ul>
    <div id="sidebar-settings" class="settings">
        <button type="button" data-value="icons" class="btn-icons btn btn-transparent btn-small">Icons</button>
        <button type="button" data-value="auto" class="btn-auto btn btn-transparent btn-small">Auto</button>
    </div>
</nav>
<div class="wrap">
<header class="page-header">
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav pull-right">
                <li class="hidden-phone">
                    <a href="#" id="settings" data-toggle="popover" data-placement="bottom" title="">
                        <i class="icon-cog"></i>
                    </a>
                </li>
                <li class="hidden-phone dropdown">
                        <a href="#" title="Account" id="account" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i>
                        </a>
                        <ul id="account-menu" class="dropdown-menu account" role="menu">
                            <li role="presentation" class="account-picture">
                                <img src="img/2.jpg" alt="" />
                                Philip Daineka
                            </li>
                            <li role="presentation">
                                <a href="form_account.html" class="link">
                                    <i class="icon-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="component_calendar.html" class="link">
                                    <i class="icon-calendar"></i>
                                    Calendar
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#" class="link">
                                    <i class="icon-inbox"></i>
                                    Inbox
                                </a>
                            </li>
                        </ul>
                    </li>
                <li class="visible-phone">
                    <a href="#" class="btn-navbar" data-toggle="collapse" data-target=".sidebar" title="">
                        <i class="icon-reorder"></i>
                    </a>
                </li>
                <li class="hidden-phone"><a href="../logout.php"><i class="icon-signout"></i></a></li>
            </ul>
            <form class="navbar-search pull-right" />
                <input type="search" class="search-query" placeholder="Search..." />
            </form>
        </div>
    </div>
</header>
<!-- TABLE -->
<div class="row-fluid">
            <div class="span10 offset1">
                <section class="widget">
                    <header>
                        <h4>
                            <i class="icon-file-alt"></i>
                            User Accounts<strong> | Students</strong>
                        </h4>
                    </header>
                    <div class="body">
                        
                        <table id="datatable-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th class="no-sort">Picture</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Birthday</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>Year</th>
                                <th>Section</th>
                                <th>Course</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
        $query = "SELECT *
				  FROM tblstudent";
	    $result = @mysql_query($query);
	    while($row = mysql_fetch_array($result))
		{
			echo "<td>".$row[0]."</td>";
			echo '<td><img src="../avatars/avatar.png"/></td>';
			echo "<td>".$row['lastname']."</td>";
			echo "<td>".$row['firstname']."</td>";
			echo "<td>".$row['middlename']."</td>";
			echo "<td>".$row['dob']."</td>";
			echo "<td>".$row['add_city']."</td>";
			echo "<td>".$row['contact_no']."</td>";
			if($row[12] == 'first'){ $yrandsec = '1ST'; } else if($row[12] == 'second'){ $yrandsec = '2ND'; }
        else if($row[12] == 'third'){ $yrandsec = '3RD'; } else if($row[12] == 'fourth') { $yrandsec = '4TH';}
        else { $yrandsec = '5TH';};
			echo "<td>".$yrandsec."</td>";
			echo "<td>".$row['section']."</td>";
			echo "<td>".$row['course']."</td>";
			
		}
?>
                            <!-- <tr>
                                <td>1</td>
                                <td><img src="../avatars/avatar.png"/></td>
                                <td><strong>Algerd</strong></td>
                                <td class="hidden-phone-landscape">
                                    <small>
                                        <strong>Type:</strong>
                                        &nbsp; JPEG
                                    </small>
                                    <br />
                                    <small>
                                        <strong>Dimensions:</strong>
                                        &nbsp; 200x150
                                    </small>
                                </td>
                                <td><a href="#">Palo Alto</a></td>
                                <td class="hidden-phone-landscape">June 27, 2013</td>
                                <td class="hidden-phone-landscape">June 27, 2013</td>
                                <td class="hidden-phone-landscape">June 27, 2013</td>
                                <td class="hidden-phone-landscape">June 27, 2013</td>
                                <td class="hidden-phone-landscape">June 27, 2013</td>
                                <td class="hidden-phone-landscape">June 27, 2013</td>

                            </tr> -->
</tbody></table></div>     

        
</div>

<!-- jquery and friends -->
<script src="lib/jquery/jquery.1.9.0.min.js"> </script>
<script src="lib/jquery/jquery-migrate-1.1.0.min.js"> </script>

<!-- jquery plugins -->
<script src="lib/jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="lib/parsley/parsley.js"> </script>
<script src="lib/uniform/js/jquery.uniform.js"></script>
<script src="lib/select2.js"></script>
<script src="lib/jquery.dataTables.min.js"></script>

<!--backbone and friends -->
<script src="lib/backbone/underscore-min.js"></script>
<script src="lib/backbone/backbone-min.js"></script>
<script src="lib/backbone/backbone-pageable.js"></script>
<script src="lib/backgrid/backgrid.js"></script>
<script src="lib/backgrid/backgrid-paginator.js"></script>

<!-- bootstrap default plugins -->
<script src="js/bootstrap/bootstrap-transition.js"></script>
<script src="js/bootstrap/bootstrap-collapse.js"></script>
<script src="js/bootstrap/bootstrap-alert.js"></script>
<script src="js/bootstrap/bootstrap-tooltip.js"></script>
<script src="js/bootstrap/bootstrap-popover.js"></script>
<script src="js/bootstrap/bootstrap-button.js"></script>
<script src="js/bootstrap/bootstrap-dropdown.js"></script>
<script src="js/bootstrap/bootstrap-modal.js"></script>
<script src="js/bootstrap/bootstrap-tab.js"> </script>

<!-- basic application js-->
<script src="js/app.js"></script>
<script src="js/settings.js"></script>

<!-- page-specific js -->
<script src="js/tables-dynamic.js"></script>
<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Background</div>
        <div id="background-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% dark = background == 'dark'; light = background == 'light';%>
            <button type="button" data-value="dark" class="btn btn-small btn-transparent <%= dark? 'active' : '' %>">Dark</button>
            <button type="button" data-value="light" class="btn btn-small btn-transparent <%= light? 'active' : '' %>">Light</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar on the</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-small btn-transparent <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-small btn-transparent <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Sidebar</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-small btn-transparent <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-small btn-transparent <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
        <% auto = sidebarState == 'auto'%>
        <% if (auto) {%>
            <button type="button"
                    data-value="icons"
                    class="btn-icons btn btn-transparent btn-small">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-small">Auto</button>
        <%} else {%>
            <button type="button"
                    data-value="auto"
                    class="btn btn-transparent btn-small">Auto</button>
        <% } %>
</script>



</body></html>


