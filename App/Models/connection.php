<?php 
  /**
   * 
   */
 abstract class Connected 
  {


  	protected $host = "localhost";
  	protected $user = "root";
  	protected $pass = "";
  	protected $bd = "imagine";
  	protected $con;

  	public function __construct()

  	{


      try{

    	 $dns = "mysql:host=".$this->host.";dbname=".$this->bd;

        $this->con = new PDO($dns,$this->user,$this->pass);

			}catch(PDOException $e){

       $erroCode = $e->getCode();

       switch ($erroCode) {
         case 1049:
          header('location:http:controller/error.php');
           break;
         
         default:
           // code...
           break;
       }

      }
  	}


  }







 ?>