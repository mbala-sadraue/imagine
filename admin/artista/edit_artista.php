<?php 

require_once "../../controller/auth.php";
if($stutsUser==1 && isset($_GET["id_artista"]) && $_GET["id_artista"] >0){
require_once "../../App/Models/artista.php";
require_once "../../App/Models/categoria.php";


  $idArt       = $_GET["id_artista"];
  $public    = 1;
  $artista = new Artista();
  $dadosArtista = $artista->listarArtistaId($idArt, $public);
  $title = $dadosArtista["NomeArtista"];
  require_once "../layout/layout.php";
  $categoria = new Categoria();

$dadosCategorias = $categoria->listarCategoria();
echo $head;
echo'
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">';
if($dadosCategorias){
    $dadoCategoria = new arrayIterator($dadosCategorias);
echo '<h2> Adiciona nova Artista</h2>
      <form action="../../App/Database/insertartista.php" method="POST" enctype="multipart/form-data">
        <div class="my-2">
          <label for="" class="form-label">Selecione Categoria</label> 
          <select name="idCategory" class="form-control" >';
          while($dadoCategoria->valid())
          {
              echo'
              <option value="'
              . $dadoCategoria->current()->idCat.'"
              ';echo ($dadoCategoria->current()->idCat == $dadosArtista["idCat"])?"selected":""; echo'
              >'. $dadoCategoria->current()->NomeCategoria.
              '</option>';
             $dadoCategoria->next();
          }


echo '     </select>
        </div>
       <div class="my-2">
          <label for="" class="form-label">Nome de Artista</label>
          <input type="text" class="form-control" name="nameArtista" value="' .$dadosArtista["NomeArtista"].'"placeholder="Digite nome artista" required title="Artista">
        </div>
         <div class="my-2">
          <label for="" class="form-label">Imagem</label>
          <input type="file" class="form-control" name="FotoArtista"placeholder="Adicione foto artista" title="Artista">'; 
          $foto = $dadosArtista["ArtistaImagem"];
          if($foto){
              echo '<img src="../../photos/capas/'.$foto.'" width="100"/>
                <input type="hidden" name="foto_artista" value="'. $foto.'"/>
              ';
          }
  echo'
        </div>
          <input type="hidden" class="form-control" name="id" value="'.$idArt.'"required>
          <input type="hidden" class="form-control" name="idUser" value="1"required>
        <button class="btn btn-danger" name="acao" value="EditarArtista">Registrar</button>
      </form>';
    }
else{
  echo '<h2>Adicione primeiro a categoria</h2>';
}

echo'</div>
  </div>
</div>';
echo $footer;
}else{
  header("location:login.php");
}
