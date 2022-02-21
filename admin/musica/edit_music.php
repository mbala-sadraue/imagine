<?php
require_once"../../controller/auth.php";
require_once "../../App/Models/musica.php";
require_once "../../App/Models/album.php";
if($stutsUser==1){
if((isset($_GET["id_musica"]) && $_GET["id_musica"]>0) && (isset($_GET["id_album"]) && $_GET["id_album"] >0)){
  $musica =new Musica();

  $idMusica= $_GET["id_musica"];
  $idAlbum= $_GET["id_album"];
  $dadosMusica = $musica->infoMusica($idMusica,$idAlbum);

  
if($dadosMusica){
 $title = 'Editar | '.$dadosMusica['NomeArtista'];
 require_once "../layout/layout.php";

 /*DADOS ALBUMS */
 $album      = new Album();
 $idArtista  = $dadosMusica['idArt'];
 $dadosAlbum = $album->listarAlbumArtistaId($idArtista);


echo $head;
echo '
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <h3> Editar '.$dadosMusica['Titulo'].'</h3>
      <form action="../../App/Database/insertmusica.php" method="POST" enctype="multipart/form-data">
        <div class="my-2">
          <label for="" class="form-label">Artista</label>
          <select  class="form-control" name="idArtista" required title="Artista">
            <option value="'.$dadosMusica['idArt'].'" selected>'.$dadosMusica['NomeArtista']. '</option>
          </select>
        </div>


        <div class="my-2">
          <label for="" class="form-label">Album</label>
          <select  class="form-control" name="idAlbum" required title="Artista">
          ';
          $dadoAlbum    =   new arrayIterator($dadosAlbum);
          while($dadoAlbum->valid()){
             echo' <option value="'.$dadoAlbum->current()->idAlbum.'"'; 
             echo ($dadoAlbum->current()->idAlbum == $dadosMusica['idAlbum'])?'selected':''; 
             echo'>'.$dadoAlbum->current()->NomeAlbum. '</option> ';
             $dadoAlbum->next();
          }
     echo '
          </select>
        </div>
        <div class="my-2">
          <label for="" class="form-label">Título</label>
          <input type="text" class="form-control" name="titulo_musica" required title="Titulo da música" value="'.$dadosMusica['Titulo'].'">
        </div>
         <div class="my-2">
          <label for="" class="form-label">Música</label>
          <input type="file" class="form-control" name="arq_musica_audio" value="" title="carrege a audio">
          <input type="hidden" name="arq_musica_audio_post" value="'.$dadosMusica["Musica"].'" required />
        </div>
        <div class="my-2">
          <label for="" class="form-label">imagem</label>
          <input type="file" class="form-control" name="arq_musica_foto" title="carrege a imagem">

          <img src="../../photos/musica/'.$dadosMusica['Imagem'].'" alt="'.$dadosMusica['Titulo'].'" height="50px"/>
          <input type="hidden" class="form-control" name="musica_foto_post">
        </div>
          <input type="hidden"  name="id_musica" value="'.$dadosMusica['idMusica'].'"required>
          <input type="hidden"  name="idUser" value="1"required>
        <button class="btn btn-danger" name="acao" value="editarMusica">Editar</button>
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
}else{
  header("location:../../");
}
