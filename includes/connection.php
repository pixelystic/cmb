<?php

    require("constants.php");
/*
    $connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
    if(!$connection){
        die("Database connectoin failed: " . mysql_error());
    }

    $db_select = mysql_select_db(DB_NAME, $connection);
    if(!$db_select){
        die("Database selection failed: " . mysql_error());
    }
*/

class dbConnect{

	private static $host= DB_SERVER ;
	private static $db = DB_NAME;
	private static $port = DB_PORT;
	private static $user = DB_USER;
	private static $pass = DB_PASS;

private static $instance = NULL;
	private function __construct() {
	  /*** maybe set the db name here later ***/
	}

public static function getInstance() {
			if (!self::$instance)
				{ 
			
				self::$instance = new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$db."", self::$user, self::$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));;
				self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				}
		return self::$instance;
	}
}
?>
