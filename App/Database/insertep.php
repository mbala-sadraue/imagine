<?php 


if(isset($_POST["acao"]) && (isset($_POST["nameEp"]) && $_POST["nameEp"] != null 	)){
	require_once "../Models/ep.php";
	$ep  = new Ep();


	// RECOLHENDO AS INFORMAÇÕES DA FOTO
	if (isset($_FILES["imagemEp"]) && $_FILES["imagemEp"]["tmp_name"] != null) {

		$arq_tmp = $_FILES["imagemEp"]["tmp_name"];
		define('UPLOAD_DIRECTORY_PHOTO', __DIR__ . '../../../photos/capas/');
		$_['path'] = UPLOAD_DIRECTORY_PHOTO;

		if (!is_dir($_['path'])) {
			mkdir($_['path'], 0777, true);
		}


		$dadosFotos = $_FILES["imagemEp"];
		$extensao   = pathinfo($dadosFotos["name"], PATHINFO_EXTENSION);
		$novaFoto   = md5(time()) . "." . $extensao;
		if (move_uploaded_file($arq_tmp, $_['path'] . $novaFoto)) {
		} else {
			$novaFoto = "photo_padrao_ep.jpg";
		}
	} elseif ($_POST["foto_ep"]) {
		$novaFoto = $_POST["foto_ep"];
	}
  //RECOLHENDO OS DADOS

	$idArtista    = $_POST["idArtista"];
	$nameEp       = $_POST["nameEp"];
  $dataLancamento = $_POST["anoLancamento"];
  $stuts = 1;
  $datas = date("Y-m-d h:i:s");
	$dados = array(1=>$nameEp,2=>$stuts,$idArtista,$dataLancamento,$novaFoto,$datas,$datas);


	if($_POST["acao"]== "cadastraEp")
	{
		$ep->cadastraEp($dados,$nameEp);
    
	}





	if ((isset($_POST["idEp"]) && $_POST["idEp"] > 0) && isset($_POST["editarEp"])) {

    $novaFoto;
		$idEp = $_POST["idEp"];
		$nomeEp = $_POST["nameEp"];
		$dataLancamento = $_POST["anoLancamento"];
		$datas = date("Y-m-d h:i:s");
		$dados = array(1=>$nomeEp,$dataLancamento,$datas,$novaFoto,$idEp);
		$ep->updateEp($dados, $nomeEp);
	}

}elseif(isset($_GET["id_ep"]) && $_GET["id_ep"] >0 && isset($_GET["deleta"])){
	require_once "../Models/ep.php";
	$ep  = new Ep();
	$id = $_GET["id_ep"];
	$ep->deletaArista($id);
}else{
  echo "sinto muito";
}



?>