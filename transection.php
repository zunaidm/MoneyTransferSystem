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

<?php
	if(isset($_GET["id"])){
		$trxid = $_GET['id'];
		$db = new Database();
		$query = "DELETE FROM money WHERE trxid = '$trxid' ";
		$db->select($query);
		header('Location: '.'transection.php');
	}
?>
	<div class="desh-main-content">
	<br>
		<div class="title">
			Transection Histrory 
		</div>
		<div class="transection-top">
			<form>
			<!– <div class="search-box"> 
			<!–	<input type="text" name="search" placeholder="Search">
			<!–	<input type="submit" name="submit-search" value="Search" class="btn-search">
			<!–</div>
			
			</form>
		</div> 
			<div class="main">
					<div class="transection-table">
							<table>
								  <tr>
								    <th>Sender Mobile</th>
								    <th>Receiver Mobile</th>
								    <th>Amount</th>
								    <th>Trx ID</th>
								    <th>Type</th>
								    <th>Sent By</th>
								    <th>Received By</th>
								    <?php if($_SESSION['type'] == 'admin'){?>
								    <th>Option</th>
								    <?php }?>
								  </tr>
								  <?php
								  	$db = new Database();
								  	$user = $_SESSION['username'];
								  	if($_SESSION['type'] == 'admin'){
								  		$query = "SELECT * FROM money";
								  	}
								  	else{
								  		$query = "SELECT * FROM money WHERE sentby = '$user' OR receivedby = '$user'";
								  	}
								  	$users = $db->select($query);
								  	if($users){
								  		while ($result = $users->fetch_assoc()) {
								  			# code...
								  		
								  ?>
								  <tr>
								    <td><?php echo $result['sphone']; ?></td>
								    <td><?php echo $result['rphone']; ?></td>
								    <td><?php echo $result['amount']; ?></td>
								    <td><?php echo $result['trxid']; ?></td>
								    <td><?php echo $result['type']; ?></td>
								    <td><?php echo $result['sentby']; ?></td>
								    <td><?php echo $result['receivedby']; ?></td>
								    <?php if($_SESSION['type'] == 'admin'){?>
								    <td>
								    	<a href= <?php echo "transection.php?id=".$result['trxid'];?> > <span class="fa fa-trash-o"></span></a>
								    </td>
								    <?php }?>
								  </tr>
								  <?php } }?>
							</table>
					</div>
			</div>
	</div>
	
</body>
</html>