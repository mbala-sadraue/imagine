<?php 
require_once"../../controller/auth.php";
if($stutsUser==1){
 $title = "Nova Artista";
 require_once "../layout/layout.php";
 require_once "../../App/Models/categoria.php";

$categoria = new Categoria();

$dadosArtistas = $categoria->listarCategoria();
echo $head;
echo'
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">';
if($dadosArtistas){
  $dadoArtista = new arrayIterator($dadosArtistas);
echo '<h2> Adiciona nova Artista</h2>
      <form action="../../App/Database/insertartista.php" method="POST" enctype="multipart/form-data">
        <div class="my-2">
          <label for="" class="form-label">Selecione Categoria</label> 
          <select name="idCategory" class="form-control" >';
          while($dadoArtista->valid())
          {
              echo'
              <option value="'
              .$dadoArtista->current()->idCat.'">'.$dadoArtista->current()->NomeCategoria.
              '</option>';
            $dadoArtista->next();
          }


echo '     </select>
        </div>
       <div class="my-2">
          <label for="" class="form-label">Nome de Artista</label>
          <input type="text" class="form-control" name="nameArtista"placeholder="Digite nome artista" required title="Artista">
        </div>
         <div class="my-2">
          <label for="" class="form-label">Imagem</label>
          <input type="file" class="form-control" name="FotoArtista"placeholder="Adicione foto artista"  title="Artista">
        </div>
          <input type="hidden" class="form-control" name="idUser" value="1"required>
        <button class="btn btn-danger" name="acao" value="cadastraArtista">Registrar</button>
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
  header("location:../../");
}
 ?>