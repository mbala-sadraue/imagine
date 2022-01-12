<?php 
require_once "controller/auth.php";

if((isset($_GET["id_musica"]) && $_GET["id_musica"] >0) && ($_GET["id_album"]) && $_GET["id_album"] >0) 
{
	$idAlbum        = $_GET["id_album"];
	$idMusica       = $_GET["id_musica"];

  require_once "App/Models/musica.php";
  $musica = new Musica();

  $dadosMusica = $musica->infoMusica($idMusica, $idAlbum);

$title =  $dadosMusica["Titulo"];
require_once "layout/layout.php";



echo $head;



  echo '
  <div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">';
  if($dadosMusica)
    {  

  echo'
  
        <div class=" text-center">
          <img src="photos/capas/'.$dadosMusica["Imagem"].'" alt ="'.$dadosMusica["Titulo"].'" class="img-fluid">
        </div>
      <table>
      <tbody>
        <tr>
          <td>Título:</td> <td>'.$dadosMusica["Titulo"].'</td>
        </tr>
        <tr>
          <td>Album:</td> <td>'.$dadosMusica["NomeAlbum"].'</td>
        </tr>
        <tr>
          <td>Ano:</td> <td>'.$dadosMusica["AnoLancamento"]. '</td>
        </tr>
        <tr>
          <td>Genero:</td> <td>' . $dadosMusica["NomeCategoria"] . '</td>
        </tr>
      <tbody>
      </table>
  ';
    }else{
        echo'<p>Nenhum registro da musica encontrado</p>';
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
