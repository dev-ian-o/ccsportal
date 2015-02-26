<?php

if(substr(dirname(__FILE__), -1) != DIRECTORY_SEPARATOR)
	require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'Base.php');
else
	require_once(dirname(__FILE__) .'Base.php');

class Posts extends Base{
	
	private static $table = "tblpost";

	public static function add($row){

		// $row['image'] = self::add_photo($row["files"]);

		$conn = self::conn();

		$stmt = $conn->prepare("INSERT INTO 
			".self::$table." (`id_user`, `level_user`, `post`, `date_post`) 
			VALUES (:id_user, :level_user, :post, now());");

		$stmt->execute(array(
			"id_user" => $row['id_user'],
			"level_user" => $row['level_user'],
			"post" => $row['post'],
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
		// $date = date("Y-m-d H:i:s");
		$stmt = $conn->prepare("SELECT * FROM ".self::$table." ORDER BY DATE_FORMAT(date_post, '%d') DESC,DATE_FORMAT(date_post, '%Y') DESC,DATE_FORMAT(date_post, '%m') DESC, DATE_FORMAT(date_post, '%H') DESC, DATE_FORMAT(date_post, '%i') DESC, DATE_FORMAT(date_post, '%s') DESC");

		$stmt->execute(array(

		));
		
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		foreach ($row  as $key => $value) {
			if($value["level_user"] == "student"){
				// $row[$key] = json_decode(self::findByStudentId($id))[0];
				$row[$key] = array_merge($value, (array) json_decode(self::findByStudentId($value['id_user']))[0]);
			}
			else if($value["level_user"] == "teacher"){
				// self::findByTeacherId($id)
				$row[$key] = array_merge($value, (array) json_decode(self::findByTeacherId($value['id_user']))[0]);
			}
		}

		return json_encode($row);

	}

	public static function findByStudentId($id){

		$conn = self::conn();

		$stmt = $conn->prepare("SELECT * FROM tblstudent WHERE id_student=:id");

		$stmt->execute(array(
			"id" => $id
		));
		
		$row = $stmt->fetchAll(PDO::FETCH_ASSOC);		

		return json_encode($row);			
	}

	public static function findByTeacherId($id){

		$conn = self::conn();

		$stmt = $conn->prepare("SELECT * FROM tblteacher WHERE id_teacher=:id");

		$stmt->execute(array(
			"id" => $id
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