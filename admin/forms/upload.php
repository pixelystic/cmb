<?php
include('../limoconfig.php'); 
?>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" >
 $(document).ready(function() { 
		$('#photoimg').live('change', function()			{ 
			  $("#preview").html('');
			  $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
			  $("#imageform").ajaxForm({
					target: '#preview'
				}).submit(); 
			  
			});
        }); 
</script>
<form action="db_sql/upload_db.php" method="post" enctype="multipart/form-data" name="imageform" id="imageform">
		<div class="element">
			<label for="title">Image Title</label>
			<input name="title" class="text err" id="title" value="" />
		</div> 
        <div class="element">
            <label for="photoimg">Select the image</label>
            <label for="photoimg"></label>
            <input type="file" name="photoimg" id="photoimg" />
		</div> 
</form>
<div id='preview'></div>