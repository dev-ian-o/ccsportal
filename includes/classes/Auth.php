<?php

if(substr(dirname(__FILE__), -1) != DIRECTORY_SEPARATOR)
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'Base.php');
else
	require_once(dirname(__FILE__) .'Base.php');



class Cipher{

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

class Auth extends Base{
	
	private static $table = "users";

	public static function signIn($data){

		$conn = self::conn();	
		$password = '';	
		$tables_user = array(
			array("table"=>'tblstudent','username'=>'student_no'),
			array("table"=>'tblteacher','username'=>'employee_no'),
		 );

		foreach ($tables_user as $key => $value) {

			$stmt = $conn->prepare("SELECT * FROM {$value['table']} WHERE {$value['username']}=:username");

			$stmt->execute(array(
				"username" => $data['username'],
			));
			
			$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

			if($row != null){
				if(rtnDecrypt($row[0]['password']) == $data['password']){
					break;
				}
			}
		}

		
		if($row != null){
			return json_encode($row);
		}
		else
			return json_encode(array("success"=> false));
		

	}

	

	public static function checkPassword($row){
		$row['old_password'] = sha1(md5($row['old_password']));
		$conn = self::conn();		

		$stmt = $conn->prepare("SELECT * FROM ".self::$table." WHERE email=:email AND password=:password AND deleted_at IS null");

		$stmt->execute(array(
			"email" => $row['email'],
			"password" => $row['old_password'],
		));

		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		return json_encode($row);
	}

	public static function changePassword($row){
		$row['password'] = sha1(md5($row['password']));
		$conn = self::conn();		

		$stmt = $conn->prepare("UPDATE ".self::$table." 
			SET	password = :password,
				updated_at = now()
			WHERE user_id = :id");

		$stmt->execute(array(
			"password" => $row['password'],
			"id" => $row['user_id'],
		));

		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		if($row != null){
			return json_encode(array("success"=> true));
		}
		else
			return json_encode(array("success"=> false));
	}

	public static function changeProfile($row){
		$conn = self::conn();		

		$stmt = $conn->prepare("UPDATE ".self::$table." 
			SET	firstname = :firstname,
				lastname = :lastname,
				updated_at = now()
			WHERE user_id = :id");

		$stmt->execute(array(
			"lastname" => $row['lastname'],
			"firstname" => $row['firstname'],
			"id" => $row['user_id'],
		));

		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		return json_encode(array("success"=> true));
	}
}

// $row = [
// 	"email" => "ianolinares@ymail.com",
// 	"password" => "passwsord",
// ];

// print_r(Auth::signIn($row));