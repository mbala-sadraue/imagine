<?php 

if(isset($_GET["terminar"]) && $_GET["terminar"]=="terminar_sessao"){
	require_once "../controller/auth.php";

	$stutsUser = 0;
	 session_destroy();
header("location:/imagine/");
}else{
header("location:/imagine/");
	
}













 ?>