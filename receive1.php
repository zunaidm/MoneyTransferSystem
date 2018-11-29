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
		
			<div>
			<?php 

				$vcode = $_POST['vcode'];
				// SMS Send API Here 
							
				//Get value From previus form
				$rphone = $_POST['rphone'];
				$amount = $_POST['amount'];
				$pin = $_POST['pin'];
				$type = 'sent';
				$db = new Database();
				
				$query = "SELECT * FROM money WHERE (rphone = '$rphone' AND amount = '$amount' AND pin = '$pin' AND type = '$type')";
				$result = $db->select($query);
				if($result){
					$rows = $result->fetch_assoc();
					$trxid = $rows['trxid'];

					require('textlocal.class.php');
 
					$textlocal = new Textlocal('amarallmail@gmail.com', '3b98c30288b4a1a4a3929');
				 
					$numbers = array($rphone);
					$sender = 'GET MONEY';
					$message = 'Your Withdraw Verification Code : '.$vcode.' .';
				 
					$response = $textlocal->sendSms($numbers, $message, $sender);
					//print_r($response);

			?>
				<div class="reg-container">
					<form action="receive.php" method="POST">
						<br><br><br><br><br><br>

						<div>
						Verification Code Sent !! 
						<?php //echo //$vcode ?>
							<h3>Your Trnx ID: <?php echo $trxid ?></h3>
						</div>
						<div>
							<input type="text" name="invcode" placeholder="Verification Code" required>
						</div>
						<div>
							<input type="hidden" name="sentvcode" value= <?php echo $vcode;?>>
						</div>
						<div>
							<input type="hidden" name="trxid" value= <?php echo $trxid;?>>
						</div>
						<div>
							<input type="hidden" name="rphone1" value= <?php echo $rphone;?>>
						</div>
						<div>
							<input type="hidden" name="amount1" value= <?php echo $amount;?>>
						</div>
						
						<input type="submit" name="submit" value="Withdraw Now" class="btn-login" >
					</form>
				</div>
			</div>   
			
	</div>
			<?php

				}
				else{
					header("Location: "."receive.php?id=already");
				}
	?>
</body>
</html>