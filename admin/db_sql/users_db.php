<?php
	error_reporting(0);
	include('../limoconfig.php'); 
	if(isset($_POST))
	{
	$action=$_POST['action'];
	$id =$_POST['id']; 
	$val = $_POST['val']; 
	}
	  
	if($action=="update")
	{
		$update = "update films set title='".$title."',description='".$description."',reignid=".$filmreign.",releaseDate='".$releaseDate."',imageUrl='".$imageUrl."',downlink='".$downlink."',featured=".$featured.",filmtype='".$filmtype."' where id=".$id;
		// echo $update;
		db::getInstance()->exec($update); 
		 
		echo 1 ;
		exit;
	}
	elseif($_GET['action']=="delete")
	{ 
		$id =$_GET['id']; 
		
		$delete = "delete from admin where id=".$id;
		db::getInstance()->exec($delete_films_genre);  
		echo 1;
		exit;
	}
	elseif($_GET['action']=="publish")
	{ 
		$id =$_GET['id'];  
		$val =$_GET['val']; 
		
		$update = "update admin set active='".$val."' where id=".$id; 
		db::getInstance()->exec($update); 
		 
		echo 1;
		exit;
	}
	else
	{
		echo "error";
	}
?>