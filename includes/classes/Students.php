<?php

if(substr(dirname(__FILE__), -1) != DIRECTORY_SEPARATOR)
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'Base.php');
else
	require_once(dirname(__FILE__) .'Base.php');

class Users extends Base{
	
	private static $table = "users";

	public static function check_email($row){
		$conn = self::conn();		

		$stmt = $conn->prepare("SELECT * FROM ".self::$table." WHERE email=:email AND deleted_at IS null");

		$stmt->execute(array(
			"email" => $row['email'],
		));

		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		if($row != null)
			return json_encode(array("success"=> false)); // email already exist
		else
			return json_encode(array("success"=> true)); // email accepted
	}

	public static function add($row){
		
		$check_email = json_decode(self::check_email($row));
		if($check_email->success === false)
			return json_encode(array("success"=> false));


		$row['password'] = sha1(md5($row['password']));
		// $row['image'] = self::add_photo($row["files"]);

		$conn = self::conn();

		$stmt = $conn->prepare("INSERT INTO 
			".self::$table." (`email`, `firstname`, `lastname`, `password`, `created_at`) 
			VALUES (:email, :firstname, :lastname, :password, now());");

		$stmt->execute(array(
			"email" => $row['email'],
			"firstname" => $row['firstname'],
			"lastname" => $row['lastname'],
			"password" => $row['password'],
		));
		
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		return json_encode(array("success"=> true));
	}


	public static function edit($row){
		//extend the row array to fetch
		$conn = self::conn();

		// $row['image'] = self::add_photo($row["files"]);
		
		$stmt = $conn->prepare("UPDATE ".self::$table." 
			SET	email = :email,
				firstname = :firstname,
				lastname = :lastname,
				password = :password,
				updated_at = now()
			WHERE user_id = :id");

		$stmt->execute(array(
			"email" => $row['email'],
			"firstname" => $row['firstname'],
			"lastname" => $row['lastname'],
			"password" => $row['password'],
			// "image" => $row['password'],
			"id" => $row['user_id'],
		));
		
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		return json_encode(array("success"=> true));
	}

	public static function delete($id){

		$conn = self::conn();

		$stmt = $conn->prepare("UPDATE ".self::$table." 
			SET deleted_at = now()
			WHERE user_id = :id");

		$stmt->execute(array(
			"id" => $id,
		));
		
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);	

		return json_encode(array("success"=> true));	
	
	}

	public static function fetch(){	

		$conn = self::conn();

		$stmt = $conn->prepare("SELECT * FROM ".self::$table." WHERE deleted_at IS NULL");

		$stmt->execute(array(

		));
		
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		return json_encode($row);
	}

	public static function findById($id){

		$conn = self::conn();

		$stmt = $conn->prepare("SELECT * FROM ".self::$table." WHERE user_id = :id AND deleted_at IS NULL");

		$stmt->execute(array(
			"id" => $id
		));
		
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		return json_encode($row);			
	}

}

// $row = [
// 	"email" => "ianolinares@ymail.com",
// 	"firstname" => "Ian",
// 	"lastname" => "Olinares",
// 	"password" => "password",
// 	// "user_id" => "1"
// ];

// $id = 1;
// print_r(Users::add($row));
// // print_r($db->add("s"));
// // Database::conn();