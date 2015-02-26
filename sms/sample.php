<?php
	session_start();
    require ('src/GlobeApi.php');
    
    $globe = new GlobeApi('v1');
    $auth = $globe->auth('GqAdounLyoGhRdiA6dTyMXhR9AxnuEAz','0fa9dcd70aba6dee0e04120b14508de54890fb2936192fdf0e70deb4b5970c60');

    if(isset($_POST['submit'])){
	    $sms = $globe->sms('3621');
	    $_SESSION['access_token'] = '1922472_665456496829559';
	    $_SESSION['subscriber_number'] = '9151484349';
	 
    	$response = $sms->sendMessage($_SESSION['access_token'], $_SESSION['subscriber_number'], 'sana mag work');
	    echo "<script>alert('Message Sent!".$_SESSION['access_token']."<br>".$_SESSION['subscriber_number']."');</script>";
	}
?>

<html>
<head></head>
<body>
	<form method="post">
	<textarea name="message">
		
	</textarea>
	<button type="submit" name="submit">SEND</button>
	</form>

</body>
</html>
