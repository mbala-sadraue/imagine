<?php 
require_once"controller/auth.php";


if($stutsUser ==1 ){
$title = "adiciona nova música";

echo $head;

echo '
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <h2> Adiciona nova música</h2>
      <form action="/musica/registor_new_music" method="POST" enctype="multipart/form-data">
        <div class="my-2">
          <label for="" class="form-label">Adicione A música</label>
          <input type="file" class="form-control" name="arq_musica" required title="música">
        </div>
        <div class="my-2">
          <label for="" class="form-label">Adicione A imagem</label>
          <input type="file" class="form-control" name="arq_imagem" required>
        </div>
        <div class="my-2">
          <label for="" class="form-label">Tíltulo</label>
          <input type="text" class="form-control" name="titulo_musica" placeholder="Digite título da música" required>
        </div>
        <div class="my-2">
          <label for="" class="form-label">Categoria</label>
          <select name="categoria" id="" class="form-control">
            <option value="1">Kizomba</option>
            <option value="2">Semba</option>
            <option value="3">Kuduro</option>
            <option value="4">Zouk</option>
            <option value="5">Rap</option>
          </select>
        </div>
        <div class="my-2">
          <label for="" class="form-label">Artista</label>
          <input type="text" class="form-control" name="nome_artista" placeholder="Digite nome de artista" required>
        </div>
        <div class="my-2">
          <label for="" class="form-label">Album</label>
          <input type="text" class="form-control" name="nome_album" placeholder="Digite nome de album" required>
        </div>
        <div class="my-2">
          <label for="" class="form-label">Data Lançamento</label>
          <input type="date" class="form-control" name="data_lancamento" required>
        </div>

        <button class="btn btn-danger">Registrar</button>
      </form>
    </div>
  </div>
</div>




  
';



echo $footer;

}else{
  header("location:login.php");
}
 ?>
