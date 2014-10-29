<?php
	error_reporting(0);
	include('../limoconfig.php'); 
	if(isset($_POST))
	{
	$action=$_POST['action'];
	$id =$_POST['id'];
	$name = $_POST['name'];
	 
	}
	if($action=="new")
	{ 
		$insert = "INSERT INTO genre (id,genreName) VALUES (null, '".$name."')"; 
		db::getInstance()->exec($insert); 
		echo 1;  
		exit;
	}
	elseif($action=="update")
	{
		$update = "update genre set genreName='".$name."'   where id=".$id;
		db::getInstance()->exec($update);
		echo 1 ;
		exit;
	}
	elseif($_GET['action']=="delete")
	{ 
		$id =$_GET['id']; 
		$delete = "delete from genre where id=".$id;
	 	db::getInstance()->exec($delete); 
		echo 1;
		exit;
	}
	else
	{
		echo "error";
	}
?>