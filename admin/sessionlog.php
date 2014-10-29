<?php

session_start(); 
include('limoconfig.php');

 if (isset($_POST['username'],$_POST['pass'])) {  
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING); 

	$password = md5($_POST['pass']); 
	try{
		/*** query the database ***/
		$chklogin_sql="SELECT * FROM admin where username='".$username."' and password='".$password."'";
		$result = db::getInstance()->query($chklogin_sql);
		/*** loop over the results ***/ 
		$chklogin_val = $result->rowCount(); 
		if($chklogin_val==1)
		{
			foreach($result as $row)
			{
				$_SESSION['userid'] = $row['id'];
				$_SESSION['username'] = $row['username'];  
				//header('location:@'.$seeker_uid.'');
				header('location:home.php');
				//echo 1;
			}
		}
		else
		{
			header('location:index.php?m=iup'); 
			//echo 0;
		}	 
		}
	catch(PDOException $e)
		{
			echo $e->getMessage();
		}
} 
?>