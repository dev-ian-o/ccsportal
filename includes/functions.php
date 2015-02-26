<?php
	// This file is the place to store all basic functions
	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;	
		}
	}
	function redirect_2($location){
		$print = "<script>window.location = '".$location."';</script>";
		echo $print;
	}

	function change_password($new,$id,$id_no,$user){
		 $new = rtnEncrypt($new);
		 if($user == "student")
		 {
		 	$query = "UPDATE tblstudent SET
		 			password = '$new',
		 			status = 'old'
			        WHERE id_student = '$id' 
			    	AND student_no = '$id_no'";
		 }
		 else if($user == "teacher")
		 {
		 	$query = "UPDATE tblteacher SET
		 			password = '$new',
		 			status = 'old'
			        WHERE id_teacher = '$id' 
			    	AND employee_no = '$id_no'";
			    	
		 }			    	
         $result = @mysql_query($query); 


         unset($_SESSION['new_user']);
	}

	function login_user($userid,$password){
		
		$query = "SELECT password,status
				  FROM tblstudent 
				  WHERE student_no = '$userid'";

	    $result = @mysql_query($query);
	    $row = mysql_fetch_array($result,MYSQL_NUM);
	    if($row)
	    {
	    	if(rtnDecrypt($row[0]) === $password)
		    {	$query = "SELECT id_student,student_no,status
					  FROM tblstudent 
					  WHERE student_no = '$userid'";
					 
				$result = @mysql_query($query); 

	    		$row = mysql_fetch_array($result,MYSQL_NUM);
		    	$_SESSION['user_id'] = $row[0];
		    	$_SESSION['id_no'] = $row[1]; // username ID NUMBER
		    	$_SESSION['level_user'] = "student";
		    	if($row[2] != "new"){redirect_to("home.php");}
		    	else {
		    		$_SESSION['new_user'] = "new_user";
		    		redirect_to("change_password.php");
		    	}
		    }
	    } 

	    $query = "SELECT password,status
				  FROM tblteacher 
				  WHERE employee_no = '$userid'";

	    $result = @mysql_query($query);
	    $row = mysql_fetch_array($result,MYSQL_NUM);
	    if($row)
	    {
	    	if(rtnDecrypt($row[0]) === $password)
		    {	$query = "SELECT id_teacher,employee_no,status
					  FROM tblteacher 
					  WHERE employee_no = '$userid'";
					 
				$result = @mysql_query($query); 

	    		$row = mysql_fetch_array($result,MYSQL_NUM);
		    	$_SESSION['teacher_id'] = $row[0];
		    	$_SESSION['id_no'] = $row[1]; // username ID NUMBER
		    	$_SESSION['level_user'] = "teacher";
		    	if($row[2] != "new"){redirect_2("teacher/home.php");}
		    	else {
		    		$_SESSION['new_user'] = "new_user";
		    		redirect_to("change_password.php");
		    	}

		    }
	    } 

	    $query = "SELECT id,admin_id
				  FROM tbladmin 
				  WHERE admin_id = '$userid' 
				  AND password = SHA('$password')";
	    $result = @mysql_query($query);
	    $row = mysql_fetch_array($result,MYSQL_NUM);
	    if($row)
	    {
	    	$_SESSION['admin_id'] = $row[0];
	    	$_SESSION['id_no'] = $row[1]; // username ID NUMBER
	    	$_SESSION['level_user'] = "admin";
	    	redirect_to("admin/ua_student.php");
 	    }
 	    else {}    
	}
	function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

	class Cipher
{

    private $securekey;
    private $iv_size;

    function __construct($textkey)
    {
        $this->iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $this->securekey = hash('sha256', $textkey, TRUE);
    }

    function encrypt($input)
    {
        $iv = mcrypt_create_iv($this->iv_size);
        return base64_encode($iv . mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->securekey, $input, MCRYPT_MODE_CBC, $iv));
    }

    function decrypt($input)
    {
        $input = base64_decode($input);
        $iv = substr($input, 0, $this->iv_size);
        $cipher = substr($input, $this->iv_size);
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->securekey, $cipher, MCRYPT_MODE_CBC, $iv));
    }

}


	function rtnEncrypt($pass){
		$c = new Cipher('ian'); 
        $encrypted = $c->encrypt($pass);
        return $encrypted;
	}
	function rtnDecrypt($pass){
		$c = new Cipher('ian'); 
        $decrypted = $c->decrypt($pass);
        return $decrypted;
	}

	
	function new_subject($desc,$code,$units,$sem,$course,$course_year){
		$query = "INSERT  INTO tblsubject(subject_desc,subject_code,subject_unit,semester,course,course_year)
		VALUES  ('$desc','$code','$units','$sem','$course','$course_year')";
		$result = @mysql_query($query);
	}

	function upload_pic($filename){//,$name,$type,$size,$erro,$tmpname){
		// $_FILES["file"]["name"] = $name;
	 //    $_FILES["file"]["type"] = $type;
	 //    $_FILES["file"]["size"] = $size;
	 //    $_FILES["file"]["error"] = $error;
	 //    $_FILES["file"]["tmp_name"] = $tmpname;
	    $allowedExts = array("gif", "jpeg", "jpg", "png");
	    $temp = explode(".", $_FILES["file"]["name"]);
	    
	    $extension = end($temp);
	    if ((($_FILES["file"]["type"] == "image/gif")
	    || ($_FILES["file"]["type"] == "image/jpeg")
	    || ($_FILES["file"]["type"] == "image/jpg")
	    || ($_FILES["file"]["type"] == "image/pjpeg")
	    || ($_FILES["file"]["type"] == "image/x-png")
	    || ($_FILES["file"]["type"] == "image/png"))
	    && ($_FILES["file"]["size"] < 10000)
	    && in_array($extension, $allowedExts))
	      {
	      if ($_FILES["file"]["error"] > 0)
	        {
	        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	        }
	      else
	        {

	        if (file_exists("upload/" . $_FILES["file"]["name"]))
	          {
	          echo $_FILES["file"]["name"] . " already exists. ";
	          }
	        else
	          {
	           $_FILES["file"]["name"] = $filename.".".$extension; 
	          move_uploaded_file($_FILES["file"]["tmp_name"],
	          "upload/" . $_FILES["file"]["name"]);
	          return $_FILES["file"]["name"];
	          }
	        }
	      }
	    else
	      {

	      }
}


function edit_student($id,$lastname,$firstname,$middlename,$dob,$add_no,$add_street,$add_brgy,$add_city,$contactno,$gender,$student_no,$yr,$section,$course,$image){
		if($image != ""){ $print = "
		image = '$image',";}
		else $print = ""; 
		$query = "UPDATE tblstudent SET 
		lastname = '$lastname',
		firstname = '$firstname',
		middlename = '$middlename',
		dob = '$dob',
		add_no = '$add_no',
		add_street = '$add_street',
		add_brgy = '$add_brgy',
		add_city = '$add_city',
		contact_no = '$contactno',
		gender = '$gender',
		student_no = '$student_no',
		yr = '$yr',
		section = '$section',
		".$print."
		course = '$course'
		WHERE id_student = '$id'";		
		$result = @mysql_query($query);

}
function edit_teacher($id,$lastname,$firstname,$middlename,$dob,$add_no,$add_street,$add_brgy,$add_city,$contactno,$gender,$employee_no,$image,$emailadd){
		if($image != ""){ $print = "
		image = '$image',";}
		else $print = ""; 
		$query = "UPDATE tblteacher SET 
		lastname = '$lastname',
		firstname = '$firstname',
		middlename = '$middlename',
		dob = '$dob',
		add_no = '$add_no',
		add_street = '$add_street',
		add_brgy = '$add_brgy',
		add_city = '$add_city',
		contact_no = '$contactno',
		gender = '$gender',
		employee_no = '$employee_no',
		".$print."
		emailadd = '$emailadd'
		WHERE id_teacher = '$id'";		
		$result = @mysql_query($query);

}

	function random_string() {
	$length = 10;	
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
function addua_student($lastname,$firstname,$middlename,$dob,$add_no,$add_street,$add_brgy,$add_city,$contactno,$gender,$student_no,$yr,$section,$course,$password,$image){
        
    	$query = "INSERT  INTO tblstudent
    			(lastname,firstname,middlename,dob,add_no,add_street,add_brgy,add_city,contact_no,gender,student_no,yr,section,course,password,image)
		VALUES  ('$lastname','$firstname','$middlename','$dob','$add_no','$add_street','$add_brgy','$add_city','$contactno','$gender','$student_no','$yr','$section','$course','$password','$image')";
		$result = @mysql_query($query);
    }
function addua_teacher($lastname,$firstname,$middlename,$dob,$add_no,$add_street,$add_brgy,$add_city,$contactno,$gender,$employee_no,$password,$image,$emailadd){
        
    	$query = "INSERT  INTO tblteacher
    			(lastname,firstname,middlename,dob,add_no,add_street,add_brgy,add_city,contact_no,gender,employee_no,password,image,emailadd)
		VALUES  ('$lastname','$firstname','$middlename','$dob','$add_no','$add_street','$add_brgy','$add_city','$contactno','$gender','$employee_no','$password','$image','$emailadd')";
		$result = @mysql_query($query);
    }

function full_date($date){
    return date('l, M j, Y',strtotime($date));   
}
function full_time($date){
    return date('h:i A',strtotime($date));
}

function formatTime($time){
            return date("H:i", strtotime($time));    
}	
function formatDate($date){
            return date("Y-m-d", strtotime($date));    
}

function timeNow(){
        date_default_timezone_set('Etc/GMT+8');   
        $time = date('h:i:s A');
        return date("H:i", strtotime($time));
}
function dateNow(){
        date_default_timezone_set('Etc/GMT+8');   
        return date("Y-m-d");
}

function dateNow_db_format(){
        date_default_timezone_set('Etc/GMT+8');   
        return date("Y-m-d")." ".date("H:i:s");   
}

function get_Author($author){
		if($author == "admin"){ return "admin";}
		elseif ($author == "teacher") {
		$id_no = $_SESSION['id_no'];
		$query = "SELECT firstname,lastname
						FROM tblteacher 
					  WHERE employee_no = '$id_no'";
		$result = @mysql_query($query);
		$row = mysql_fetch_array($result,MYSQL_NUM);
		return $row[0].' '.$row[1];
		}

}

function add_schedule($title,$place,$date,$desc,$time,$author,$id_user,$level_user){
		$author = get_Author($author);
        $created = dateNow_db_format();
        $date .= " ";
        $date .= $time;
        $query = "INSERT INTO tblschedule(title,place,date_sched,description,date_created,author,id_user,level_user)
        VALUES  ('$title','$place','$date','$desc','$created','$author','$id_user','$level_user')";
        $result = @mysql_query($query);
}
function edit_schedule($id,$title,$place,$date,$desc,$time,$author){
        $author = get_Author($author);
        $editted = dateNow_db_format();
        $date .= " ";
        $date .= $time;
        $query = "UPDATE tblschedule SET 
        title = '$title',
        place = '$place',
        date_sched = '$date',
        description = '$desc',
        author = '$author',
        date_editted = '$editted'
        WHERE id_schedule = '$id'";
        $result = @mysql_query($query);
}


?>