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
							<th width="10%" >Name</th>
							<th width="28%" >Email</th>
							<th width="10%">Gender</th>
							<th width="12%"  >Country</th>
							<th width="10%" >Status</th>
							<th width="6%" >Lastloginon</th>
							<th width="7%" >Confirm</th>
							<th width="10%" >Modify</th>
						</tr>
					</thead>
						
					<tbody>
                    <?php 
	$view_sql = "SELECT a.*,c.countryName FROM admin as a left join countries as c on c.idCountry=a.country where type='User' ORDER BY lastloginon   DESC    ";
	 
	$view_result = db::getInstance()->query($view_sql);
				$view_count =  $view_result->rowCount();
				 if($view_count>0)
				 {
					foreach ($view_result as $view)
					{
					$id = $view['id'];
					$name 	= $view['name'];	
					$email 	= $view['email']; 
					$gender 	= $view['gender']; 
					$country 	= $view['countryName']; 
					$status 	= $view['active'];
					$lastloginon 	= $view['lastloginon'];
					$confirmemail 	= $view['confirmemail'];
					$confirm="";
					if($confirmemail=='YES')
					{
						$confirm="YES";
					}
					else
					{
						$confirm="NO";
					}
					
					
					if($status!='Enable')
					{
						$icon_status="tick-circle.gif";
						$icon_alt="Click to Enable";
						$status_v="Enable";
					}
					else if($status=='Enable')
					{
						
						$icon_alt="Click to Disable";
						$status_v="Disable";
					}
					?>
							
						<tr>
							<td class="align-center"><?php echo $id; ?></td>
							<td class="align-center"><?php echo $name; ?></td>
							<td><?php echo $email; ?></td>
							<td><?php echo $gender; ?></td>
							<td><?php echo $country;  ?> </td>
							<td><a href="db_sql/users_db.php?id=<?php echo $id; ?>&val=<?php echo $status_v; ?>&action=publish" class="table-icon publish <?php echo $status;?>"  title="<?php echo $icon_alt;?>" ><?php echo $status;  ?></a> </td>
							<td><?php echo $lastloginon;  ?></td>
							<td><?php echo $confirm;  ?></td>
							<td>
								
                                <a href="forms/users.php?id=<?php echo $id; ?>&action=update" class="table-icon edit" title="Edit"></a> 
								<a href="db_sql/users_db.php?id=<?php echo $id; ?>&action=delete"   class="table-icon delete" title="Delete"></a>
							</td>
						</tr>
					<?php } 
				 }
					else
					{
						?>
						<tr>
							<td colspan="9" class="align-center"><div align="center">Not found</div></td>
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
						$("#datacontent").load("db_sql/users.php?page=1");
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