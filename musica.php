<?php 
require_once "controller/auth.php";

$title = "Musica";
require_once "layout/layout.php";
require_once "App/Models/musica.php";
$musica = new Musica();
$limite = 20;
$qtdMusica      = $musica->contarMusica();


$por_pagina = 20;


$qp = ceil($qtdMusica/$por_pagina);

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
$dadosMusica = $musica->listarMusica($inicio,$por_pagina);
echo $head;


echo
'
<div class="container">
    <div class="">
      <p class="text-dark fs-1 fw-bold">Músicas</p>
    </div>
    <div class="row row-cols-2">';

      if($dadosMusica){
        $dadoMusica = new ArrayIterator($dadosMusica);
        while ($dadoMusica->valid()) {
 
        echo'
      <div class="col-md-2 text-center mt-2">
        <a href="perfil_musica.php?id_musica='.$dadoMusica->current()->idMusica.'"> 
        <img class="img-fluid rounded" src="photos/musica/'.$dadoMusica->current()->Imagem.'" width="400" height="300" alt="" role="img">
        </a>
        <p class="fw-light fs-5">'.$dadoMusica->current()->Titulo.'</p>
      </div>
          ';
          $dadoMusica->next();
        }
      }else{
        echo '<h5>Sem geristro de musicas </h5>';
      }
      echo'
     </div>

     <ul>';
        if ($pg > 1) {
          echo '<a href="http://' . $url . 'musica.php?pg=' . $ant . '"><< </a>';
        }
        for ($i = 1; $i <= $qp; $i++) {


          if ($i == $pg) {
            echo '<span style="font-size:20px; margin-right:10px;" >' . $i . ' |</span>';
          } else {
            echo '<a href="http://' . $url . 'musica.php?pg=' . $i . '" style="margin-right:10px;">' . $i . ' |</a>';
          }
        }
        if ($pg < $qp) {
          echo '<a href="http://' . $url . 'musica.php?pg=' . $depois . '">>> </a>';
        }
        echo '</ul>
  </div>';
echo $footer;
 ?>