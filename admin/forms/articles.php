<?php
include('../limoconfig.php');

	$action="new";
	$status="Save"; 
	$id = 0;
	$title 	="";
	$description="";
	$imageurl =""; 
	$slug 	= "";  

	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		
		$view_sql = "SELECT   * FROM articles  WHERE id=".$_GET['id']." ORDER BY   id   ASC "; 
	 		
		$view_result = db::getInstance()->query($view_sql);
		$view_count =  $view_result->rowCount();
				//echo $chk_count;
		if($view_count > 0 )
		{
			foreach ($view_result as $view)
			 { 
				$id 	= $view['id']; 
				$title 	= $view['title'];
				$description 	= $view['description'];
				$imageurl 	= $view['imageurl']; 
				$action="update";
				$status=$action; 
			 }
		}
	}
    ?> 
  
<script type="text/javascript"> 
$(document).ready(function(){ 
  new nicEditor({iconsPath : 'nicEditorIcons.gif',buttonList : ['bold','italic','underline','left','center','right','justify','ol','ul','fontSize','fontFamily','fontFormat','indent','outdent','link','unlink','forecolor','bgcolor','image','upload','youTube'],uploadURI:'nicUpload.php'}).panelInstance('description');
});
</script>
<form name="frm" id="frm" action="db_sql/articles_db.php" method="post"> 
                     <div class="element">
						<label for="title">Title <span class="red">(required)</span></label>
						<input name="title" class="text" id="title" value="<?php echo $title; ?>" />
					</div> 
                    <div class="element">
						<label >Description <span class="red">(required)</span></label>
                        <textarea name="description" rows="4" class="text  " id="description"><?php echo $description; ?></textarea>
					</div> 
                    <div class="element">
                    	<?php if($imageurl!="")
						{ ?>
                    	<img  class="imagefrm" src="<?php echo IMG_PATH.$imageurl; ?>" width="200"   />
                        <input type="hidden" name="imagehas" id="imagehas" value="yes" />
                        <?php } else { ?> <input type="hidden" id="imagehas" name="imagehas" value="no" /> <?php }?>
						<label for="photoimg">Featured image <span class="red">(required)</span></label>
                      <input type="file" name="photoimg" id="photoimg" />
  </div> 
					<div class="entry">
                    <button type="submit" class="add"><?php echo $status;?></button>
                  <input type="hidden" name="action" value="<?php echo $action;?>" />
                  <input type="hidden" name="id" value="<?php echo $id;?>" /> 
					</div>
				</form>
 


<script type="text/javascript">
  $(document).ready(function(){   
	$("#frm").validate({ 
		rules: {
				title: {           //input name: fullName
                    required: true,   //required boolean: true/false 
					//select:true
                },
				description: {           //input name: fullName
                    required: true,   //required boolean: true/false 
					//select:true
                }, 
				photoimg: {           //input name: fullName
                    required: function()
					{ 
						if ($("#imagehas").val() == "no"  ) {
                     		return true;
					 	} 
						else if ($("#imagehas").val() == "yes"  ) {
                     		return false;
					 	} 
					} ,   //required boolean: true/false 
					//select:true
                }, 
            },
            messages: { //messages to appear on error
				title: {
                      required:"Please enter title" 
                      },
				description: {
                      required:"Please enter description" 
                      }, 
				photoimg: {
                      required:"Select a image" 
                      },    
				 
            },
			
		 //submitHandler: function(form) { 
			  
     /*
				$.ajax({
				url:$("#frm").attr("action"),
				type:$("#frm").attr("method"),
				data:$("#frm").serialize(),
				success:function(data){ 
					if(data==1)
					{
						$('.msg p strong').replaceWith('<strong>Data has been updated successfully</strong>'); 
						$('.msg').slideDown('slow').delay(2000).slideUp('slow');
						$("#datacontent").load("db_sql/services_types.php?page=1");
						$("#frm").html("");
					}
					else
					{
						alert(data);
						
						//$(".entryaa").html(data);
					}
				}
			});
			*/
		 //}
	});   
	$("#frm").ajaxForm({    
		success:function(data){ 
			if(data==1)
			{
				$('.msg p strong').replaceWith('<strong>Data has been updated successfully</strong>'); 
				$('.msg').slideDown('slow').delay(2000).slideUp('slow');
				$("#datacontent").load("db_sql/articles.php?page=1");
				$("#frm").html("");
			}
			else
			{
				$('.msg p strong').replaceWith(data); 
				$('.msg').slideDown('slow').delay(2000).slideUp('slow');
			//$('.msg').slideDown('slow');
				$("#frm").html("");
				//alert(data);
				
				//$(".entryaa").html(data);
			}
		}
	});
	 
	
  });
</script> 

