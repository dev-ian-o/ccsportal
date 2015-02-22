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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
    .btn-file {
    position: relative;
    overflow: hidden;
}
img{
    height: 48px;
    width: 48px;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 999px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>

</head>
<body class="background-dark">
<div class="logo">
    <h4><a href="ua_student.php">CCS PORTAL<strong>|ADMIN</strong></a></h4>
</div>
<br>
<nav id="sidebar" class="sidebar nav-collapse collapse">
    <ul id="side-nav" class="side-nav">
        <li>
            <a href="#"><i class="icon-desktop"></i> <span class="name">Dashboard</span></a>
        </li>
        <li class="active accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#forms-collapse"><i class="icon-user-md"></i> <span class="name">User Account</span></a>
            <ul id="forms-collapse" class="accordion-body collapse in">
                <li class="active"><a href="ua_student.php">Student</a></li>
                <li><a href="ua_teacher.php">Teacher</a></li>
                <li><a href="ua_admin.php">Admin</a></li>
            </ul>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#school-collapse"><i class="icon-building"></i> <span class="name">School</span></a>
            <ul id="school-collapse" class="accordion-body collapse">
                <li><a href="subjects.php">Subjects</a></li>
                <li><a href="#">Grades</a></li>
                <li><a href="schedule.php">Schedule</a></li>
                <li><a href="reports.php">Reports</a></li>
            </ul>
        </li>
        <li class="accordion-group">
            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side-nav" href="#stats-collapse"><i class="icon-bar-chart"></i> <span class="name">Statistics</span></a>
            <ul id="stats-collapse" class="accordion-body collapse">
                <li><a href="#">Stats</a></li>
                <li><a href="#">Charts</a></li>
                <li><a href="#">Realtime</a></li>
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
