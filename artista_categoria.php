<?php
if(isset($_GET['idCat']) && $_GET['idCat']>0){

require_once "controller/auth.php";
require_once "App/Models/artista.php";
require_once "App/Models/album.php";
require_once "App/Models/ep.php";

$idCat = $_GET['idCat'];
$title = "Artistas";
require_once "layout/layout.php";


$album = new Album();

$ep = new Ep();
$artista = new Artista();

$qtdArtista = $artista->contarArtista();
$por_pagina =20;
$qp = ceil($qtdArtista/$por_pagina);

if(isset($_GET["pg"]) && $_GET["pg"]> $qp){
  
  $pg = $qp;
}elseif(isset($_GET["pg"]) &&  $_GET["pg"]>0 && $_GET["pg"]<=$qp){
  $pg = ceil($_GET["pg"]);
}else{
  $pg = 1;
}
$inicio = ($pg * $por_pagina) - $por_pagina;

 
$ant =  $pg -1;
$depois = $pg +1;
 $dadosArtistas = $artista->listarArtistaCategoria($idCat,$inicio,$por_pagina);
echo $head;
echo '
<div class="container py-4">
  <div class="row">
    <div class="col-lg-12">
      <h2>Artistas</h2>
     <div class="row">
      ';
      if($dadosArtistas)
      {
        $dadoArtista = new arrayIterator($dadosArtistas);


        
        while($dadoArtista->valid())
        {
          $idArt = $dadoArtista->current()->idArt;
            $countAlbum = $album->contarAlbumArtista($idArt);
            $countEp    = $ep->contarEpArtista($idArt);
          echo '
                <div class="col-6 col-md-2 text-center mt-2 box-img">
                  <a href="show_artista.php?id_artista='. $dadoArtista->current()->idArt.'">
                  <img class="img-fluid rounded b-img " src="photos/capas/'.$dadoArtista->current()->ArtistaImagem.'" width="400" height="300" alt="" role="img">
                  <p class="caption-img">'. $dadoArtista->current()->NomeArtista.'</p>
                  </a>
                </div>
            ';

          $dadoArtista->next();
        }
        echo '</div>
        
        <ul>';
        if ($pg > 1) {
          echo '<a href="http://' . $url . 'artistas.php?pg=' . $ant . '"><< </a>';
        }
        for ($i = 1; $i <= $qp; $i++) {


          if ($i == $pg) {
            echo '<span style="font-size:20px; margin-right:10px;" >' . $i . ' |</span>';
          } else {
            echo '<a href="http://' . $url . 'artistas.php?pg=' . $i . '" style="margin-right:10px;">' . $i . ' |</a>';
          }
        }
        if ($pg < $qp) {
          echo '<a href="http://' . $url . 'artistas.php?pg=' . $depois . '">>> </a>';
        }
        echo '</ul>';
      }else{
        echo '<h5 class="mt-4 lead">Sem registro de artista</h5>';
      }
    echo'</div>
  </div>
</div>

  
';


echo $footer;
}
 ?>