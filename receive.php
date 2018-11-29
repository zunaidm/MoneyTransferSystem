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
			Receive Money
		</div>

		<?php
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				$invcode = $_POST['invcode'];
				$sentvcode = $_POST['sentvcode'];
				$trxid = $_POST['trxid'];
				$receivedby = $_SESSION['username'];
				$rphone1 = $_POST['rphone1'];
				$amount1 = $_POST['amount1'];

				$db = new Database();

					$receivedby = $_SESSION['username'];
					if($invcode == $sentvcode ){
						$upquery = "UPDATE money SET type = 'received' , receivedby = '$receivedby' WHERE  trxid = '$trxid' ";
						$upresult = $db->insert($upquery);
						if($upresult){
							echo "<div class='success'>Withdraw Successful !</div>";
//SMS
							require('textlocal.class.php');
							$textlocal = new Textlocal('amarallmail@gmail.com', '3b98c30288b4a9bbfc067a1a4a3929');
						 
							$numbers = array($rphone1);
							$sender = 'GET MONEY';
							$message = 'Withdrawn '.$amount1.' TK Successful .';
						 
							$response = $textlocal->sendSms($numbers, $message, $sender);
							//print_r($response);
							
//END SMS
						}
						else{
							echo "<div class='error'>Withdraw Not Successful !</div>";
						}

					}
					else
						echo "<div class='error'>Verification Not Successful !</div>";
			}
		?>

<script type="text/javascript">
	function rcvphncheck(){
		var rphone = receive.rphone.value ;
		var prtn = /^\+880[0-9]{10}/;
		var testrphone = prtn.test(rphone);

		if(!testrphone){
			document.getElementById("rphneror").innerHTML = "Please give a valid Sender Phone With +88 !!";
			return false;
		}
		document.getElementById("rphneror").innerHTML ="";
		return true;

	}
</script>

		<div>
				<div class="reg-container">
					<form name="receive" action="receive1.php" method="POST">
						<br><br><br><br><br><br>
						<div>
							<input type="text" name="rphone" placeholder="Receiver Phone Number" required onblur="rcvphncheck();">
						</div>
						<span id="rphneror" style="color:red"></span>
						<div>
							<input type="text" name="amount" placeholder="Amount" required>
						</div>
						<div>
							<input type="text" name="pin" placeholder="Withdraw Pin" required>
						</div>
						<div>
							<input type="hidden" name="vcode" value= <?php echo rand(1000,9999);?>>
						</div>
						<input type="submit" name="submit" value="Verify" class="btn-login" onclick="return rcvphncheck();">
					</form>
				</div>
			</div>
	</div>
	
</body>
</html>