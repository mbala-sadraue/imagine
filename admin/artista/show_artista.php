<?php 
require_once "../../controller/auth.php";
if($stutsUser == 1){
require_once "../../App/Models/artista.php";

if((isset($_GET["id_artista"]) && $_GET["id_artista"] >0)) 
{
  
	$idArt       = $_GET["id_artista"];
  $public    = 1;
  $artista = new Artista();
  $dadosArtista = $artista->listarArtistaId($idArt, $public);
  $title = $dadosArtista["NomeArtista"];

require_once "../layout/layout.php";
require_once "../../App/Models/album.php";
require_once "../../App/Models/ep.php";

$album  = new Album();
$ep     = new Ep();
$eps = $ep->listarEpArtista($idArt);
$dadosAlbum   =   $album->listarAlbumArtistaId($idArt);
echo $head;

  echo '
<div class="container-fluid">
 <div class="row py-4"> 
  ';
  if($dadosArtista)
    {
     echo ' 
       <div class="col-12 col-md-4">
        <div>
          <img src="../../photos/capas/'.$dadosArtista["ArtistaImagem"].'" class="img-fluid b-img rounded mt-4 w-100"/>
        </div>
        <h5 class="caption-img fs-2">'. $dadosArtista["NomeArtista"]. '</h5> 
         <p class="nav text-center box-icon">
            <a href="edit_artista.php?id_artista='.$idArt. '" class="nav-link">
              <i class=" fa fa-edit fa-icon"></i>
            </a>
            <a href="../../App/Database/insertartista.php?id_artista=' . $idArt . '&acao=delete" class="nav-link">
              <i class="fa fa-times fa-icon"></i>
            </a> 
           </p>  
              
      </div>
      <div class="col-12 col-md-4 mt-4 mt-md-0">
        <h3> Album <a href="../album/create_new_album.php?id_artista=' . $idArt . '&nome_artista=' . $dadosArtista["NomeArtista"] . '">+</a>
      </h3>
          <div class="row"> ';
              if($dadosAlbum){
                $dadoAlbum  =new ArrayIterator($dadosAlbum);
                while ($dadoAlbum->valid()) {
                  
                
              echo ' 
              <div class="col-lg-4">
                <div>
                  <a href="../musica/list_music_album.php?id_album=' .$dadoAlbum->current()->idAlbum . '&nome_album='
                      .$dadoAlbum->current()->NomeAlbum . '&nome_artista=' .  $dadosArtista["NomeArtista"] . '&id_artista=' . $idArt . '" >
                      <img src="../../photos/capas/'.$dadoAlbum->current()->AlbumImagem.'" class="img-fluid rounded b-img"/>
                    <p class="caption-img mb-0">'. $dadoAlbum->current()->NomeAlbum  . '</p>
                    </a>

                  </div>  <p class="nav box-icon">
                    <a href="../album/update_new_album.php?id_artista='.$idArt.'&nomeAlbum=' . $dadoAlbum->current()->NomeAlbum .'
                      &id_album='.$dadoAlbum->current()->idAlbum. '&nome_artista=' .  $dadosArtista["NomeArtista"] . '">
                       <i class="fa fa-edit fa-icon"></i>
                    </a>
                    <a href="../../App/Database/insertalbum.php?deleta=album&id_album='. $dadoAlbum->current()->idAlbum. '"> <i class="fa fa-times fa-icon"></i></a>
                 </p>    
                 </div>  
                ';

                $dadoAlbum->next();
                }
              }else{
                echo '<div class="nav-item">Sem album</div>';
              }
  echo
    '   
    </div>
    </div>
    <div class="col-12 col-md-4 mt-4 mt-md-0">
        <h3>Ep ';
        echo ($stutsUser == 1) ? '<a href="../ep/create_new_ep.php?id_artista=' . $idArt . '&nome_artista=' . $dadosArtista["NomeArtista"] . '">+</a>'
        : '';
        echo '
        </h3>
        <div class ="row">';
          


            if ($eps) {
               $ep  = new ArrayIterator($eps);
              while ($ep->valid()) {


          echo '
             <div class="col-lg-4">
                <div> 
                  <a href="../musica/list_music_ep.php?id_ep=' . $ep->current()->idEp . '&nome_ep='
                        . $ep->current()->NomeEp . '&nome_artista=' .  $dadosArtista["NomeArtista"] . '&id_artista=' . $idArt . '" >
                          <img src="../../photos/capas/'.$ep->current()->EpImagem.'" class="img-fluid  rounded b-img"/>
                    </a>
                     <p class="caption-img mb-0">'. $ep->current()->NomeEp .'</p>
                  </div>
                  <p class="box-icon">
                    <a href="../ep/update_new_ep.php?id_artista=' . $idArt . '&nomeEp=' . $ep->current()->NomeEp. '
                      &id_ep='. $ep->current()->idEp .'&nome_artista=' .  $dadosArtista["NomeArtista"] . '"> 
                      <i class=" fa fa-edit fa-icon"></i>
                    </a>
                    
                    <a href="../../App/Database/insertep.php?deleta=ep&id_ep=' . $ep->current()->idEp . '"> <i class=" fa fa-times fa-icon"></i></a>
                    </p> 
                </div>
                ';

                 $ep->next();
              }
            } else {
              echo '<div class="nav-item">Sem Ep</div>';
            }
              
    echo'</div>
        </div>
    </div>
    </div>
     '; 

    }  echo'
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