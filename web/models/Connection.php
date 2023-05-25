<?php
declare(strict_types=1);

namespace models;
use mysqli;

class Connection
{
	
   public $con = null;
   private static $servername ="localhost";
   private static $username ="root";
   private static $password ="";
   private static $database ="shop";
      
   /**
    * getConnection
    *
    */
   public function getConnection () {
	   
 
	   $this->conn = new mysqli(self::$servername, self::$username, self::$password, self::$database);
	   if($this->conn->connect_error) {
		   throw new Exception("Error:". $this->conn->connect_error);
	   }
	   else{
		   return $this->conn;
	   }
		   
	}

}
