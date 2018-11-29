<?php include 'config/Database.php' ?>
<?php
	if(isset($_GET["username"])){
		$db = new Database();
		$query = "SELECT * FROM users WHERE username = '$_GET[username]' AND password = '$_GET[password]'";
		$result = $db->select($query);
		if($result){
			session_start();
			$rows = $result->fetch_assoc();
			$_SESSION['username'] = $rows['username'];
			$_SESSION['name'] = $rows['name'];
			$_SESSION['email'] = $rows['email'];
			$_SESSION['type'] = $rows['type'];
			$_SESSION['img'] = $rows['img'];
			
			header('Location: '.'dashboard.php');
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Your Website</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript"></script>
</head>
<body id="login">
	<div class="login-container">
		<img src="css/img/login.png">
		<form action="index.php" method="get">
			<div class="login-input">
				<input type="text" name="username" placeholder="Enter Username">
			</div>
			<div class="login-input">
				<input type="password" name="password" placeholder="Enter Password">
			</div>
			<input type="submit" name="submit" value="LOGIN" class="btn-login">
		</form>
	</div>
</body>
</html>