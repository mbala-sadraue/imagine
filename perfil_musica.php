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

<div class="container">
  
  <div class="row">
    <div class="col-lg-4 offset-4 my-5 ">
      <div>
        <div>
        <img src="photos/musica/'.$dado->current()->Imagem.'" class="img-fluid"/>
        </div>
        <h5 class="my-2">'.$dado->current()->Titulo.'</h5>
        <audio src="musicas/'.$dado->current()->Musica.'"controls id="audio" class="my-2"></audio>
        <a  href="musicas/' . $dado->current()->Musica . '" download="" class="btn btn-danger d-block"id="btn_baixar">Baixar</a>
      </div>
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