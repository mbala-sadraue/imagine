<?php 
require_once"../../controller/auth.php";
if($stutsUser==1){
  require_once "../../App/Models/categoria.php";
 $title = "Categorias";
 require_once "../layout/layout.php";
echo $head;
$categorias  = new Categoria();
$dados =  $categorias->listarCategoria();

echo
'
<div class="container">
  <div class="page-head my-2">
    <h2>Categorias</h2>
  </div>
  <table class="table">
    <thaed>';
  if($dados){
    $categoria   = new arrayIterator($dados);
    while($categoria->valid())
    {
      echo'
      <tr>
        <td class="tabela-tr">
          <span>'.$categoria->current()->NomeCategoria.'
          </span>
          <span class="text-rigth">
             <a href="edit_category.php?id_category='.$categoria->current()->idCat. '" class="mx-2">
                  <i class=" fa fa-edit fa-icon"></i>
              </a>
              <a href="../../App/Database/insertcategoria.php?id_category=' .$categoria->current()->idCat. '&acao=delete" class="mx-2">
              <i class="fa fa-times fa-icon"></i>
             </a> 
          </span>
        </td>
      </tr>';
      $categoria->next();
    }
  }else{
    echo '<tr>
            <td>
              não tem registro de categoria  
            </td>
          </tr>';
  }
echo'   </thead>
  </table
</div>
';

echo $footer;
}else{
  header("location:../../");
}
 ?>
