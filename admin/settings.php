<?php
session_start();
include('limoconfig.php');
if(!isset($_SESSION['userid']) )
{
	header('Location:index.php');
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Paweł 'kilab' Balicki - kilab.pl" />
<title>Settings : Admin - Cpanel</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />

 <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="jscss/tablesorter.css" media="screen" />
        
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<!-- JQuery tablesorter plugin script-->
		<script type="text/javascript" src="jscss/jquery.tablesorter.min.js"  ></script>
        
		<!-- JQuery pager plugin script for tablesorter tables -->
		<script type="text/javascript" src="jscss/jquery.tablesorter.pager.js" ></script>
        
<script type="text/javascript">
$(function(){
	$(".box .h_title").not(this).next("ul").hide("normal");
	$(".box .h_title").not(this).next("#home").show("normal");
	$(".box").children(".h_title").click( function() { $(this).next("ul").slideToggle(); });
});
</script>
<script type="text/javascript">
	$(document).ready(function(){
	function getUrlVars() {
		var vars = {};
		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			vars[key] = value;
		});
		return vars;
	}
	var sleby = getUrlVars()["sleby"]; 
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(1000,0);
		$("#loading").html("<img src='loader.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
   //Default Starting Page Results
	$("#pagination li:first").css({'color' : '#ff6600'}).css({'border' : 'none'});
	Display_Load();
	//$("#datacontent").load("db_sql/genres.php?page=1&sleby="+sleby, Hide_Load());
	$("#Formcontent").load("db_sql/settings.php", Hide_Load());
	//Pagination Click
	$("#pagination li").click(function(){
		Display_Load();
		//CSS Styles
		$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});
		$(this)
		.css({'color' : '#ff6600'})
		.css({'border' : 'none'});
		//Loading Data
		var pageNum = this.id;
		//$("#datacontent").load("db_sql/genres.php?page=" + pageNum+"&sleby="+sleby, Hide_Load());
		$("#Formcontent").load("db_sql/settings.php", Hide_Load());
	});
});
</script>
<script type="text/javascript">
$(function(){
	$("a.add_page").click(function(){
		page=$(this).attr("href")
		$("#Formcontent").html("loading...").load(page);
		return false
	})
})
</script>
</head>
<body>
<div class="wrap">
	<div id="header">
		<div id="top">
			<div class="left">
				<p>Welcome, <strong><?php echo $_SESSION['username'];?></strong> [ <a href="session_destroy.php">logout</a> ]</p>
			</div>
			<div class="right">
				<div class="align-right"> 
				</div>
			</div>
		</div>
		<div id="nav">
			<ul>
				<li class="upp"><a href="home.php">Home</a></li>
				<li class="upp"><a href="#">Manage content</a>
					<ul>
                    	<li>&#8250; <a href="category.php">Category</a></li>
						<li>&#8250; <a href="home.php">Articles</a></li> 
                        <li>&#8250; <a href="users.php">Users</a></li> 
                      <li>&#8250; <a href="settings.php">Settings</a></li>
					</ul>
				</li>
				 
			</ul>
		</div>
	</div>
	
	<div id="content">
		<div id="sidebar">
			<div class="box">
				<div class="h_title">&#8250; Settings</div>
				<ul id="home">
					<li class="b1"><a class="icon films" href="settings.php">Refresh</a></li> 
					<li class="b1"><a class="icon add_page" href="forms/settings.php">Edit</a></li>
				</ul>
			</div>
			 
		</div>
		<div id="main"> 
			<div class="full_w">
				<div class="h_title">Settings</div>
                
				<div class="entry">
                	<div id="Formcontent" style="margin:10px auto">
                    	<div id="loading"></div>
                    </div>
                    <div style="display: none;" class="msg n_ok"> 
                            <p><strong>Deleted</strong></p> 
                        </div>
                	<div id="datacontent"> 
                    
                	</div>
					  
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	<div id="footer">
		<div class="left">
			<p>Admin Panel: <a href="">Colombo Today.com</a></p>
		</div>
		<div class="right">
			<p><a href="">Colombo Today</a></p>
		</div>
	</div>
</div>
<!-- &copy; 2010. Develp by Sampath Sri Anuradha -->
    <a href="http://www.sampathsrianuradha.com" title="&copy; 2010. Develp by Sampath Sri Anuradha" > </a>
</body>
</html>
