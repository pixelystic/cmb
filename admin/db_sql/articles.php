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
  <form action="">
<table id="myTable" class="tablesorter">
					<thead>
						<tr>
							<th width="7%" >ID</th>
							<th width="34%" >Title</th> 
							<th width="10%">Add date time</th>
							<th width="13%" >News paper name</th> 
							<th width="10%" >Status</th>
							<th width="10%" >Modify</th>
						</tr>
					</thead>
						
					<tbody>
                    <?php 
	$articles_sql = "SELECT n.*,np.*,c.* FROM news as n 
	left join news_papers as np on np.news_paper_id=n.news_paper_id
	left join categories as c on c.category_id=n.category_id
	 ORDER BY n.publish_date DESC    ";
	 //echo $articles_sql;
	$articles_result = db::getInstance()->query($articles_sql);
				$articles_count =  $articles_result->rowCount();
				 if($articles_count>0)
				 {
					foreach ($articles_result as $articles)
					{
					$id = $articles['news_id'];
					$title 	= $articles['title'];	
					//$slug 	= $articles['slug']; 
					$content 	= $articles['content']; 
					$image 	= $articles['image']; 
					$source 	= $articles['source']; 
					$publish_date 	= $articles['publish_date']; 
					$visibility_status 	= $articles['visibility_status'];
					$category_id 	= $articles['category_id'];
					$news_paper_name 	= $articles['news_paper_name'];
					
					if($visibility_status!='1')
					{
						$icon_status="tick-circle.gif";
						$icon_alt="Click to Publish";
						$status_v="Active";
					}
					else if($visibility_status=='1')
					{
						$visibility_status="notification-slash.gif"; 
						$icon_alt="Click to Unpublish";
						$status_v="Inactive";
					}
					?>
							
						<tr>
							<td class="align-center"><?php echo $id; ?></td>
							<td><?php echo $title; ?></td>
							<td><?php echo $publish_date; ?></td> 
							<td><?php echo $news_paper_name;  ?></td>
							<td><a href="db_sql/articles_db.php?id=<?php echo $id; ?>&val=<?php echo $status_v; ?>&action=publish" class="table-icon publish <?php echo $status;?>"  title="<?php echo $icon_alt;?>" ><?php echo $status;  ?></a> </td>
							<td>
								
                                <a href="forms/articles.php?id=<?php echo $id; ?>&action=update" class="table-icon edit" title="Edit"></a> 
								<a href="db_sql/articles_db.php?id=<?php echo $id; ?>&action=delete"   class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
					<?php } 
				 }
					else
					{
						?>
						<tr>
							<td colspan="8" class="align-center"><div align="center">Not found</div></td>
						</tr>
                        <?php } ?>
					</tbody>
				</table>
                 </form>
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
	});
	$("a.publish").click(function(){
		el=$(this); 
		if(confirm("Do you want to make this change?"))
		{
			$.ajax({
				url:$(this).attr("href"),
				type:"GET",
				success:function(result)
				{ 
					if(result==1)
					{
						$('.msg p strong').replaceWith("<strong>Data has been updated successfully</strong>"); 
						$('.msg').slideDown('slow').delay(2000).slideUp('slow');
						$("#datacontent").load("db_sql/articles.php?page=1");
					}
					else
					{
						alert(result);
					}
				}
			})
		}
		return false;
	});
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
	});
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
						7: { 
							// disable it by setting the property sorter to false 
							sorter: false 
						} 
					}
				}) 
			.tablesorterPager({container: $("#pager")}); 
		}); 
		</script>