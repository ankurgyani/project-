
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TO DO LIST</title>
  
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
  

</head>

<body>
  <span href="#" class="button" id="toggle-login">2DO LIST</span>

<div id="login">
  <div id="triangle"></div>
  <h1>Sign up ,its free!!</h1>
		<form method="post" action="./tasklist_items/index.php">
		        <input type="text" placeholder="First Name" class="style_box" name="firstname"><br>
				<input type="text" placeholder="Last Name" class="style_box" name="lastname"><br>
				<input type="text" placeholder="Contact No" class="style_box" name="contact"><br>
				<input type="text" placeholder="E-mail" class="style_box" name="mailid"><br>
				<input type="text" placeholder="username" class="style_box" name="user"><br>
				<input type="password" placeholder="password" class="style_box" name="password"><br>
				<input type="text" placeholder="birth" class="style_box" name="birth date"><br>
				<input type="text" placeholder="gender" class="style_box" name="gender"><br>
				<input type ="hidden" name="action" value="register">
				<input type="submit" value="Sign-Up">
		</form>
		</div>
  

  
</body>
</html>
