
<html >
<head>
<meta charset="UTF-8">
  <title>TO DO LIST</title>
  <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>
  <span href="#" class="button" id="toggle-login">TO-DO-LIST</span>

<div id="login">
  <div id="triangle"></div>
  <h1>Log in</h1>
	<form method="post" action="./tasklist_items/index.php">
        <input type="email" class="style_box" placeholder="E-mail" name="email"><br>
	<input type="password" class="style_box" placeholder="password" name="password"><br>
	<input type ="hidden" name="action" value="test_user">
        <input type="submit" value="Login" name="submit">
	</form>
	<form method="post" action="register.php">
	<input type="submit" value="Sign-Up" name="submit">
	</form>
</div>
</body>
</html>
