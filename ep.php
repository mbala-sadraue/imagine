<?php

require_once"controller/auth.php"; 
if((isset($_GET["id_artista"]) && $_GET["id_artista"] >0) && ($_GET["nome_artista"]) && $_GET["nome_artista"] != null) 
{
	$nomeArtista = $_GET["nome_artista"];
	$idArt       = $_GET["id_artista"];
require_once "App/Models/ep.php";
$title = "Album de ".$nomeArtista;
require_once "layout/layout.php";

$ep = new Ep();

$dadosEps = $ep->listarEpArtista($idArt);


echo $head;



  echo '
  <div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">';
if($dadosEps){
     echo '
		 <h3> Ep de  ' . $nomeArtista . '</h3> 
		 <table class="table">
      	<thead>
      		<tr>	
      			<td>Ep</td>
      			<td>Ano</td>

      		</tr>
      	</thead>

      	<tbody>';
      	$dadoEp = new arrayIterator($dadosEps);
      	 while($dadoEp->valid())
      	 {

  echo '
  		<tr>
  			<td><a href="">'.$dadoEp->current()->NomeEp.'</a></td>
  			<td>'.$dadoEp->current()->DLancamento.'</td>
  		</tr>
      	';
      	 	$dadoEp->next();
      	 }
echo'
      	</tbody>
      </table>
			
			';
		}else{
			echo
			'
				<div>

							<h4>'.$nomeArtista.' não tem ep cadastrado</h4>
				</div>
			';
		}


    echo'</div>
  </div>
</div>







  ';



echo $footer;

}else
{
	echo "Erro";
}

 ?>
