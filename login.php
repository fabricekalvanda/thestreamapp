
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Login form</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
	
<style type="text/css">
	*{
		margin-top: 25px;
	}
	#text{
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}
	
	#button{
		padding: 10px;
		width: 100px;
		color: white;
		background-color: dodgerblue;
		border: none;
	}
	
	#box{
		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
</style>
	
</head>

<body>

<div id="box">
	<form method="post" action="authenticate.php" autocomplete="off">
		<div style="font-size: 20px; margin: 10px; color: aqua;">Login</div>
		<input style="margin-bottom: 10px;" id="text" type="text" name="username"><label style="color: white;">Username</label><br><br>
		<input style="margin-bottom: 10px;"  id="text" type="password" name="password"><label style="color: white;">Password</label><br><br>
			
		<input id="button" type="submit" value="Login"><br><br>
			
		<a style="color: yellow;" href="register.html">Click to Signup</a><br><br>
	</form>
</div>


</body>
<!--<script src="script.js"></script>-->
</html>
