<?php 
if(isset($_POST["acao"]) && (isset($_POST["nameArtista"]) 	&& $_POST["nameArtista"] != null)){
	require_once "../Models/artista.php";
	$artista  = new Artista();




	// RECOLHENDO AS INFORMAÇÕES DE FOTO
	if (isset($_FILES["FotoArtista"]) && $_FILES["FotoArtista"]["tmp_name"] != null) {

		$arq_tmp = $_FILES["FotoArtista"]["tmp_name"];
		define('UPLOAD_DIRECTORY_PHOTO', __DIR__ . '../../../photos/capas/');
		$_['path'] = UPLOAD_DIRECTORY_PHOTO;

		if (!is_dir($_['path'])) {
			mkdir($_['path'], 0777, true);
		}


		$dadosFotos = $_FILES["FotoArtista"];
		$extensao   = pathinfo($dadosFotos["name"], PATHINFO_EXTENSION);
		$novaFoto   = md5(time()) . "." . $extensao;
		if (move_uploaded_file($arq_tmp, $_['path'] . $novaFoto)) {
		}
	} elseif($_POST["foto_artista"]) {
			$novaFoto = $_POST["foto_artista"];
	}else{
		$novaFoto = "photo_padrao.png";
	}


  //RECOLHENDO OS DADOS

	$nomeArtista = $_POST["nameArtista"];
	$idCategory = $_POST["idCategory"];
	$datas = date("Y-m-d h:i:s");
	$status = 1;
	
	if($_POST["acao"]== "cadastraArtista" )
	{
		$dados = array(1 => $nomeArtista, 2 => $novaFoto, $status, $idCategory, $datas, $datas);
		$artista->cadastraArtista($dados,$nomeArtista);
	}
	if($_POST["acao"] == "EditarArtista" && $_POST["id"]){
		$id  = $_POST["id"];
		$dados =array(1=>$nomeArtista,$novaFoto,$idCategory,$datas,$id);
		$artista->updateArtista($dados);
	}
}

if(isset($_GET["id_artista"]) && $_GET["id_artista"] >0 && isset($_GET["acao"]) && $_GET["acao"] == "delete"){
	$id = $_GET["id_artista"];
	require_once "../Models/artista.php";
	$artista  = new Artista();
	$artista->deletaArista($id);
}
?>