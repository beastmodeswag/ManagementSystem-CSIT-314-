<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title>Admin User</title>
	<link type="text/css" rel="stylesheet" href="./css/index.css">
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="https://kit.fontawesome.com/5390fcdc06.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/js/index.js"></script>

</head>
<body>
	<!---- Create database and tables required for the program (if not created already)---->
	<?php
		include_once("create.php");
		//include_once("insert_testDataScript.php");
	?>

	<div class = "contentHolder">
		<!--Logo header-->
		<div class = "LogoHeader">
			C A F É
		</div>
		<!--Subtext-->
		<div class = "SubHeader">
			The Café
		</div>

		<!--Who is logging in to this shit-->
		<div class = "LoginTitle">
			Login Page
		</div>

		<form class = "FormDesign" action="" method = "post">
			<div class = "InputHolder">
				<input type ="text" name ="id" placeholder= "Username" class = "UsernameField"method="post">
				<input type ="password" name ="pwd" placeholder= "Password" class = "PasswordField" method="post">
				<button type="submit" class = "LoginButton" name="submit">Login</button>
			</div>
		</form>
	</div>

	<?php

		//on button press
		if(isset($_POST['submit']))
		{
			$uid = $_POST['id'];
			$pwd = $_POST['pwd'];

			include "user.classes.php";
			include "loginCtr.classes.php";
			

			$login = new LoginCtr($uid, $pwd);

			$login->loginUser();
		}

	?>


</body>
</html> 