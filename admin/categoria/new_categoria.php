<?php 
require_once"../../controller/auth.php";
if($stutsUser==1){
 $title = "Nova categoria";
 require_once "../layout/layout.php";


echo $head;
echo'
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <h2> Adiciona nova categoria</h2>
      <form action="../../App/Database/insertcategoria.php" method="POST">
        <div class="my-2">
          <label for="" class="form-label">Nome Categoria</label>
          <input type="text" class="form-control" name="nameCategory"placeholder="Digite nome categoria" required title="Categoria">
        </div>
          <input type="hidden" class="form-control" name="idUser" value="1"required>
        <button class="btn btn-danger" name="acao" value="cadastraCategoria">Registrar</button>
      </form>
    </div>
  </div>
</div>




  
';


echo $footer;
}else{
  header("location:../../");
}
 ?>
