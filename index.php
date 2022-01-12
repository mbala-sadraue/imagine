<?php 
require_once"controller/auth.php";

if($stutsUser == 1){
header("location:admin/");
}
if(isset($_GET["pg"])){
	$pg = $_GET["pg"].".php";

	if(file_exists("$pg")){
		require_once "$pg";
	}else{
		echo " <b>$pg</b> Arquivo não criado";
	}

}else{

	require_once "home.php";
}

 ?>