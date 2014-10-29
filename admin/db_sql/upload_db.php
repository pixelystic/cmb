<?php
	error_reporting(0);
	include('../limoconfig.php'); 
	$path = "../../uploads/";

	$valid_formats = array("jpg", "png",);
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			$title = $title['title']; 
			if($title=="")
			{
				$title = $name;
			}
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
									$imgUrl = "uploads/".$actual_image_name;
									$insert = "INSERT INTO images (id,imageName,imgUrl) VALUES (null, '".$title."', '".$imgUrl."')";
									$insertDb = db::getInstance()->exec($insert);  
									
									echo "<img src='../uploads/".$actual_image_name."'  class='preview'>";
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
		if($_GET['action']=="delete")
		{ 
		$id =$_GET['id'];  
				$delete_img = "delete from images where id=".$id;
				db::getInstance()->exec($delete_img);
				echo 1; 
		 
		
	}
		
?>