<?php
require_once('Config.php');

if(isset($_SESSION['email']))
{
	header("location:home.php");
}
if(!empty($_POST))
{
	$sql = mysqli_query($al, "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($al, $_POST['email'])."' AND password = '".mysqli_real_escape_string($al,sha1($_POST['pass']))."'");
	if(mysqli_num_rows($sql) == 1)
	{
		$_SESSION['email'] = $_POST['email'];
		header("location:home.php");
	}
	else
	{
		$msg = "Incorrect Credentials";
	}
}
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<meta charset="utf-8">
<title>User Login</title>
</head>

<body>
<div align="center">
<br>
<br>
<h1>User Login</h1>

<h3><?php if(isset($msg)) { echo $msg; }?></h3>
<br>
<div class="form-structor">
<div class="signup">
<h2 class="form-title" id="signup"><span>Your credentials</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<br>
<input type="email" name="email" size="25" required title="Enter Email" placeholder="Enter Email" />
<br>
<br>

<input type="password" name="pass" size="25" required title="Enter Password" placeholder="Enter Password"/>
<br>
<br>
<input class="btn btn-" type="submit" value="Login" />
</form>
</div>
</div>
<br>
<br>
<h4>New User..? <a href="register.php">Register Here</a></h4>
</body>
</html>
