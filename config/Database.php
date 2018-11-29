<?php
Class Database{
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $dbname = "money_t";

	public $link;
	public $error;
	public $vcode = 0;

	public function __construct(){
		$this->ConnectDB();
	}

	private function ConnectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link){
			$this->error ="Connection Fail".$this->link->connect_error;
			echo $this->error;
			return false;
		}
	}


 	// Select Data
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}else{
			return false;
		}

	}


	 //Insert Data
	 public function insert($data){
		  $insert_row = $this->link->query($data) or die($this->link->error.__LINE__);
		  if ($insert_row) {
		   return $insert_row;
		  } else {
		   return false;
		  }
	 }

}

?>