<?php
require_once "controller/auth.php";

if((isset($_GET["id_ep"]) && $_GET["id_ep"] >0) && ($_GET["nome_ep"]) && $_GET["nome_ep"] != null) 
{
	$nomeArtista = $_GET["nome_artista"];
	$idEp      = $_GET["id_ep"];
  $nomeEp      = $_GET["nome_ep"];
  $idArt       = $_GET["id_artista"];
require_once "App/Models/musica.php";
$title = $nomeEp." de ".$nomeArtista;
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

$dadosMusicas = $musica->listarMusicaEpArtista($idEp);


echo $head;



  echo '
  <div class="container py-4">
  <div class="row">
    <div class="col-lg-12 offset-lg-12 ">
      <h3 class="text-center"> '.$nomeEp.' de  '.$nomeArtista.'</h3>';
	 if ($stutsUser == 1) {
     echo '<a href="admin/musica/create_new_music_ep.php?id_ep=' . $idEp . '&nomeEp=' . $nomeEp . '
					&id_artista=' . $idArt . '&nome_artista=' . $nomeArtista . '" >+ Nova musica</a>';
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
        <td><audio class="controlAudio" src="musicas/'.$dadoMusica->current()->Musica.'" controls>Ouvir</audio></td>
  			<td><a href="musicas/'.$dadoMusica->current()->Musica.'"id="download" download="">Baixar</a></td>
  		</tr>
      	';
      	 	$dadoMusica->next();
      	 }
echo'
      	</tbody>
      </table>';
    }else{
      if($stutsUser==1){

            echo '<p> Ep <b>'.$nomeAlbum.'</b> de <b>'.$nomeArtista.'</b> não tem musica. <a href="admin/musica/create_new_music.php?id_album='.$idAlbum.'&nomeAlbum='.$nomeAlbum.'&id_artista='.$idArt.'&nome_artista='.$nomeArtista.'" >+ nova musica</a></p>';
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