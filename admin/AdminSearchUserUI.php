<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title>Delete User</title>
	<link type="text/css" rel="stylesheet" href="./css/index.css">
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="https://kit.fontawesome.com/5390fcdc06.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/js/index.js"></script>

</head>
<body>
	<?php
			session_start();
			$user_id = $_SESSION["log_id"] ?? '';

	?>



	<div class = "contentHolder">
		<!--Logo header-->
		<div class = "Content">
			<div class = "HeaderBar">
				<div class = "HeaderText">
					Café
				</div>
			</div>

			<!--Hold all the content-->
			<div class = "DashBoard">
				<!--Holds all the function buttons-->
				<div class = "FunctionBar">
					<div class = "FunctionButton">
						<a href="adminDashboard.php" class = "FunctionName">View Accounts</a>
				</div>

				<div class = "FunctionButton">
					<a href="AdminCreateUserUI.php" class = "FunctionName">Create Accounts</a>
				</div>

				<div class = "FunctionButton">
					<a href="AdminUpdateUserUI.php" class = "FunctionName">Update Accounts</a>
				</div>

				<div class = "FunctionButton">
					<a href="AdminDeleteUserUI.php" class = "FunctionName">Delete Accounts</a>
				</div>
				
				<div class = "FunctionButton">
					<a href="AdminSearchUserUI.php" class = "FunctionName">Search Accounts</a>
				</div>
				<div class = "FunctionButton">
					<a href="" class = "FunctionName">View Profiles</a>
				</div>
				<div class = "FunctionButton">
					<a href="" class = "FunctionName">Create Profile</a>
				</div>
				<div class = "FunctionButton">
					<a href="" class = "FunctionName">Update Profile</a>
				</div>


					<div class = "FunctionButton">
						<a href="Logout.php" class = "FunctionName">Logout</a>
					</div>
				</div>

				<div class = "ViewingDashboard">
					<div class ="DashboardHeader">
						<div class = "DashboardHeaderText">
							Search Account
						</div>
					</div>
		
					<form action='' method='post'>
						<div class = "FormHolder">
							<div class = "FormFieldHolder">
								
								<div class ="FieldHeader" style="font-size: 35px;">Search details of the following ID</div>
								<input type ="text" name ="id" placeholder="ID" class = "InputFields" method="post">

								<button type="submit" class = "LoginButton" name="search">Search</button>
							</div>
							<?php 
								include 'AdminSearchUserCtr.php'; 

								
								if(isset($_POST['search']))
								{  
									
									$uid = $_POST["id"];

									if($uid != null)
									{
										$admin = new AdminSearchUserCtr();

										$output = $admin->validateSearch($uid);

										echo $output;
									}
								}
							?>
						</div>
					</form>

				</div>
				
			</div>

		</div>
	</div>



	
</body>
</html> 