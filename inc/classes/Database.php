<?php 
// 1)database server name
// 2)database name 
// 3)database user 
// 4)database user password

// server name, username, passowrd,db name 

abstract class Database
{
	public $dbserver ='localhost';
	public $dbuser	 ='root';
	public $dbpass	 ='';
	public $dbname	 = 'iblog_noon';
	public $mysql;
	

	public function __construct()
	{
		// $dbserver = $this->dbserver;
		// $dbuser = $this->dbuser;
		// $dbpass = $this->dbpass;
		// $dbname = $this->dbname;

		$this->mysql = new mysqli($this->dbserver,$this->dbuser,$this->dbpass,$this->dbname);
			
		if($this->mysql->connect_errno)
		{

			echo 'Unable to connect to the database server'.'<br>';
			echo 'Your database server provides following error'.$mysql->connect_error.'<br>';
			echo 'Your database server error no is'.$mysql->connect_errno.'<br>';

			exit();
		}
	}
}