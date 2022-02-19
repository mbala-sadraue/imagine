<?php
require_once "../../controller/auth.php";
if ($stutsUser == 1) {
if((isset($_GET["id_album"]) && $_GET["id_album"] >0) && ($_GET["nome_album"]) && $_GET["nome_album"] != null) 
{
	$nomeArtista = $_GET["nome_artista"];
	$idAlbum       = $_GET["id_album"];
  $nomeAlbum       = $_GET["nome_album"];
  $idArt       = $_GET["id_artista"];
require_once "../../App/Models/musica.php";
$title = $nomeAlbum." de ".$nomeArtista;
require_once "../layout/layout.php";

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
  <div class="container">
  <div class="row">
    <div class="col-lg-10 offset-lg-1">
      <h3 class="text-center"> '.$nomeAlbum.' de  '.$nomeArtista.'</h3>
      <a href="create_new_music.php?id_album=' . $idAlbum . '&nomeAlbum=' . $nomeAlbum . '
					&id_artista=' . $idArt . '&nome_artista=' . $nomeArtista . '" >+ Nova música</a>';
		
      if($dadosMusicas){
      echo '

      <table class="table">
      	<thead>
      		<tr>	
      			<td>Música</td>
            <td>Ouvir</td>
      			<td>Baixar</td>
            <td>Ações</td>

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
  			<td><a >'.$dadoMusica->current()->Titulo.'</a></td>
        <td><audio src="../../musicas/'.$dadoMusica->current()->Musica.'" controls >Ouvir</audio></td>
  			<td><a href="../../musicas/'.$dadoMusica->current()->Musica.'" download="">Baixar</a></td>
        <td><a href="edit_music.php?id_musica='.$dadoMusica->current()->idMusica.'&id_album='.$dadoMusica->current()->Album.'&nome_artista='.$nomeArtista.'">Editar</a></td>
  		</tr>
      	';
      	 	$dadoMusica->next();
      	 }
echo'
      	</tbody>
      </table>';
    }else{
      if($stutsUser==1){

            echo '<p> Album <b/>'.$nomeAlbum.'</b> de <b>'.$nomeArtista.'</b> não tem musica. <a href="create_new_music.php?id_album='.$idAlbum.'&nomeAlbum='.$nomeAlbum.'&id_artista='.$idArt.'&nome_artista='.$nomeArtista.'" >+ Nova música</a></p>';
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
header("location:../../");
}
}else{
  header("location:../../"); 
}
 ?>
