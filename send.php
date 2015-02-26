
<form method="post">
	<input type="submit" name="submit" value="Submit">
</form>
<?php

// To connect your app, the developer needs to integrate this URL in his app: http://121.58.235.156/sms/sms_out.php. 
// The developer needs to pass parameters together with this URL. It includes your username, password(not encrypted), 
// msisdn(users mobile number), kw(main keyword e.g daily), service(service name), var1(e.g ‘on’,’off’, ‘help’,’reg’), 
// var2(e.g registration details), binfo(TCSD), dlrurl(balcheck), text(response message) and on=1 for all the 
// subscription based apps.

//     Example:
//     http://121.58.235.156/sms/sms_out.php?username=YourUsername&password
//     =YourPassword&msisdn=MobileNumber&kw=Keyword&service=ServiceName&var1=Parameter/Abbreviation
//     &var2=Parameter/Abbreviation&text=ReplyMessage&rrn=RRN&svc_id=ServiceID&binfo=BINFO&dlrurl=DLR
//     &on=BOOLEAN



if(isset($_POST['submit']))
{
	$username ='ianolinares';  
	$password ='232427Nai';
	$msisdn = "639151484349"; 
	$text = "I'm sending an sms notif through ccs application"; 
	$kw = strtolower("note"); 
	$service =  strtolower("note"); 
	$var1= "on";
	$servid= "68006";
	$dlurl=urlencode("http://umakccsportal.net23.net/");
	if($var1 == 'on' || $var1 == 'ON')
	{
	$reply= urlencode("$kw $service: FROM:CCS BRING YOUR LAPTOPS DURING DEFENSE ");
	$sendurl="http://121.58.235.156/sms/sms_out.php?username=$username&password=$password&
msisdn=$msisdn&kw=$kw&service=$service&var1=$var1&text=$text&
svc_id=$servid&binfo=3293&dlrurl=$68006&on=1";
	$reqop =& new HTTP_Request("$sendurl");
	$reqop->_allowRedirects = true;
	$reqop->_maxredirects   = 16;
	$resop =& $reqop->sendRequest();		
}		}
?>