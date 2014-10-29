<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<title>Admin : Cpanel</title>
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />
</head>
<body>
<div class="wrap">
	<div id="content">
		<div id="main">
			<div class="full_w">
				<form action="sessionlog.php" method="post">
					<label for="username">Username:</label>
				  <input id="username" name="username" class="text" />
			    <label for="pass">Password:</label>
					<input id="pass" name="pass" type="password" class="text" />
					<div class="sep">
                    <?php 
                        	if(isset($_GET['m']))
                            {
                             if($_GET['m']=='iup')
                             {
                             	echo "<div class='n_error'><p>Username or password invalid, re try </p></div>";
                             }
                            }
                        ?></div> <button type="submit" class="ok">Login</button>
				</form>
			</div>
			<div class="footer">&raquo; <a href="">http://www.colombotoday.com</a> | Admin Panel</div>
		</div>
	</div>
</div>
<!-- &copy; 2010. Develp by Sampath Sri Anuradha -->
    <a href="http://www.sampathsrianuradha.com" title="&copy; 2010. Develp by Sampath Sri Anuradha" > </a>
</body>
</html>
