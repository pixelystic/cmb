<?php
include('../limoconfig.php');

	$action="new";
	$status="Save"; 
	$id = 0;
	$genreName 	= "";
	  

	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		
		$gn_sql = "SELECT * from genre where id=".$_GET['id']." ";
		$gn_result = db::getInstance()->query($gn_sql);
		foreach ($gn_result as $genre)
			 { 
				$id 	= $genre['id'];
				$genreName 	= $genre['genreName'];

				$action="update";
				$status=$action; 
			 }
	}
    ?>
<script type="text/javascript">
$(function(){
	$("#frmGenre").submit(function(){ 
		$.ajax({
			url:$(this).attr("action"),
			type:$(this).attr("method"),
			data:$(this).serialize(),
			success:function(data){ 
				if(data==1)
				{
					$('.msg p strong').replaceWith('<strong>Data has been updated successfully</strong>'); 
					$('.msg').slideDown('slow').delay(2000).slideUp('slow');
					$("#datacontent").load("db_sql/genres.php");
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
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true,iconsPath : 'nicedit/nicEditorIcons.gif',uploadURI : 'nicUpload.php'}).panelInstance('txtEventsDes'); 
});
</script>
<form name="frmGenre" id="frmGenre" action="db_sql/genres_db.php" method="post">
					<div class="element">
						<label for="name">Genre Name <span class="red">(required)</span></label>
						<input name="name" class="text err" id="name" value="<?php echo $genreName; ?>" />
					</div>
					<div class="entry">
                    <button type="submit" class="add"><?php echo $status;?></button>
                  <input type="hidden" name="action" value="<?php echo $action;?>" />
                  <input type="hidden" name="id" value="<?php echo $id;?>" />
					</div>
				</form>