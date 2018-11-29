<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Admin Panel</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript"></script>
</head>
<body>
	<div class="header">
			<div class="logo">
				<i class="fa fa-tachometer"></i>
				<span>Money Transfer System</span>
				<span> <?php echo "<img src=uploads/".$_SESSION['img'].'>';?> </span>
				<span class="username-on-top"><?php echo $_SESSION['name']; ?></span>
			</div>
	</div>
	<div class="desh-menu"> 
		<ul>
			<li><a href="dashboard.php"><span class="fa  fa-tachometer"></span>Dashboard</a></li>

			<li><a href="user.php"><span class="fa fa-user-circle"></span>User</a>
				<ul>
					<li><a href="user.php"><span class="fa fa-plus"></span>Add</a></li>
					<li><a href="list.php"><span class="fa fa-pencil-square-o"></span>List</a></li>
				</ul>
			</li>
			
			<li><a href=""><span class="fa fa-home"></span>Money</a>
				<ul>
					<li><a href="send.php"><span class="fa fa-plus"></span>Send</a></li>
					<li><a href="receive.php"><span class="fa fa-pencil-square-o"></span>Receive</a></li>
				</ul>
			</li>
			<li><a href="transection.php"><span class="fa fa-area-chart"></span>Transections</a></li>
			<li><a href="logout.php"><span class="fa  fa-sign-out"></span>Log Out</a></li>
		</ul>
	</div>