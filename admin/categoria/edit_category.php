<?php 

require_once "../../controller/auth.php";
if($stutsUser==1 && isset($_GET["id_category"]) && $_GET["id_category"] >0){
require_once "../../App/Models/categoria.php";


  $idCat      = $_GET["id_category"];
  $public    = 1;
  $categorias = new Categoria();
  $dados= $categorias->listarCategoriaId($idCat);
  $title = $dados["NomeCategoria"];
  require_once "../layout/layout.php";
echo $head;

if($dados){
echo'
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <h2>Editar categoria '.$dados["NomeCategoria"].'</h2>
      <form action="../../App/Database/insertcategoria.php" method="POST">
        <div class="my-2">
          <label for="" class="form-label">Nome Categoria</label>
          <input type="text" class="form-control" name="nameCategory" value="'.$dados["NomeCategoria"].'"placeholder="Digite nome categoria" required title="Categoria">
        </div>
          <input type="hidden" class="form-control" name="idUser" value="1"required>
          <input type="hidden" name="idCategoria" value="'.$dados["idCat"].'"/>
        <button class="btn btn-danger" name="acao" value="EditarCategoria">Editar</button>
      </form>
    </div>
  </div>
</div>  ';
}else{
  echo '<h2>Adicione primeiro a categoria</h2>';
}

echo'</div>
  </div>
</div>';
echo $footer;
}else{
  header("location:login.php");
}
