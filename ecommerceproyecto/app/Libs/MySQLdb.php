<?php

class MySQLdb {
	
	private $server = "localhost";
	private $database_name = "eCommerce";
	private $username = "root";
	private $password = "";
	private $table_name1 = "users";
	private $table_name2 = "products";
	private $table_name3 = "cart";
	private $connection = "";
	private $tableFields = "";

	function __construct() {
		$this-> connetToServerDataBase();
		$this->charser();
		$this-> createDataBase();

		$this-> defineTableField1();
		$this-> createTables($this->table_name1);

		$this-> defineTableField2();
		$this-> createTables($this->table_name2);

		$this-> defineTableField3();
		$this-> createTables($this->table_name3);


	}

	private function connetToServerDataBase(){
		$this->connection = mysqli_connect($this->server, $this->username, $this->password);
		if (mysqli_connect_errno()) {
			die("Connect to data base: NOT OK <br>");
		}
		else {
			echo 'Conect to data base: OK <br>';
		}
	}

	private function createDataBase(){
		$this->query = "CREATE DATABASE IF NOT EXISTS $this->database_name";
		$ok = mysqli_query($this->connection, $this->query);
		if (!$ok) {
			echo 'No se ha podido crear la base de datos'.mysqli_error().'<br>';
		}
		else {
			print ("Data base Ok <br>");
		}
	}

	private function createTables($table_name){
		$query = "CREATE TABLE $this->database_name.$table_name($this->tableFields)";
		$ok = mysqli_query($this->connection,$query);
		if (!$ok) {
			print("Create table: no OK <br>");
		}
		else {
			print("Create table: Ok <br>");
		}
	}
	private function charser(){
		$ok=mysqli_set_charset($this->connection, "utf8");
		if (!$ok) {
			print("Charset: no OK <br>");
		}
		else {
			print("Charset: Ok <br>");
		}
	}

	function defineTableField1(){
		$this->tableFields ="
		`idProduct` int(11) NOT NULL,
		`idUser` int(11) NOT NULL,
		`product` varchar(200) NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`state` char(1) NOT NULL,
		`quantity` int(11) NOT NULL,
		`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP";
	}

	function defineTableField2(){
		$this->tableFields ="
		`idProduct` int(11) NOT NULL,
		`idUser` int(11) NOT NULL,
		`product` varchar(200) NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`state` char(1) NOT NULL,
		`quantity` int(11) NOT NULL,
		`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP";
	}

	function defineTableField3(){
		$this->tableFields ="
		`idProduct` int(11) NOT NULL,
		`idUser` int(11) NOT NULL,
		`product` varchar(200) NOT NULL,
		`price` decimal(10,2) NOT NULL,
		`discount` decimal(10,2) NOT NULL,
		`Shipping` decimal(10,2) NOT NULL,
		`state` char(1) NOT NULL,
		`quantity` int(11) NOT NULL,
		`date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP";
	}

}

?>