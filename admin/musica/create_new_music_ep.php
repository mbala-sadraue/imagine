<?php
require_once"../../controller/auth.php";
if($stutsUser==1){
if((isset($_GET["id_ep"]) && $_GET["id_ep"]>0) && (isset($_GET["id_artista"]) && $_GET["id_artista"] >0)){
  $idEp= $_GET["id_ep"];
  $nomeEp= $_GET["nomeEp"];
  $idArtista = $_GET["id_artista"];
  $nomeArtista= $_GET["nome_artista"];

 $title = $nomeEp;
 require_once "../layout/layout.php";


echo $head;
echo '
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <h3> Adiciona musica de '.$nomeArtista.'</h3>
      <form action="../../App/Database/insertmusica.php" method="POST" enctype="multipart/form-data">
        <div class="my-2">
          <label for="" class="form-label">Artista</label>
          <select  class="form-control" name="idArtista" required title="Artista">
            <option value="'.$idArtista.'" selected>'.$nomeArtista. '</option>
          </select>
        </div>


        <div class="my-2">
          <label for="" class="form-label">Ep</label>
          <select  class="form-control" name="idEp" required title="Artista">
            <option value="'.$idEp.'" selected>'. $nomeEp. '</option>
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
   header("location:../../");
  }
}else{
  header("location:../../");
}
