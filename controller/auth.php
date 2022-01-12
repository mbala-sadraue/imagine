<?php 
session_start();
if(isset($_SESSION["dadosUsuario"]) && isset($_SESSION["StutsUser"])){
  $stutsUser = 1;
  $dadosUsuario = $_SESSION["dadosUsuario"];
  $nomeUser  = $dadosUsuario["NameUser"];
}else{
	$stutsUser = 0;
}

 ?>