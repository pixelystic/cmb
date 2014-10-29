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
<title>Films : Admin - Cpanel</title>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/navi.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" media="screen" />

 <!-- Table sorter stylesheet -->
        <link rel="stylesheet" type="text/css" href="jscss/tablesorter.css" media="screen" />
        
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>

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
	$("#datacontent").load("db_sql/films.php?page=1&sleby="+sleby, Hide_Load());
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
		$("#datacontent").load("db_sql/films.php?page=" + pageNum+"&sleby="+sleby, Hide_Load());
	});
});
</script>
<script type="text/javascript">
$(function(){
	$("a.add_page").click(function(){
		page=$(this).attr("href")
		$("#Formcontent").html("loading...").load(page);
		return false
	});
});
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
                    	<li>&#8250; <a href="ads.php">Advertisement</a></li>
						<li>&#8250; <a href="genres.php">Genres</a></li>
						<li>&#8250; <a href="home.php">Films</a></li>
						<li>&#8250; <a href="tvshow.php">TV Show</a></li>
                        <li>&#8250; <a href="users.php">Users</a></li>
                        <li>&#8250; <a href="links.php">Video Links</a></li>
                        <li>&#8250; <a href="torrents.php">Torrents Links</a></li>
                        <li>&#8250; <a href="subtitles.php">Subtitles Links</a></li>
                        <li>&#8250; <a href="videolinksites.php">Allowed video link sites</a></li>
                      <li>&#8250; <a href="settings.php">Settings</a></li>
                      <li>&#8250; <a href="articles.php">Articles</a></li>
					</ul>
				</li>
				 
			</ul>
		</div>
	</div>
	
	<div id="content">
		<div id="sidebar">
			<div class="box">
				<div class="h_title">&#8250; Films</div>
				<ul id="home">
					<li class="b1"><a class="icon films" href="">View</a></li> 
					<li class="b1"><a class="icon add_page" href="forms/films.php">Add new</a></li>
				</ul>
			</div>
			
			<div class="box">
				<div class="h_title"><a href="tvshow.php">&#8250; Tv Shows</a></div>
				<ul>
					<li class="b1"><a class="icon tvshow" href="">Tv shows</a></li> 
                    
				</ul>
			</div>
            
            <div class="box">
				<div class="h_title"><a href="upload.php">&#8250; Image Uploads</a></div>
				<ul id="tvshow">
					<li class="b1"><a class="icon image" href="upload.php">View</a></li> 
                    
			  </ul>
			</div>
            <div class="box">
				<div class="h_title"><a href="users.php">&#8250; Users</a></div>
				<ul id="users">
					<li class="b1"><a class="icon users" href="users.php">View</a></li> 
                    
			  </ul>
			</div> 
            <div class="box">
				<div class="h_title"><a href="links.php">&#8250; Video Links</a></div>
				<ul id="links">
					<li class="b1"><a class="icon " href="links.php">View</a></li> 
                    
			  </ul>
			</div>
		</div>
		<div id="main"> 
			<div class="full_w">
            
				<div class="h_title">Films</div> 
				<div class="entry">
                	<div id="Formcontent" style="margin:10px auto">
                    	<div id="loading"></div>
                    </div>
                    <div style="display: none;" class="msg n_ok"> 
                            <p><strong>Deleted</strong></p> 
                    </div>
                    <div id="datacontent">
					 
                    </div>
					<div class="sep"></div>		
					<a class="button add_page" href="forms/films.php">Add new</a> 
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>

	<div id="footer">
		<div class="left">
			<p>Admin Panel: <a href="">Lakfilms.com</a></p>
		</div>
		<div class="right">
			<p><a href="">Lakfilms.com</a></p>
		</div>
	</div>
</div>
<!-- &copy; 2010. Develp by Sampath Sri Anuradha -->
    <a href="http://www.sampathsrianuradha.com" title="&copy; 2010. Develp by Sampath Sri Anuradha" > </a>
</body>
</html>
