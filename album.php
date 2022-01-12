<?php 
require_once "controller/auth.php";

if((isset($_GET["id_artista"]) && $_GET["id_artista"] >0) && ($_GET["nome_artista"]) && $_GET["nome_artista"] != null) 
{
	$nomeArtista = $_GET["nome_artista"];
	$idArt       = $_GET["id_artista"];
  


$title = "Album de ".$nomeArtista;
require_once "App/Models/album.php";
require_once "layout/layout.php";

$album = new Album();
$qtA = $album->contarAlbumArtista($idArt);
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


$dadosAlbums = $album->listarAlbumArtista($idArt,$inicio,$por_pagina);

echo $head;



  echo '
  <div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <h3> Album de  '.$nomeArtista.'</h3>';
  if($dadosAlbums)
    {  echo'<table class="table">
      	<thead>
      		<tr>	
      			<td>Album</td>
      			<td>Ano</td>

      		</tr>
      	</thead>

      	<tbody>';
      	$dadoAlbum = new arrayIterator($dadosAlbums);
      	 while($dadoAlbum->valid())
      	 {
          $idAlbum = $dadoAlbum->current()->idAlbum;
          $nomeAlbum = $dadoAlbum->current()->NomeAlbum;

  echo '
  		<tr>
  			<td>
        <a href="http://'.$url.'list_music_album.php?id_album='.$idAlbum.'&nome_album='.$nomeAlbum.'&nome_artista='.$nomeArtista.'&id_artista='.$idArt.'" >
        '.$nomeAlbum.'</a>
        </td>
  			<td>'.$dadoAlbum->current()->AnoLancamento.'</td>
  		</tr>
      	';
      	 	$dadoAlbum->next();
      	 }
echo'
      	</tbody>
      </table>';
    }else{
        echo'<p><b>'.$nomeArtista.'</b> não tem album registrado</p>';
    }


        if($pg>1){
          echo '<a href="http://'.$url.'album.php?id_artista='.$idArt.'&nome_artista= ' .$nomeArtista . '&pg='.$ant.'"><< </a>';
        }
        for ($i=1; $i <= $qp; $i++) { 
          

          if($i==$pg){
            echo '<span style="font-size:20px; margin-right:10px;" >'.$i.' |</span>';
          }else{
            echo '<a href="http://'.$url.'album.php?id_artista='.$idArt.'&nome_artista= ' .$nomeArtista . '&pg='.$i.'" style="margin-right:10px;">'.$i.' |</a>';

          }
          
        }
        if($pg < $qp){
          echo '<a href="http://'.$url.'album.php?id_artista='.$idArt.'&nome_artista= ' .$nomeArtista . '&pg='.$depois.'">>> </a>';
        }
  echo'  </div>
  </div>
</div>







  ';



echo $footer;

}else
{
	echo "Erro";
}

 ?>
