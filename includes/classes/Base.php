<?php


class Base{
	private static $config = array(
		"host" => "localhost",
		"dbname" => "ccsportaldb",
		"username" => "root",
		"password" => "",
	);
	private static $dir = 'C:\xampp\htdocs\proto';

	public static function conn(){
		$conn = new PDO('mysql:host='.self::$config['host'].';dbname='.self::$config['dbname'],self::$config['username'],self::$config['password']);

		return $conn;
	}	

	public static function add_photo($files){

		$folder = md5(time());

	    $name = $files['file']['name'];
	    $name = strtolower(str_replace(' ', '_', $name));
	    $name = time()."_".$name;
	    $path = self::$dir . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder;
	    $full_path = $path . DIRECTORY_SEPARATOR . $name;
		
		if (!mkdir($path, 0, true)) {
			die('Failed to create folders...');
		}

	    if ( move_uploaded_file ( $files["file"]["tmp_name"] , 
	        $full_path) ){
	        $path = $folder . DIRECTORY_SEPARATOR . $name;
	    	return $path;

	    }
	    else{
	    	return "";
	    }

	}
}

// if($_POST){
// 	Base::add_photo($_FILES);
// }