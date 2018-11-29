
			<div>
				<div class="reg-container">
					<form method="POST">
						<br><br><br><br><br><br>
						<div>
						Verification Code Sent !! 
							<h3>Your Trnx ID:</h3>
						</div>
						<div>
							<input type="text" name="vcode" placeholder="Verification Code" required>
						</div>
						
						<input type="submit" name="submit" value="Withdraw Now" class="btn-login" >
					</form>
				</div>
			</div>
			<?php
			$vcode = rand(1000,9999);
			if($_SERVER["REQUEST_METHOD"]=="POST"){

				if($_POST[vcode]==$vcode){
					/*$db = new Database();

			    	$query = "INSERT INTO money(sname,sphone,amount,rname,rphone,pin,trxid,byuser,type) VALUES('$sname','$sphone','$amount','$rname','$rphone','$pin','$trxid','$byuser','sent')";
			   		$inserted_rows = $db->insert($query);
			    	if ($inserted_rows) {
			     		echo "<div class='success'>Money Sent Successful.
			         		 </div>";
			    	}else {
			    	 echo "<div class='error'>Transection Not Successful !</div>";
			   		}*/
				}
				else {
			    	 echo "<div class='error'>Check Verification Code!</div>";
			   	}  
		   }
		?>