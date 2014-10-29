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
                    <?php 
	$settings_sql = "SELECT * from settings ";
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
				$downlink_active 	= $settings['downlink_active'];
				
			 }
					   
}
				?> 
<form name="frm" id="frm"  >
                	<div class="element">
						<label for="email">Contact Email</label><br /><?php echo $email; ?> 
					</div> 
                    <div class="element">
						<label for="downloadlink">Download Link</label>
					<br /><?php echo $downloadlink; ?>
			 
					</div> 
                    <div class="element">
						<label for="noofcamfilms">Download Link Status</label><br />
						<?php if($downlink_active==0)
							{
								echo "<span  style='color:#900;'>Download Link Reported as error</span>";
							}
							else
							{
								echo "<span  style='color:#060;'>Download Link Updated</span>";
							}
							?>
						
					</div> 
                    <div class="element">
						<label for="noofcamfilms">No of cam quality films show in home page</label><br /><?php echo $noofcamfilms; ?>
						
					</div>
                    <div class="element">
						<label for="nooffilms">No of films show in home page</label><br /><?php echo $nooffilms; ?> 
					</div>
                    <div class="element">
						<label for="nooftvshow">No of tvshows show in home page</label><br /><?php echo $nooftvshow; ?> 
					</div> 
                    <div class="element">
						<label for="noofitems">No of items per page</label><br /><?php echo $noofitems; ?> 
					</div> 
                 
            </form>