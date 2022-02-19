 <?php 


if((isset($_POST["acao"]) && isset($_POST["titulo_musica"])) && (isset($_POST["idArtista"]) && $_POST["idArtista"] >0)){


	require_once "../Models/musica.php";
	$musica  = new Musica();

  //RECOLHENDO OS DADOS
	$tituloMusica    = $_POST["titulo_musica"];
	$idArtista = $_POST["idArtista"];
  $idUser    = $_POST["idUser"];
 	$datas     = date("Y-m-d h:i:s");
	 if(isset($_POST["idAlbum"])){

		$idAlbum = $_POST["idAlbum"];
		$dadosGeralArtista = $musica->listaCategoriaAlbumArtista($idAlbum);
		$idArtista2 = $dadosGeralArtista["idArt"];
		$categoria = $dadosGeralArtista["NomeCategoria"];
		$subCat = $dadosGeralArtista["NomeAlbum"];
		$artista =  $dadosGeralArtista["NomeArtista"];
	 }
	 if(isset($_POST["idEp"]))
	 {
			$idEp = $_POST["idEp"];
			$dadosGeralArtista = $musica->listaCategoriaEpArtista($idEp);
			$idArtista2 = $dadosGeralArtista["idArt"];
			$categoria = $dadosGeralArtista["NomeCategoria"];
			$subCat = $dadosGeralArtista["NomeEp"];
			$artista =  $dadosGeralArtista["NomeArtista"];
	 }

// RECOLHENDO AS INFORMAÇÕES DA FOTO
if(isset($_FILES["arq_musica_foto"]) && $_FILES["arq_musica_foto"]["tmp_name"] != null ){

	$arq_tmp = $_FILES["arq_musica_foto"]["tmp_name"];
	define('UPLOAD_DIRECTORY_PHOTO', __DIR__ . '../../../photos/musica/');
	$_['path'] = UPLOAD_DIRECTORY_PHOTO;

		if (!is_dir($_['path'])) {
			mkdir($_['path'], 0777, true);
		}


	$dadosFotos = $_FILES["arq_musica_foto"];
	$extensao   = pathinfo($dadosFotos["name"],PATHINFO_EXTENSION);
	$novaFoto   = md5(time()).".".$extensao;
		if (move_uploaded_file($arq_tmp, $_['path'].$novaFoto)) {
			
		}
}elseif(isset($_POST['musica_foto_post']) && $_POST['musica_foto_post'] != null){
	$novaFoto = $_POST['musica_foto_post'];
}else{
	$novaFoto = "photo_padrao.png";
}
  if(isset($_FILES["arq_musica_audio"])){
  	$arq_tmp =$_FILES["arq_musica_audio"]["tmp_name"];
  	$dadosOriginalMusica = $_FILES["arq_musica_audio"];

  	//OBTSER A EXTENSÃO DE ARQUIVO
  	$extensao =  pathinfo($dadosOriginalMusica["name"],PATHINFO_EXTENSION);

  	$novoMusica = $tituloMusica.".".$extensao;
  	$pasta =  $categoria . '/' . $artista . '/' . $subCat . '/';
		define('UPLOAD_DIRECTORY', __DIR__ .'../../../musicas/'.$pasta);
			$_['path'] = UPLOAD_DIRECTORY;
		if(!is_dir($_['path'])){	
			mkdir($_['path'], 0777, true);
		}

	 $_["path"];
			move_uploaded_file($arq_tmp, $_['path'].$novoMusica);
			$musicaFinal = $pasta.$novoMusica;
		
  }elseif(isset($_POST['arq_musica_audio_post']) && $_POST['arq_musica_audio_post'] != null){
  	$novoMusica 	= 	$_POST['arq_musica_audio_post'];
  }

	/// CADASTRA MUSICA
	if ($_POST["acao"] == "cadastraMusica") {
		if ((isset($_POST["idAlbum"]) && $_POST["idAlbum"] > 0)) {
			$idAlbum  = $_POST["idAlbum"];
			$ep =  null;
		}
			if ((isset($_POST["idEp"]) && $_POST["idEp"] > 0)) {
				$ep  = $_POST["idEp"];
				$idAlbum   =  null;
			}
		//`idMusica`, `Titulo`, `Musica`, `Imagem`, `Album`, `Ep`, `id_user`, `DCreated`, `DUpdated`
		$dados = array(1 => $tituloMusica, 2 => $musicaFinal, $novaFoto, $idAlbum, $ep, $idUser, $datas, $datas);
		$musica->cadastraMusica($dados, $tituloMusica);

	}elseif(isset($_POST["acao"] ) && $_POST["acao"] == "editarMusica"){
		$idMusica = $_POST['id_musica'];

		if ((isset($_POST["idAlbum"]) && $_POST["idAlbum"] > 0)) {
			$idAlbum  = $_POST["idAlbum"];
			$ep =  null;
		}
			if ((isset($_POST["idEp"]) && $_POST["idEp"] > 0)) {
				$ep  = $_POST["idEp"];
				$idAlbum   =  null;
			}
		// `Titulo`, `Musica`, `Imagem`,`Album`, `Ep`, `DUpdated`,`idMusica`
		$dados = array(1 => $tituloMusica, 2=> $musicaFinal,$novaFoto,$idAlbum,$ep,$datas,$idMusica);
		$musica->updadeMusica($dados);

		 //echo "Vamos editar musica $idMusica";
	}else{
  header("location:../../");
}

}else{
  header("location:../../");
}


?>