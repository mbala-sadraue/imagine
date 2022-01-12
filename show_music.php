<?php
require_once"controller/auth.php";
if($stutsUser==1){
if((isset($_GET["id_album"]) && $_GET["id_album"]>0) && (isset($_GET["id_artista"]) && $_GET["id_artista"] >0)){
  $idAlbum= $_GET["id_album"];
  $nomeAlbum= $_GET["nomeAlbum"];
  $idArtista = $_GET["id_artista"];
  $nomeArtista= $_GET["nome_artista"];

 $title = $nomeAlbum;
 require_once "layout/layout.php";


echo $head;
echo '
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <h3> Adiciona album de '.$nomeArtista.'</h3>
      <form action="App/Database/insertmusica.php" method="POST" enctype="multipart/form-data">
        <div class="my-2">
          <label for="" class="form-label">Artista</label>
          <select  class="form-control" name="idArtista" required title="Artista">
            <option value="'.$idArtista.'" selected>'.$nomeArtista. '</option>
          </select>
        </div>


        <div class="my-2">
          <label for="" class="form-label">Album</label>
          <select  class="form-control" name="idAlbum" required title="Artista">
            <option value="'.$idAlbum.'" selected>'.$nomeAlbum. '</option>
          </select>
        </div>
        <div class="my-2">
          <label for="" class="form-label">Título</label>
          <input type="text" class="form-control" name="titulo_musica" required title="carrege a audio">
        </div>
         <div class="my-2">
          <label for="" class="form-label">Música</label>
          <input type="file" class="form-control" name="arq_musica_audio" title="carrege a audio" required>
        </div>
        <div class="my-2">
          <label for="" class="form-label">imagem</label>
          <input type="file" class="form-control" name="arq_musica_foto" title="carrege a imagem" required>
        </div>
          <input type="hidden" class="form-control" name="idUser" value="1"required>
        <button class="btn btn-danger" name="acao" value="cadastraMusica">Registrar</button>
      </form>
    </div>
  </div>
</div>';
echo $footer;

  }else{
   header("location:login.php");
  }
}else{
  header("location:login.php");
}
