<?php
require_once "controller/auth.php";

if((isset($_GET["id_album"]) && $_GET["id_album"] >0) && ($_GET["nome_album"]) && $_GET["nome_album"] != null) 
{
	$nomeArtista = $_GET["nome_artista"];
	$idAlbum       = $_GET["id_album"];
  $nomeAlbum       = $_GET["nome_album"];
  $idArt       = $_GET["id_artista"];
require_once "App/Models/musica.php";
$title = $nomeAlbum." de ".$nomeArtista;
require_once "layout/layout.php";

$musica = new Musica();

$qtA = 20;
$por_pagina = 1;
$qp = ceil($qtA/$por_pagina);

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

$dadosMusicas = $musica->listarMusicaAlbumArtista($idAlbum);


echo $head;



  echo '
  <div class="container py-4">
    <div class="row">
      <div class="col">
        <h3 class="text-center"> '.$nomeAlbum.' de  '.$nomeArtista.'</h3>';
    if ($stutsUser == 1) {
      echo '<a href="admin/musica/create_new_music.php?id_album=' . $idAlbum . '&nomeAlbum=' . $nomeAlbum . '
            &id_artista=' . $idArt . '&nome_artista=' . $nomeArtista . '" >+ nova musica</a>';
      }
        if($dadosMusicas){
        echo '

        <table class="table">
          <thead>
            <tr>	
              <td>Música</td>
              <td>Ouvir</td>
              <td>Baixar</td>

            </tr>
          </thead>

          <tbody>';
          $dadoMusica = new arrayIterator($dadosMusicas);
          while($dadoMusica->valid())
          {

    echo '
        <tr>
          <!-- href="info_music_album.php?id_musica='.$dadoMusica->current()->idMusica.'&id_album='. $dadoMusica->current()->Album.'
          " -->
          <td><a>'.$dadoMusica->current()->Titulo.'</a></td>
          <td><audio class="controlAudio" src="musicas/'.$dadoMusica->current()->Musica.'" controls >Ouvir</audio></td>
          <td><a href="musicas/'.$dadoMusica->current()->Musica.'"id="download" musica="'.$dadoMusica->current()->idMusica.'" download="">Baixar</a></td>
        </tr>
          ';
            $dadoMusica->next();
          }
  echo'
          </tbody>
        </table>';
      }else{
        if($stutsUser==1){

              echo '<p> Album <b/>'.$nomeAlbum.'</b> de <b>'.$nomeArtista.'</b> não tem musica. <a href="admin/musica/create_new_music.php?id_album='.$idAlbum.'&nomeAlbum='.$nomeAlbum.'&id_artista='.$idArt.'&nome_artista='.$nomeArtista.'" >+ Nova musica</a></p>';
            }
      }
  echo'

      </div>
    </div>
</div>







  ';



echo $footer;

}else
{
	echo "Erro";
}

 ?>
 <script type="text/javascript" src="assets/js/main/jquery.js"></script>
 <script type="text/javascript" src="assets/js/main/main.js"></script>
