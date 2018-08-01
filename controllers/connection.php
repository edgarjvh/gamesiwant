<?php
	class connection
	{
		private $server;
		private $user;
		private $pass;
		private $database;
		public  $command;
		
		public function __construct(){
			$this->server       = "localhost";
			$this->user         = "gamesiwa_u";
			$this->pass         = "gamesiwa_pass";
			$this->database     = "gamesiwa_db";
		}
		
		function connect(){
			$this->command= new mysqli($this->server,$this->user,$this->pass,$this->database);
		}
		
		function close(){
			$this->command->close();
		}
	}
?>