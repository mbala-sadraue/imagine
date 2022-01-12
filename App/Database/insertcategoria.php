<?php 
if(isset($_POST["acao"]) && (isset($_POST["nameCategory"]) 	&& $_POST["nameCategory"] != null)){
	require_once "../Models/categoria.php";
	$categoria  = new Categoria();



  //RECOLHENDO OS DADOS

	$nomeCategoria = $_POST["nameCategory"];
	$idUsuario = $_POST["idUser"];
	$status = 1;
	$dados = array(1=>$nomeCategoria,2=>$idUsuario,$status);


	if($_POST["acao"]== "cadastraCategoria")
	{
		$categoria->cadastraCategoria($dados);

	}

	if($_POST["acao"]== "EditarCategoria")
	{
		$id = $_POST["idCategoria"];
		$categoria->atualizarCategoria($nomeCategoria,$id);

	}	




}


if(isset($_GET['acao']) && $_GET['acao'] == "delete"){
	require_once "../Models/categoria.php";
	$categoria  = new Categoria();


	$id = $_GET['id_category'];

	$categoria->atualizarStatus($id);

}


 ?>