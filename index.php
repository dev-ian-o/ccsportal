<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/variables.php"); ?>
<?php 
  if (logged_in()) {
    redirect_to("home.php");
  }
  else if (isset($_SESSION['admin_id']))
  {
    redirect_to("admin/home.php");
  }
  elseif (isset($_SESSION['teacher_id'])) {
    redirect_to("teacher/home.php");
  }


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone-no">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi">
    <title>Login</title>
    <link rel="stylesheet" href="css/jquery.mobile-1.3.2.min.css">
    <link rel="stylesheet" href="css/jquery.mobile.theme-1.3.2.min.css">

    <!-- Custom css -->
    <link rel="stylesheet" href="jqm-icon-pack-fa.css" />
  <style type="text/css">
label.error{
    color: Red;
    font-size: 14px;
    font-style: italic;;
    text-align: center;
}

img{
margin: -4px 8px 0 0;
border-radius: 24px;
border: 2px solid #FFF;
max-width: 40px!important;
}

#profile{
margin: -4px 8px 0 0;
border-radius: 24px;
border: 2px solid #FFF;
max-width: 1000px!important;
height: 150px;
width: auto;
}



.widget-body{
    background-color: transparent;
    border: none;
}

td:nth-child(even){
    font-size: 14px;
    font-weight: bold;
    padding:3px;

}
td:nth-child(odd){
    font-weight: bold;
}
table{
      padding:10px;
}
.nav-search .ui-btn-up-a {
            background-image: none;
            background-color: #333;
        }
        .nav-search .ui-btn-inner {
            border-top: 1px solid #888;
            border-color: rgba(255, 255, 255, .1);
        }
        .nav-search .ui-btn.ui-first-child {
            border-top-width: 0;
            background: #111;
        }
        .userform {
            padding: .8em 1.2em;
        }
        .userform h2 {
            color: #555;
            margin: 0.3em 0 .8em 0;
            padding-bottom: .5em;
            border-bottom: 1px solid rgba(0,0,0,.1);
        }
        .userform label {
            display: block;
            margin-top: 1.2em;
        }
        .ui-grid-a {
            margin-top: 1em;
            padding-top: .8em;
            margin-top: 1.4em;
            border-top: 1px solid rgba(0,0,0,.1);
        }
        #error{
            text-align: center;
        }
        .hidden{
          display: none;
        }
  </style>

  
</head>
<body class="hidden">
<div data-role="page" class="ui-responsive-panel" id="page1">

            <h1 style="font-family: Corbel;"><b><center>UMak-CCS App</center></b></h1>
            <br>
            <form id="form_login" method="post">

            <h2>Login</h2>

            <label for="name">Username:</label>
            <label id="lblusername" class="error" for="name"></label> 
            <input type="text" name="username" id="name" value="" data-clear-btn="true" data-mini="true" required>

            <label for="password">Password:</label>
            <label id="lblpassword" class="error" for="password"></label> 
            <input type="password" name="password" id="password" value="" data-clear-btn="true" autocomplete="off" data-mini="true" required>

         
         <p><button data-rel="close" name="login" data-role="button" data-theme="b" data-mini="true" data-inline="true" rel="external">Sign-in</button></p>
         
           </form>
           <span id="error"></span>
       
</div><!-- /container -->

<?php
  // if (isset($_POST['login']))
  // {
  //     login_user($_POST['username'],$_POST['password']);   
  // } 
?>
</div>
<div data-role="content" class="content">
          
</div><!-- /content -->




</div><!-- /page -->

</body>
</html>

<script src="js/jquery.js"></script>
<script>
        $(document).bind( "mobileinit", function(){
            $.mobile.ajaxEnabled = false;

        });            
        $(function() {
            $('.hidden').fadeIn(1000).removeClass('hidden');
        });
</script>
<script src="js/jquery.mobile-1.3.2.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/ajax_script.js"></script>