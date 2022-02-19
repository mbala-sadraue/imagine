<?php 
if(isset($_GET["id_musica"]) && $_GET['id_musica'] >0){
require_once "controller/auth.php";

$title = "Musica";
require_once "layout/layout.php";
require_once "App/Models/musica.php";
$musica = new Musica();

$id = $_GET["id_musica"];
$dados = $musica->listarMusicaPeloId($id);
echo $head;
if($dados){
  $dado = new arrayIterator($dados);
  while($dado->valid()){
echo '

<div class="container py-5 ">
  <div class="row">
    <div class="col-sm-6">
          <img src="photos/musica/'.$dado->current()->Imagem.'" class="img-fluid rounded"/>
        <!-- <h5 class="my-2">'.$dado->current()->Titulo.'</h5> -->
        <a  href="musicas/' . $dado->current()->Musica . '" musica="'.$dado->current()->idMusica.'" download="" class="btn btn-danger d-block btn_baixar mt-3" id="download">Baixar</a>
        <!-- <audio src="musicas/'.$dado->current()->Musica.'"controls id="audio" class="my-2"></audio> -->
    </div>
    <div class="col-sm-6 ">
        <h5 class="my-2">'.$dado->current()->Titulo.'</h5>
        <!-- <a  href="musicas/' . $dado->current()->Musica . '" musica="'.$dado->current()->idMusica.'" download="" class="btn btn-danger d-block btn_baixar" id="download">Baixar</a> -->
        <audio src="musicas/'.$dado->current()->Musica.'"controls id="audio" class="my-2 controlAudioPerfil"></audio>
    </div>
  </div>
</div>

';
    $dado->next();
  }
}else{
   header("location:musica.php");
}

echo $footer;
}
else{
   header("location:musica.php");
}
 ?>
 <script type="text/javascript" src="assets/js/main/jquery.js"></script>
 <script type="text/javascript" src="assets/js/main/main.js"></script>
