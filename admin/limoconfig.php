<?php
 
define("APP_WEBROOT", "http://localhost:8990/pixelystic/cmb/");
define("IMG_PATH", "http://localhost:8990/pixelystic/cmb/uploads/");

class db{

private static $instance = NULL;
	private function __construct() {
	  /*** maybe set the db name here later ***/
	}

public static function getInstance() {
			if (!self::$instance)
				{
				$hostname = 'localhost';
				$port=3308;
				$username = 'root';
				$password = '';
			
				self::$instance = new PDO("mysql:host=$hostname;port=$port;dbname=colombo_today", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));;
				self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				}
		return self::$instance;
	}


private function __clone(){
	}
/* insert select update delete - test function start 


	private function getQueryType($query) {
        $parts = explode(" ",$query);
        if(isset($parts[0])) {
            return $parts[0];
        } //if
        return false;
    }
 
    public static function sql($query,$bind=array()) {
 
        // SELECT
        if(self::getQueryType($query)==='select') {
 
            $sth = self::prepare($query);
            // Prepared Statement
            if(is_array($bind) and !empty($bind)) {
                foreach($bind as $k => $v) {
                    $sth->bindParam(':'.$k, $v, self::bindType($v));
                } //foreach
            } //if
 
            if(!$sth->execute()){
                $result = array(1=>'false',2=>"There was an error in sql syntax.");
                return $result;
            }
            $result = $sth->fetchAll(PDO::FETCH_CLASS);
        } else {
 
        // UPDATE, INSERT, DELETE
            $count = self::getInstance()->exec($query);
            $error = self::getInstance()->errorInfo();
            if ($error[0] == 00000) $error[2]='';
            $resultarray = array('rows_affected' => $count, 'error' => $error[2]);
            return $resultarray;
        } //if
        return $result;
    }
	
	public function bindType($value, $type = null) {
 
        if( is_null($type) ) {
            switch( true ) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        return $type;
    }
	
 insert select update delete - test function end */
 

} /*** end of class ***/
class gv{ 
	function globalevales(){	
		$comvalues_sql = "SELECT * FROM comvalues   ";
		$comvalues_result = db::getInstance()->query($comvalues_sql);
		$comvalues_val =  $comvalues_result->rowCount();
			foreach ($comvalues_result as $comvalues)
			{
			$g_id = $comvalues['id'];
			$g_email 	= $comvalues['email'];	
			$g_tel 	= $comvalues['tel'];
			$g_fax	= $comvalues['fax'];
			}
		
			return  $comvalues_result;
	}
	
	public static function WordTruncate($input, $numWords) { 
		if(str_word_count($input,0)>$numWords) 
		{ 
			$WordKey = str_word_count($input,1); 
			$WordIndex = array_flip(str_word_count($input,2)); 
			return substr($input,0,$WordIndex[$WordKey[$numWords]]); 
		} 
		else {return $input;} 
	}
	
	static public function slugify($text)
	{ 
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	
	  // trim
	  $text = trim($text, '-');
	
	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	
	  // lowercase
	  $text = strtolower($text);
	
	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);
	
	  if (empty($text))
	  {
		return 'n-a';
	  }
	
	  return $text;
	}
}
?>