<?php
session_start();
	//error_reporting(0);
	include('../limoconfig.php'); 
	if(!isset($_SESSION['userid']) )
	{
		header('Location:index.php');
		//echo "uuuuu";
	}
	if(!empty($_POST))
	{ 
		$action=$_POST['action'];
		$id =$_POST['id'];  
		$title = addslashes($_POST['title']); 
		$slug = gv::slugify($_POST['title']); 
		$Des = $_POST['description'];   
		$status = "Pending"; 
		$imagehas = $_POST["imagehas"]; 
		
	}
	function imageupload($imghas)
	{
		$fullpath = "uploads/";
		$path = "../../uploads/";
		if($imghas=='no' || ($imghas=='yes' && isset($_FILES['photoimg'])))
		{
			$result;
			$imgurl="";
			$valid_formats = array("jpg", "png",); 
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];  
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024*3))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{ 
								 	$result = 1;
									$imgurl = $actual_image_name;
								}
							else { $result = "<div  class='n_warning'><p>failed</p></div>"; }
						}
						else {	$result = "<div  class='n_warning'><p>Image file size max 3 MB</p></div>"; }
					}
					else { $result = "<div  class='n_warning'><p>Invalid file format..</p></div>"; }
				}
			else { $result = "<div  class='n_warning'><p>Please select image.</p></div>"; }
				 
		} 
		else
		{
			$result = "Error";
		}
		return array($result, $imgurl);
	}
	
	if(isset($_POST) and $_SERVER["REQUEST_METHOD"] == "POST")
		{ 
		 
			if($action=="new")
			{ 
				 
					$return_msg = imageupload($imagehas);
					$imgUrl =  $return_msg[1]; 
					$insert = "INSERT INTO articles  (id, title,slug,imageurl,description,addedby,status) VALUES (null, ?,?,?,?,?,?)"; 
				//echo $insert;
					$insertDb = db::getInstance()->prepare($insert);
					$insertDb->execute(array($title,$slug,$imgUrl,$Des,$_SESSION['userid'],"Pending"));
					echo  $return_msg[0]; 
					exit;
				 
			}
			elseif($action=="update")
			{ 
				if($imagehas=="no")
				{  //echo "no";
					$return_msg = imageupload($imagehas);
					//echo $return_msg[1];
					 $imgUrl = $return_msg[1]; 
					$update = "update articles set title=?,slug=?,imageurl=?,description=? where id=? ";
					//echo $update;
					$query = db::getInstance()->prepare($update);
					$query->execute(array($title,$slug,$imgUrl,$Des, $id));
					echo 1 ;
					exit;
				} 
				else if($imagehas=="yes"){
					//echo "yes";
					if(isset($_FILES["photoimg"])){  
						$return_msg = imageupload($imagehas);
						//echo $return_msg[1];
						 $imgUrl = $return_msg[1]; 
						$update = "update articles set title=?,slug=?,imageurl=?,description=? where id=? ";
						//echo $update;
						$query = db::getInstance()->prepare($update);
						$query->execute(array($title,$slug,$imgUrl,$Des, $id));
						echo 1 ;
						exit;
					}
					else
					{   
						$update = "update articles set title=? ,slug=?,description=? where id=?";
						//echo $update; 
						$query = db::getInstance()->prepare($update);
						$query->execute(array($title,$slug,$Des,$id));
						echo 1 ;
						exit;
					}
				}
				else
				{  
					$update = "update articles set title=? ,slug=?,description=? where id=?";
					//echo $update; 
					$query = db::getInstance()->prepare($update);
					$query->execute(array($title,$slug,$Des,$id));
					echo 1 ;
					exit;
				}
			}
		}
		
	
	elseif($_GET['action']=="delete")
	{ 
		$id =$_GET['id']; 
		 
		$delete = "delete from articles where id=".$id;
	 	db::getInstance()->exec($delete); 
		echo 1;
		exit;
	}
	elseif($_GET['action']=="publish")
	{ 
		$id =$_GET['id'];  
		$val =$_GET['val']; 
		
		$update = "update articles set status='".$val."' where id=".$id; 
		db::getInstance()->exec($update); 
		 
		echo 1;
		exit;
	}
	else
	{
		echo "System error";
	}
	 
?>