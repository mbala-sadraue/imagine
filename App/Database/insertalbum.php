<?php 


if(isset($_POST["acao"]) && (isset($_POST["nameAlbum"]) && $_POST["nameAlbum"] !=null)){
	require_once "../Models/album.php";
	require_once "../Models/categoria.php";
	$album  = new Album();


	// RECOLHENDO AS INFORMAÇÕES DA FOTO
	if (isset($_FILES["imagemAlbum"]) && $_FILES["imagemAlbum"]["tmp_name"] != null) {

		$arq_tmp = $_FILES["imagemAlbum"]["tmp_name"];
		define('UPLOAD_DIRECTORY_PHOTO', __DIR__ . '../../../photos/capas/');
		$_['path'] = UPLOAD_DIRECTORY_PHOTO;

		if (!is_dir($_['path'])) {
			mkdir($_['path'], 0777, true);
		}


		$dadosFotos = $_FILES["imagemAlbum"];
		$extensao   = pathinfo($dadosFotos["name"], PATHINFO_EXTENSION);
		$novaFoto   = md5(time()) . "." . $extensao;
		if (move_uploaded_file($arq_tmp, $_['path'] . $novaFoto)) {
		}else{
			$novaFoto = "photo_padrao.png";
		}
	} elseif($_POST["foto_Album"]) {
		$novaFoto = $_POST["foto_Album"];
	}
  //RECOLHENDO OS DADOS

	$idArtista = $_POST["idArtista"];
	$nameAlbum = $_POST["nameAlbum"];
  $dataLancamento = $_POST["anoLancamento"];
  $stuts = 1;
  $datas = date("Y-m-d h:i:s");
	$dados = array(1=>$nameAlbum,2=>$dataLancamento,$idArtista,$stuts,$novaFoto,$datas,$datas);


	if($_POST["acao"]== "cadastraAlbum")
	{
		$album->cadastraAlbum($dados, $nameAlbum);
    
	}




 if ((isset($_POST["acao"])&& $_POST["acao"] = "cadastrEditar") && (isset($_POST["nameAlbum"]))) {

	$idAlbum = $_POST["idAlbum"];
  $novaFoto;
	$dados= array(1=>$nameAlbum,$dataLancamento,$datas,$novaFoto,$idAlbum);

	$album->updateAlbum($dados, $nameAlbum);
 }
}elseif((isset($_GET["id_album"]) && $_GET["id_album"] >0) && isset($_GET["deleta"])){
	$idAlbum = $_GET["id_album"];
	require_once "../Models/album.php";
	$album  = new Album();
	$album->deletaAlbum($idAlbum);
}else{
  //header("location:../../");
}



?>