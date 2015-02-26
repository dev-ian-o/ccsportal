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
                <li><a href="schedule.php">Schedule</a></li>
                <li><a href="reports.php">Reports</a></li>
            </ul>
        </li>
        <li>
            <a href="../logout.php"><i class="icon-signout"></i>Log out</a>
        </li>
    </ul>
</nav>



<div class="wrap">

