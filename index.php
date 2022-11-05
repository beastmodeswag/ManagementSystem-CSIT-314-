<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="./CSS.css">  
</head>

<body>
    <!---- Create database and tables required for the program (if not created already)---->
	<?php
		include_once("create.php");
		//include_once("insert_testDataScript.php");
	?>
	<main id="main-holder">
	<h1>Conference Management System </h1>
	<form id="login-form" method="post">
    <table>
	
        <tr>
			<td>
			<!--
			Login As:
			<select name="sl" id = "sl">
				<option value="none">None</option>
				<option value="author">System Admin</option>
				<option value="reviewer">Conference Chair</option>
				<option value="system_administrator">Reviewer</option>
				<option value="conference_chair">Author</option>
			</select>
			-->
					
			<td><label> Username: </label>
            <td><input type ="text" name ="id" placeholder= "Username" class = "login-form-field" method="post" required></td>
        </tr>
         <tr>
			<td></td>
            <td><label> Password: </label></td>
            <!--- <td><input type="password" name="pwd" id="password-field" class="login-form-field" placeholder="Password" disabled></td> --->
            <td><input type ="password" name ="pwd" placeholder= "Password" class = "login-form-field" method="post" required></td> 
        </tr>
        <tr>
			<td></td><td></td>
            <td><button type="submit" name="submit"> Log in</button></td>
        </tr>
	</form>
   </table>
   <div id="login-error-msg-holder">
      <p id="login-error-msg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
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

 