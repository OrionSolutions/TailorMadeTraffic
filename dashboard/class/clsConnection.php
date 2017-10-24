<?php


class mycon {

	//declare the localhost

	public $myserver = 'localhost';

	//declare the mysqlusername

	public $username = 'root';

	//declare the mysqlpassword

	public $password = '';

	//declare the databasename;

	public $databasename = 'tailormadedashboard';

	public $Number; //Error Number

	//declare connection

	public $conn;

      
    
        //Constructor

        function __construct(){

            try{
        
		if(!($this->conn = @mysqli_connect($this->myserver,$this->username,$this->password,$this->databasename))){

		   $this->Number=mysqli_errno();

		   throw new Exception(mysqli_error());

		}

		
	    }catch (Exception $e){

		echo 'Error: ' . $e->getMessage();

	    }

        }

	function getconnect() {

	    // load to connection to connect to database 

            if(!($this->conn = @mysqli_connect($this->myserver,$this->username,$this->password,$this->databasename))){

		//Error occurred

		$this->Number=mysqli_errno();

		//Throw an exception to calling class

		throw new Exception(mysqli_error());

	    }  

	   //return connection

	   return $this->conn;

	}



	function getrecords ($sql) {

           //if (!($rs=@mysqli_query($this->conn,$sql))){
			   if (!($rs=@mysqli_query($this->conn,$sql))){
		//Query Error

		$this->Number=mysqli_errno();

		throw new Exception(mysqli_error());		

           }

	   return $rs;

	}

	function getrows ($sql) {

		$numrows=mysqli_num_rows($sql);

		return $sql;

	}

	function getresult ($result) {

		$row =  mysqli_fetch_array($result);

		return $row;

	}

	function closeconnection () {

		mysqli_close($this->conn);	

	}



        //Destructor

	function __destruct(){

		try{

			@mysqli_close($this->conn);

		} catch (Exception $e){

			echo 'Error: ' . $e->getMessage();

		}

	}

}

?>