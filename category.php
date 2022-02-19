<?php 
require_once "controller/auth.php";
require_once "App/Models/categoria.php";

$title = "Categorias";
$activoCat = "active";
require_once "layout/layout.php";
$categorias  = new Categoria();
$dados =  $categorias->listarCategoria();
echo $head;


echo
'
<div class="container py-4">
	<div class="page-head my-2">
		<h2>Categorias</h2>
	</div>
	<table class="table">
		<thaed>';
	if($dados){
		$categoria   = new arrayIterator($dados);
		while($categoria->valid())
		{
	    echo'<tr>
				<td><a class="text-dark" href="artista_categoria.php?idCat='.$categoria->current()->idCat.'">'.$categoria->current()->NomeCategoria.'</a></td>
			</tr>';
			$categoria->next();
		}
	}else{
		echo '<tr><td>não tem registro de categoria</td></tr>';
	}
echo'   </thead>
	</table
</div>
';
echo $footer;

 ?>