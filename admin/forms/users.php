<?php
include('../limoconfig.php');

	$action="new";
	$status="Save"; 
	$id = 0;
	$genreValues 	= "";
	$id ="";
	$title="";
	$description="";
	$releaseDate 	="";
	$filmtype 	="";
	$imageUrl 	="";
	$codebody 	="";
	$downlink 	="";
	$featured	=0;
	$reignid	=0;
	/*title
	description
	releaseDate*/

	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		
		$films_sql = "SELECT f.*,v.codebody  from films  as f
				   	LEFT JOIN videoscript AS v ON v.relId = f.id
					where f.id=".$_GET['id']." and v.type='films' "; 
	 		
		$films_result = db::getInstance()->query($films_sql);
		foreach ($films_result as $films)
			 { 
				$id 	= $films['id'];
				$title 	= $films['title'];
				$description 	= $films['description'];
				$releaseDate 	= $films['releaseDate'];
				$filmtype 	= $films['filmtype'];
				$imageUrl 	= $films['imageUrl'];
				$codebody 	= $films['codebody'];
				$downlink 	= $films['downlink'];
				$featured 	= $films['featured'];
				$reignid 	= $films['reignid'];
				$action="update";
				$status=$action; 
			 }
	}
    ?>
<script type="text/javascript">
$(function(){
	$("#frmFilms").submit(function(){ 
		$.ajax({
			url:$(this).attr("action"),
			type:$(this).attr("method"),
			data:$(this).serialize(),
			success:function(data){ 
				if(data==1)
				{
					$('.msg p strong').replaceWith('<strong>Data has been updated successfully</strong>'); 
					$('.msg').slideDown('slow').delay(2000).slideUp('slow');
					$("#datacontent").load("db_sql/films.php?page=1");
					$("#frmFilms").reset;
				}
				else
				{
					alert(data);
					
					//$(".entryaa").html(data);
				}
			}
		});
		return false;
	}); 
	$('#releaseDate').datepicker({ 
		dateFormat:"yy-mm-dd"
		
	});  
})
</script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true,iconsPath : 'nicedit/nicEditorIcons.gif',uploadURI : 'nicUpload.php'}).panelInstance('txtEventsDes'); 
});
</script>
<form name="frmFilms" id="frmFilms" action="db_sql/films_db.php" method="post">
					<div class="element">
						<label for="description">Film Name <span class="red">(required)</span></label>
						<input name="title" class="text err" id="title" value="<?php echo $title; ?>" />
					</div>
                    <div class="element">
						<label for="genre">Genre <span class="red">(required)</span></label> 
							<?php
							
								$genre_sql = "SELECT * FROM genre     ORDER BY genreName ASC ";

								$genre_result = db::getInstance()->query($genre_sql);
								$genre_count =  $genre_result->rowCount();
								 if($genre_count>0)
								 {
									foreach ($genre_result as $genre)
									{
										$gid = $genre['id'];
										$genreName 	= $genre['genreName'];	 
										/* genre checked */ 
										$gchk_count=0;	
										if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
										{	
										$gchk_sql = "SELECT * FROM films_genre where filmsId=".$_GET['id']." and genreId=".$genre['id'];
										$gchk_result = db::getInstance()->query($gchk_sql);
										$gchk_count =  $gchk_result->rowCount();
										}
										if($gchk_count>0)
								 		{
											
											echo '<div style="width:100px; height:auto; padding:5px; float:left;" >';
											echo '<input type="checkbox" name="genrechk[]"  value="'.$gid.'" checked/> '.$genreName.'</input>';
											echo '</div>'; 
										}
										else
										{  
											echo '<div style="width:100px; height:auto; padding:5px; float:left;" >';
											echo '<input type="checkbox" name="genrechk[]"  value="'.$gid.'" /> '.$genreName.'</input>';
											echo '</div>';
										}
									}
								 }
							
							?> 
                            <div style="clear:both;"></div>
                    </div>
                  <div class="element">
                                        <label for="description">Description </label>
                      <textarea name="description" class="text err" id="description"><?php echo $description; ?></textarea>
                    </div>
                    <div class="element">
                        <label for="filmreign">Film Reign</label>
    					<select name="filmreign" id="filmreign" class="selectbox"> 
                            <?php
                            
                                $reign_sql = "SELECT * FROM reign  ORDER BY  id ASC ";
                    
                        $reign_result = db::getInstance()->query($reign_sql);
                                    $reign_count =  $reign_result->rowCount();
                                     if($reign_count>0)
                                     {
                                        foreach ($reign_result as $reign)
                                        {
                                        $rid = $reign['id'];
                                        $reignname 	= $reign['reign'];
											if($reignid==$rid)
											{
                                        		echo '<option value="'.$rid.'"  selected="selected">'.$reignname.'</option>';
											}
											else
											{
												echo '<option value="'.$rid.'">'.$reignname.'</option>';
											}
                                        }
                                     }
                                     ?>
                          </select>
                    </div>
                    <div class="element">
                        <label for="releaseDate">Release Date</label>
                      <input name="releaseDate" class="text err" id="releaseDate" value="<?php echo $releaseDate; ?>" />
  					</div>
  					<div class="element">
                        <label for="filmtype">Cam Copy</label>
    					<select name="filmtype" id="filmtype">
                        	<option value="">--Select--</option>
						<?php 
										if($filmtype == 'CamCopy')
										{
											echo "<option style='padding:2px 5px;' value='CamCopy' selected='selected'>Yes</option>";
											echo "<option style='padding:2px 5px;' value='' >No</option>";
										}
										else
										{ 
											echo "<option style='padding:2px 5px;' value='CamCopy' >Yes</option>";
											echo "<option style='padding:2px 5px;' value='' selected='selected'>No</option>";
										} 
                                 ?> 
					    
					      
			          </select>
                    </div>
                    
                    <div class="element">
                        <label for="featured">Show in Home Page</label> 
                        <div style="width:100px; height:auto; padding:5px; float:left;">
						<?php 
										if($featured == '1')
										{
											echo ' <input name="featured" type="checkbox" checked="checked"/> ';
										}
										else
										{ 
											echo ' <input name="featured" type="checkbox" />';
										} 
                                 ?> 
                                 </div>
                                 <div style="clear:both;"></div>
					    
					       
                    </div>
                    
                      <div class="element">
                        <label for="imageUrl">Image URL</label>
                          <input name="imageUrl" class="text err" id="imageUrl" value="<?php echo $imageUrl; ?>" />
  </div>
                  <div class="element">
                    <label for="codebody">Embed code</label>
    <textarea name="codebody" class="text err" id="codebody"><?php echo $codebody; ?></textarea>
                      </div>
                      <div class="element">
                        <label for="downlink">Download link</label>
                          <input name="downlink" class="text err" id="downlink" value="<?php echo $downlink; ?>" />
  </div>
					<div class="entry">
                    <button type="submit" class="add"><?php echo $status;?></button>
                  <input type="hidden" name="action" value="<?php echo $action;?>" />
                  <input type="hidden" name="id" value="<?php echo $id;?>" />
					</div>
				</form>