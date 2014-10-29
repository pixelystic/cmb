<?php
	session_start();  
	error_reporting(0);
	include('../limoconfig.php'); 
	if(isset($_POST))
	{
	$action=$_POST['action'];
	$id 	= $_POST['id'];
	$email 	= $_POST['email'];
	$downloadlink 	= $_POST['downloadlink'];
	$noofcamfilms 	= $_POST['noofcamfilms'];
	$nooffilms 	= $_POST['nooffilms'];
	$nooftvshow 	= $_POST['nooftvshow'];
	$noofitems 	= $_POST['noofitems'];
	 
	}
	if($action=="new")
	{ 
		
		$insert ="INSERT INTO settings (id, email, downloadlink, downlink_active, noofcamfilms, nooffilms, nooftvshow, noofitems) VALUES (NULL, '".$email."', '".$downloadlink."',1, '".$noofcamfilms."', '".$nooffilms."', '".$nooftvshow."', '".$noofitems."')";
		//echo $update;
		db::getInstance()->exec($insert); 
		
		$_SESSION['email'] = $email;
		$_SESSION['downloadlink'] = $downloadlink;
		$_SESSION['noofcamfilms'] = $noofcamfilms;
		$_SESSION['nooffilms'] = $nooffilms;
		$_SESSION['nooftvshow'] = $nooftvshow;
		$_SESSION['noofitems'] = $noofitems;
		
		echo 1;  
		exit;
	}
	elseif($action=="update")
	{
		$update = "update settings set  email='".$email."' , downloadlink='".$downloadlink."' ,downlink_active=1, noofcamfilms=".$noofcamfilms." , nooffilms=".$nooffilms." , nooftvshow=".$nooftvshow.", noofitems=".$noofitems."   where id=".$id;
		//echo $update;
		db::getInstance()->exec($update);
		
		$_SESSION['email'] = $email;
		$_SESSION['downloadlink'] = $downloadlink;
		$_SESSION['noofcamfilms'] = $noofcamfilms;
		$_SESSION['nooffilms'] = $nooffilms;
		$_SESSION['nooftvshow'] = $nooftvshow;
		$_SESSION['noofitems'] = $noofitems;
		
		echo 1 ;
		exit;
	} 
	else
	{
		echo "error";
	}
?>