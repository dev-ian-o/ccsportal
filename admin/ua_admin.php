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
        <li class="active accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#forms-collapse"><i class="icon-user-md"></i> <span class="name">User Account</span></a>
            <ul id="forms-collapse" class="accordion-body collapse in">
                <li><a href="ua_student.php">Student</a></li>
                <li class="active"><a href="ua_teacher.php">Teacher</a></li>
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
                            User Accounts<strong> | Admin</strong>
                        </h4>
                    </header>
                    <div class="body">
                    <table id="datatable-table" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Admin ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
        $query = "SELECT *
                  FROM tbladmin";
        $result = @mysql_query($query);
        while($row = mysql_fetch_array($result))
        {
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row['admin_id']."</td>";   
            echo "<td>".$row['lastname']."</td>";   
            echo "<td>".$row['firstname']."</td>";  
            if ($row['status'] == "active1"){$status = "Active";} else {$status = "Deactivated";}
            echo "<td>".$status."</td>"; 
        }
?>
</tbody></table></div>     
        
</div>
<div id="addNewUser" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 id="myModalLabel">Add New Student User</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal label-left" method="post" data-validate="parsley" novalidate="novalidate" />
                        <fieldset>
                            <legend class="section">
                                By default validation is started only after at least 3 characters have been input.
                            </legend>
                            <div class="control-group">
                                <label class="control-label" for="basic">First Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="firstname" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Middle Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="middlename" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Last Name:</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="lastname" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Birthday</label>
                                <div class="controls">
                                    <input type="date" id="basic" name="bday" required="required" />
                                </div>
                            </div>
                            <legend class="section">
                                Address
                            </legend>

                            <div class="control-group">
                                <label class="control-label" for="basic">Street No.</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="stno" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Street</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="st" required="required" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">Barangay</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="brgy" required="required" />
                                </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label" for="basic">City</label>
                                <div class="controls">
                                    <input type="text" id="basic" name="city" required="required" />
                                </div>
                            </div>
                            <legend class="section">
                            </legend>
                            <div class="control-group">
                                <label class="control-label" for="basic">Contact Number</label>
                                <div class="controls">
                                    <input type="number" id="basic" name="city" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic">Course</label>
                                <div class="controls">
                                    <input type="radio" id="basic" name="city" required="required" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="basic-change">
                                    Password
                                    <span class="help-block">
                                        At least 6
                                    </span>
                                </label>
                                <div class="controls">
                                    <input type="password" id="basic-change" name="password" data-trigger="change" data-minlength="6" required="required" />
                                </div>
                            </div>
                        </fieldset>
                    </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Save changes</button>
    </div>
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

<script type="text/javascript">
    $("document").ready(funcition(){
        
    });
</script>

</body></html>


