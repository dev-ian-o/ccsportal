<?php

header("Access-Control-Allow-Origin: *");
require_once('../classes/Auth.php');
require_once('../classes/Base.php');
require_once('../classes/Grades.php');
require_once('../classes/Posts.php');

if(isset($_POST['grades']))
{
	print_r(Grades::findByStudentId($_POST['id_user']));
}


if(isset($_POST['login']))
{
	print_r(Auth::signIn($_POST));
}

if(isset($_POST['form_post']))
{
	print_r(Posts::fetch());
}


if(isset($_POST['submit_post']))
{
	print_r(Posts::add($_POST));
}



// print rtnDecrypt('hyKd5kcLv15l3icLTy7uTH37KFTjz8OjqlEG96dhq3A=');