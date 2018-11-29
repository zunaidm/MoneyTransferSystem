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
<script src="js/javascript.js"></script> 

	<div class="desh-main-content">
	<br>
		<div class="title">
			Send Money
		</div>
		<div>
				<div class="reg-container">
					<form name="send" method="post">
					    <br>
						<span>Sender:</span>
						<div>
							<input type="text" name="sname" placeholder="Sender Full Name" required  >
						</div>
						<div>
							<input type="text" name="sphone" placeholder="Sender Phone" required onmouseout="checkphn();">
						</div>
						<span id="sphneror" style="color:red"></span>
						<div>
							<input type="text" name="amount" placeholder="Send Amount" required>
						</div>
						<br>
						<span>Receiver:</span>
						<div>
							<input type="text" name="rname" placeholder="Receiver Full Name" required>
						</div>
						<div>
							<input type="text" name="rphone" placeholder="Receiver Phone" required " onmouseout="checkphn();">
						</div>
						<span id="rphneror" style="color:red"></span>
						<br>
						<input type="submit" name="submit" value="SUBMIT" class="btn-login" onclick="return checkphn();">
					</form>
				</div>
			</div>
	</div>
	
	<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){

	    $sname = $_POST['sname'];
	    $sphone = $_POST['sphone'];
	    $amount = $_POST['amount'];
	    $rname = $_POST['rname'];
	    $rphone = $_POST['rphone'];
	    $pin = rand(1000,9999);
	    $trxid = 'TRX'.rand(1000,9999).rand(1000,9999);
	    $sentby = $_SESSION['username'];

	    $db = new Database();

    $query = "INSERT INTO money(sname,sphone,amount,rname,rphone,pin,trxid,sentby,type) VALUES('$sname','$sphone','$amount','$rname','$rphone','$pin','$trxid','$sentby','sent')";
   		$inserted_rows = $db->insert($query);

    	if ($inserted_rows) {
     		echo "<div class='success'>Money Sent Successful.
         		 </div>";
            // SMS Sending 
         		 	require('textlocal.class.php');
 
					$textlocal = new Textlocal('amarallmail@gmail.com', '3fc067a1a4a3929');
				 
					$numbers = array($rphone);
					$sender = 'GET MONEY';
					$message = 'You Have Received '.$amount. ' TK from '.$sphone.' , Your Pin: '.$pin.' And Trx ID: '.$trxid.' .';
				 
					$response = $textlocal->sendSms($numbers, $message, $sender);
					//print_r($response);
					$numbers = array($sphone);
					$sender = 'GET MONEY';
					$message = 'Sent Money ' .$amount.' TK to '.$rphone.' Successful. TrxID:'.$trxid. '.';
				 
					$response = $textlocal->sendSms($numbers, $message, $sender);

    	}else {
    	 echo "<div class='error'>Transection Not Successful !</div>";
   		}
   }
?>


</body>
</html>