<?php
session_start();
error_reporting(0);
	include('../limoconfig.php'); 
if(!isset($_SESSION['userid']) )
{
	header('Location:index.php');
}
else
{
	
	?>
<table style="width:95%"   id="myTable" class="tablesorter">
					<thead>
						<tr>
							<th width="35" scope="col">ID</th>
							<th scope="col">Genre</th>
							<th width="45" style="width: 65px;" scope="col">Modify</th>
						</tr>
					</thead>
						
					<tbody>
                    <?php 
	$genre_sql = "SELECT * FROM genre   ORDER BY genreName ASC   ";

	$genre_result = db::getInstance()->query($genre_sql);
				$genre_count =  $genre_result->rowCount();
				 if($genre_count>0)
				 {
					foreach ($genre_result as $genre)
					{
					$id = $genre['id'];
					$genreName 	= $genre['genreName'];	 
					
					?>
							
						<tr>
							<td class="align-center"><?php echo $id; ?></td>
							<td><?php echo $genreName; ?></td>
							<td>
								<a href="forms/genres.php?id=<?php echo $id; ?>&action=update" class="table-icon edit" title="Edit"></a>
								<a href="db_sql/genres_db.php?id=<?php echo $id; ?>&action=delete" class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
					<?php } 
				 }
					else
					{
						?>
						<tr>
							<td colspan="3" class="align-center"><div align="center">Not found</div></td>
						</tr>
                        <?php } ?>
					</tbody>
				</table>
                <?php
}
				?> 
                <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="jscss/arrow-stop-180.gif"   alt="first"/>
                                <img class="prev" src="jscss/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="jscss/arrow.gif"  alt="next"/>
                                <img class="last" src="jscss/arrow-stop.gif" alt="last"/> 
                                <select class="pagesize input-short align-center">
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                </div>
                            </form>
                        </div>
                
<script type="text/javascript">
$(function(){
	$("a.edit").click(function(){
		page=$(this).attr("href");
		$("#Formcontent").html("loading...").load(page);
		return false;
	})
	$("a.delete").click(function(){
		el=$(this); 
		if(confirm("Do you want to delete this ?"))
		{
			$.ajax({
				url:$(this).attr("href"),
				type:"GET",
				success:function(result)
				{
					if(result==1)
					{
						$(".msg p strong").replaceWith("<strong>Deleted</strong>"); 
						$('.msg').slideDown('slow').delay(2000).slideUp('slow');
						el.parent().parent().fadeOut('slow');
					}
					else
					{
						alert(result);
					}
				}
			})
		}
		return false;
	})
})
</script>
<!-- Initiate tablesorter script -->
        <script type="text/javascript">
			$(document).ready(function() { 
				$("#myTable") 
				.tablesorter({
					// zebra coloring
					widgets: ['zebra'],
					// pass the headers argument and assing a object 
					headers: { 
						// assign the sixth column (we start counting zero) 
						3: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>