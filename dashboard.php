<?php include 'config/Database.php' ?>
<?php
	session_start();
	if($_SESSION['type'] == 'admin'){
		include 'inc/headeradmin.php';
	}
	else if($_SESSION['type'] == 'employee'){
		include 'inc/headeremployee.php';
	}
	else
		{
		  header("Location: "."index.php");
		}
?>

	<div class="desh-main-content">
		<br>
			<div class="title">
				Deshboard
			</div>
			
			<div class="main">
				<?php 
				if($_SESSION['type'] == 'admin') {
					$db = new Database();
					$query = "SELECT SUM(amount) AS sentamount FROM money WHERE type = 'sent'";
					$amount = $db->select($query);
					$sentamount = $amount->fetch_assoc();

					$query1 = "SELECT SUM(amount) AS receivedamount FROM money WHERE type = 'received'";
					$amount1 = $db->select($query1);
					$receivedamount = $amount1->fetch_assoc();

			echo '<div class="widget">
					<div class="title">Balance</div>
					<div class="chart"> '.($sentamount['sentamount']-$receivedamount['receivedamount']).' TK</div>
				</div>
				<div class="widget">
					<div class="title">Send Money</div>
					<div class="chart"> '.$sentamount['sentamount'].' TK</div>
				</div>
				<div class="widget">
					<div class="title">Receive Money</div>
					<div class="chart">'.$receivedamount['receivedamount'].' TK</div>
				</div>'
				;
				/*
				<div class="widget">
					<div class="title">Profit</div>
					<div class="chart"></div>
				</div>
				*/
				 } ?>
				<div class="user-widget">
					<div class="title">Welcome</div>
					<div class="chart">
						<h3>Name : <?php echo $_SESSION['name']; ?><h3>
						<h3>Email : <?php echo $_SESSION['email']; ?><h3>
						<h3>Username : <?php echo $_SESSION['username']; ?><h3>
						<h3>Type : <?php echo $_SESSION['type']; ?><h3>
					</div>
				</div>
				
			</div>
		</div>
	
</body>
</html>