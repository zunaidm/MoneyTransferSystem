<?php include 'config/Database.php' ?>
<?php
	session_start();
	if($_SESSION['type'] == 'admin'){
		include 'inc/headeradmin.php';
	}
	else if($_SESSION['type'] == 'employee'){
		header("Location: "."dashboard.php");
	}
	else
		{
		  header("Location: "."index.php");
		}
	$db = new Database();
?>

<?php
	if(isset($_GET["id"])){
		$uname = $_GET['id'];
		$query = "DELETE FROM users WHERE username = '$uname' ";
		$db->select($query);
		header('Location: '.'list.php');
	}
?>

	<div class="desh-main-content">
	<br>
			<div class="title">
				User List
			</div>
			<div class="main">
					<div class="transection-table">
							<table>
								  <tr>
								    <th>Name</th>
								    <th>Username</th>
								    <th>Email</th>
								    <th>Gender</th>
								    <th>Role</th>
								    <th>Photo</th>
								    <th>Option</th>
								  </tr>
								  <?php
								  	$query = "SELECT * FROM users";
								  	$users = $db->select($query);
								  	if($users){
								  		while ($result = $users->fetch_assoc()) {
								  			# code...
								  		
								  ?>
								  <tr>
								    <td><?php echo $result['name']; ?></td>
								    <td><?php echo $result['username']; ?></td>
								    <td><?php echo $result['email']; ?></td>
								    <td><?php echo $result['gender']; ?></td>
								    <td><?php echo $result['type']; ?></td>
								    <td><?php echo "<img src=uploads/".$result['img'].'>';?></td>
								    <td>
								    	<a href= <?php echo "list.php?id=".$result['username'];?> > <span class="fa fa-trash-o"></span></a>
								    </td>
								  </tr>
								  <?php } }?>
								 
							</table>
					</div>
			</div>
	</div>

	
</body>
</html>