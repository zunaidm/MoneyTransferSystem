function chkpass(){
		var email = user.email.value ;
		var prtn = /[\.a-zA-Z0-9_-]+\@[a-zA-Z09_-]+(\.[a-zA-Z09_]+)+/;
		var testemail = prtn.test(email);
		if(!testemail){
			document.getElementById("emleror").innerHTML = "Please give a valid email !! ";
			return false;
		}

		if(user.password.value != user.confirmpassword.value){
			//alert("Please Confirmation does not match.")
			document.getElementById("passeror").innerHTML = "Confirmation Password does not match !! ";
			return false;
		}
		document.getElementById("passeror").innerHTML = "";
		document.getElementById("emleror").innerHTML = "";
		return true;
}

	function checkphn(){
		var sphone = send.sphone.value ;
		var rphone = send.rphone.value ;

		var prtn = /^\+880[0-9]{10}/;
		var testsphone = prtn.test(sphone);
		var testrphone = prtn.test(rphone);

		if (!testsphone && sphone.length > 0 ) {
			document.getElementById("sphneror").innerHTML = "Please give a valid Sender Phone With +88 !!";
			if(sphone.length > 14 || sphone.length <= 14 && sphone.length > 2 ){
				document.getElementById("sphneror").innerHTML = "Please give a valid Sender Phone Number";
				return false;
			}
			return false;
		}
		document.getElementById("sphneror").innerHTML = "";


		if (!testrphone && rphone.length > 0) {
			document.getElementById("rphneror").innerHTML = "Please give a valid Receiver Phone With +88 !!";
			if(rphone.length > 14 || rphone.length <= 14 && rphone.length > 2 ){
				document.getElementById("rphneror").innerHTML = "Please give a valid Receiver Phone Number";
				return false;
			}
			return false;
		}
		document.getElementById("rphneror").innerHTML = "";
		
		return true;
	}