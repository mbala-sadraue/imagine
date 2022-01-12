<?php
require_once"../../controller/auth.php"; 
if($stutsUser==1){
if((isset($_GET["id_artista"]) && $_GET["id_artista"]>0) && (isset($_GET["nome_artista"]) && $_GET["nome_artista"] != null)){
  $idArtista = $_GET["id_artista"];
  $nomeArtista= $_GET["nome_artista"];
  $idEp= $_GET["id_ep"];
  $nomeEp= $_GET["nomeEp"];
 $title = $nomeArtista;
 require_once "../layout/layout.php";
 require_once "../../App/Models/ep.php";
 $ep =  new Ep;
  $public  = 1;
  $dadosEp = $ep->listarEpId($idEp, $public);

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
            <option selected>'.$nomeArtista. '</option>
          </select>
        </div>

         <div class="my-2">
          <label for="" class="form-label">Nome Ep</label>
          <input type="text" class="form-control" name="nameEp" value="'.$nomeEp.'"placeholder="Digite nome de Ep" required title="Ep">
        </div>
         <div class="my-2">
          <label for="" class="form-label">Ano lançamento</label>
          <select name="anoLancamento" class="form-control">';
          $toYaer = date("Y")+1;
          for($i= 1970; $i<=$toYaer;$i++){
            $selected = ($toYaer == $i+1)?"selected":"";
            echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
          }
          echo '
          </select>
        </div>

         <div class="my-2">
          <label for="" class="form-label">Imagem</label>
          <input type="file" class="form-control" name="imagemEp"placeholder="Adicione foto artista" title="Artista">'; 
          $foto = $dadosEp["EpImagem"];
          if($foto){
              echo '<img src="../../photos/capas/'.$foto. '" width="100"/>
                <input type="hidden" name="foto_ep" value="'. $foto.'"/>
              ';
          }
          echo '
        </div>
        <input type="hidden" class="form-control" name="idUser" value="1"required>
        <input type="hidden" class="form-control" name="acao" value="editar"required>
        <input type="hidden" class="form-control" name="idEp" value="'.$idEp. '"required>
        <button class="btn btn-danger" name="editarEp" value="editarEp">Registrar</button>
      </form>
    </div>
  </div>
</div>




	
';
echo $footer;
}else{
    header("location:../../login.php");
}

}else{
  header("location:../../login.php");
}
