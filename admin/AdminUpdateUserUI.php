<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title>Update User</title>
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
							Update Account
						</div>
					</div>
		
					<form action='' method='post'>
						<div class = "FormHolder">
							<div class = "FormFieldHolder">
								<div class ="FieldHeader" style="font-size: 35px;">Enter ID to be updated</div>
								<input type ="text" name ="id" class = "InputFields" method="post">
								<div class ="FieldHeader"  style="font-size: 35px; margin-bottom: 10px;">
									Update Details
								</div>
								<div class = "FieldHeader">Password</div>
								<input type ="password" name ="password" class = "InputFields" method="post">

								<div class = "FieldHeader">Account Type</div>
								<select name=accounttype class="InputFields" method="post">
									<option value=''>Role</option>
									<option value="author">Author</option>
									<option value="reviewer">Reviewer</option>
									<option value="conference_chair">Conference Chair</option>
									<option value="admin">Admin</option>
								</select>

								<button type="submit" class = "LoginButton" name="update">Update</button>
								<?php 
								
									include 'AdminUpdateUserCtr.php'; 

									if(isset($_POST['update']))
									{
										$uid = $_POST["id"];
										$pwd = $_POST["password"];
										$role = $_POST["accounttype"];

										$admin = new AdminUpdateUserCtr();

										$output = $admin->validateUpdate($uid, $pwd, $role);

										echo $output;
									}
								?>
							</div>
						</div>
					</form>

				</div>
				

			</div>

		</div>
	</div>



	
</body>
</html> 