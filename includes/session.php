<?php
	session_start();
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (isset($_SESSION['admin_id']))
		{
			redirect_to("admin/home.php");
		}
		if (!logged_in()) {
			redirect_to("index.php");
		}

		if(isset($_SESSION['teacher_id']))
		{
			redirect_to("teacher/home.php");	
		}

	}

	function admin_confirm_logged_in(){
		if (!(isset($_SESSION['admin_id'])) || (isset($_SESSION['user_id']))){
			redirect_to("../index.php");
		}
	}
	function teacher_confirm_logged_in(){
		if (!(isset($_SESSION['teacher_id'])) || (isset($_SESSION['user_id']))){
			redirect_to("../index.php");
		}
	}	
?>
