<?php	
                /******VARIABLES IN index.php********/
	 if (isset($_POST['username'])) { $username = $_POST['username']; }
   if (isset($_POST['password'])) { $password = $_POST['password']; }

                /******VARIABLES IN settings.php********/
   if (isset($_POST['old'])) { $old = $_POST['old']; }
   if (isset($_POST['new'])) { $new = $_POST['new']; }
   if (isset($_POST['retype'])) { $retype = $_POST['retype']; }  

    error_reporting(E_ALL &~E_NOTICE);
                /******VARIABLES IN sessions********/
    $id = $_SESSION['user_id']; // primary key userid
    $id_no = $_SESSION['id_no'] ;// studentid, teachersid or username

?>