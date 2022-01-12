<?php
require_once"../../controller/auth.php"; 
if($stutsUser==1){
if((isset($_GET["id_artista"]) && $_GET["id_artista"]>0) && (isset($_GET["nome_artista"]) && $_GET["nome_artista"] != null)){
  $idArtista = $_GET["id_artista"];
  $nomeArtista= $_GET["nome_artista"];
 $title = $nomeArtista;
 require_once "../layout/layout.php";


echo $head;
echo '
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <h3> Adiciona Ep de '.$nomeArtista.'</h3>
      <form action="../../App/Database/insertep.php" method="POST" enctype="multipart/form-data">
        <div class="my-2">
          <label for="" class="form-label">Artista</label>
          <select  class="form-control" name="idArtista" required title="Artista">
            <option value="'.$idArtista.'" selected>'.$nomeArtista. '</option>
          </select>
        </div>

        <div class="my-2">
          <label for="" class="form-label">Nome Ep</label>
          <input type="text" class="form-control" name="nameEp"placeholder="Digite nome de Ep" required title="Ep">
        </div>
         <div class="my-2">
          <label for="" class="form-label">Imagem</label>
          <input type="file" class="form-control" name="imagemEp"placeholder="Digite nome de Ep" required title="Ep">
        </div>
         <div class="my-2">
          <label for="" class="form-label">Ano lançamento</label>
          <select name="anoLancamento" class="form-control">';
          $toYaer = date("Y")+1;
          for($i= 1970; $i<=$toYaer;$i++){
            $selected = ($toYaer == $i+1)?"selected":"";
            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
          }


          echo'
          </select>
        </div>
          <input type="hidden" class="form-control" name="idUser" value="1"required>
        <button class="btn btn-danger" name="acao" value="cadastraEp">Registrar</button>
      </form>
    </div>
  </div>
</div>




	
';
}

echo $footer;
}else{
  header("location:login.php");
}
