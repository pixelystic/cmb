<?php
include('../limoconfig.php');

	$action="new";
	$status="Save"; 
	
	$id 	=0;
	$email 	= "";
	$downloadlink 	="";
	$noofcamfilms 	="";
	$nooffilms 	= "";
	$nooftvshow 	= "";
	$noofitems 	= "";
	 
		
		$settings_sql = "SELECT * from settings  ";
		$settings_result = db::getInstance()->query($settings_sql);
		foreach ($settings_result as $settings)
			 { 
				$id 	= $settings['id'];
				$email 	= $settings['email'];
				$downloadlink 	= $settings['downloadlink'];
				$noofcamfilms 	= $settings['noofcamfilms'];
				$nooffilms 	= $settings['nooffilms'];
				$nooftvshow 	= $settings['nooftvshow'];
				$noofitems 	= $settings['noofitems'];

				$action="update";
				$status=$action; 
			 }
    ?>
<script type="text/javascript">
$(function(){
	$("#frmSettings").submit(function(){ 
		$.ajax({
			url:$(this).attr("action"),
			type:$(this).attr("method"),
			data:$(this).serialize(),
			success:function(data){ 
				if(data==1)
				{
					$('.msg p strong').replaceWith('<strong>Data has been updated successfully</strong>'); 
					$('.msg').slideDown('slow').delay(2000).slideUp('slow');
					$("#Formcontent").load("db_sql/settings.php");
				}
				else
				{
					alert(data);
				}
			}
		});
		return false;
	});   
})
</script> 
<form name="frmSettings" id="frmSettings" action="db_sql/settings_db.php" method="post">
					<div class="element">
						<label for="email">Contact Email : <span class="red">(required)</span></label>
						<input name="email" class="text err" id="email" value="<?php echo $email; ?>" />
					</div> 
                    <div class="element">
						<label for="downloadlink">Download Link<span class="red">(required)</span></label>
						<input name="downloadlink" class="text err" id="downloadlink" value="<?php echo $downloadlink; ?>" />
					</div> 
                    <div class="element">
						<label for="noofcamfilms">No of cam quality films show in home page<span class="red">(required)</span></label>
						<input name="noofcamfilms" class="text err" id="noofcamfilms" value="<?php echo $noofcamfilms; ?>" />
					</div>
                    <div class="element">
						<label for="nooffilms">No of films show in home page<span class="red">(required)</span></label>
						<input name="nooffilms" class="text err" id="nooffilms" value="<?php echo $nooffilms; ?>" />
					</div>
                    <div class="element">
						<label for="nooftvshow">No of tvshows show in home page<span class="red">(required)</span></label>
						<input name="nooftvshow" class="text err" id="nooftvshow" value="<?php echo $nooftvshow; ?>" />
					</div> 
                    <div class="element">
						<label for="noofitems">No of items per page<span class="red">(required)</span></label>
						<input name="noofitems" class="text err" id="noofitems" value="<?php echo $noofitems; ?>" />
					</div> 
                    
					<div class="entry">
                    <button type="submit" class="add"><?php echo $status;?></button>
                  <input type="hidden" name="action" value="<?php echo $action;?>" />
                  <input type="hidden" name="id" value="<?php echo $id;?>" />
					</div>
				</form>