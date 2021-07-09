<?php
require_once('Config.php');
if(!empty($_POST))
{
	
	$sql = mysqli_query($al, "INSERT INTO users(name,email,phone,city,state,signupfor,fileToUpload,password) VALUES('".mysqli_real_escape_string($al,$_POST['name'])."',
	'".mysqli_real_escape_string($al,$_POST['email'])."','".mysqli_real_escape_string($al,$_POST['phone'])."','".mysqli_real_escape_string($al,$_POST['city'])."','".mysqli_real_escape_string($al,$_POST['state'])."','".mysqli_real_escape_string($al,$_POST['name'])."','".mysqli_real_escape_string($al,$_POST['fileToUpload'])."','".mysqli_real_escape_string($al,sha1($_POST['pass']))."')");
	if($sql)
	{
		$msg = "Successfully Registered... you can login now";
	}
	else
	{
		$msg = "Error in Registration";
	}
}
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Registration</title>
</head>

<style>
body{
	background-color: silver;
}
.form-structor {
	background-color: yellowgreen;
	border-radius: 15px;
	height: 600px;
	width: 400px;
	position: relative;
	overflow: hidden;
}
.signup {
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		width: 65%;
		z-index: 5;
		-webkit-transition: all .3s ease;}

	
</style>
<body>
<div align="center">
<br>
<br>
<h1>Registration Form</h1>
<br>
<h3><?php if(isset($msg)) { echo $msg.mysqli_error($al); }?></h3>

<br>
<div class="form-structor">
<div class="signup">
<h2 class="form-title" id="signup"><span>Sign up</h2>
<br>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="form-holder">
<input type="text" name="name" size="25" required title="Please Enter Name" placeholder="Your full name" />
<br>
<br>
<input type="email" name="email" size="25" required title="Enter Email" placeholder="Email id " />
<br>
<br>
<input type="text" name="phone" size="25" required title="Enter Phone no." placeholder="Phone No."/>
<br>
<br>
<input type="text" name="city" size="25" required title="Enter City Name" placeholder="City"/>
<br>
<br>
<input type="text" name="state" size="25" required title="Enter State Name" placeholder="State"/>
<br>
<br>
<input type="text" name="signupfor" size="25" required title="sign up for" placeholder="Signing up for?"/>
<br><br>
<label for="fileToUpload">Upload your Profile picture </label>
<input type="file" name="fileToUpload" id="fileToUpload">
<br><br>
<input type="password" name="pass" size="25" required title="Set password" placeholder="Set password"/>
</div>
<br>
<input class="btn btn-primary" type="submit" value="Register" />
</form>
</div>
</div>

<br>
<h2>Already a user? <a href="login.php">Login</a></h2>
</div>
</body>
</html>
