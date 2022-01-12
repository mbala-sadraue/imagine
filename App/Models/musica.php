<?php 

require_once "connection.php";


class Musica extends Connected
{



  //CADASTRA MUSICA

  public function cadastraMusica($dados = array(), $titulo)
  {
    try {

      $search =  $this->con->prepare("SELECT * FROM `musica` WHERE Titulo = ?");
      $search->bindValue(1, $titulo);
      $search->execute();
      if ($search->rowCount() > 0) {
        header("location:../../");
        exit();
      } else {
      $cadastra = $this->con->prepare("INSERT INTO musica  VALUES(DEFAULT,?,?,?,?,?,?,?,?)");

      foreach ($dados as $k => $v) {
       $cadastra->bindValue($k, $v);
      }
      $cadastra->execute();

      if ($cadastra->rowCount() == 1) {
        header("location:../../");
      } else {
          header("location:../../");
      }
    }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }


  // LISTA A MUSICA PELO SEU ID

   public function listarMusicaPeloId($id)
  {


    try{
        $contar   = $this->con->prepare("SELECT * FROM musica WHERE idMusica= ?");
        $contar->bindValue(1,$id);
        $contar->execute();

        if($contar->rowCount() >0){

          $dados = $contar->fetchAll(PDO::FETCH_OBJ);
          return $dados;

        }else{
          return 0;
        }

    }catch(PDOException $e){
        echo "Erro ".$e->getMessage();
    }
  }
  //CONTAR QUANTOS ALBUM FAZ PARTE DE UMA DETERMINADA ARTISTA

  public function contarAlbumArtista($idArtista)
  {


    try{
        $contar   = $this->con->prepare("SELECT COUNT(*)FROM albums WHERE idArtista= ?");
        $contar->bindValue(1,$idArtista);
        $contar->execute();

        if($contar->rowCount() >0){

          $dados = $contar->fetch(PDO::FETCH_ASSOC);
          return $dados["COUNT(*)"];

        }

    }catch(PDOException $e){
        echo "Erro ".$e->getMessage();
    }

  }  


  // LISTA AS MUSICAS DE UM ALBUM DE UMA DETERMINADA ARTISTAS

   public function listarMusicaAlbumArtista($idAlbum)
  {


    try{
        $contar   = $this->con->prepare("SELECT * FROM musica WHERE Album= ?");
        $contar->bindValue(1,$idAlbum);
        $contar->execute();

        if($contar->rowCount() >0){

          $dados = $contar->fetchAll(PDO::FETCH_OBJ);
          return $dados;

        }else{
        	return 0;
        }

    }catch(PDOException $e){
        echo "Erro ".$e->getMessage();
    }

  }

  // LISTA AS MUSICAS DE UM EP DE UMA DETERMINADA ARTISTAS
  public function listarMusicaEpArtista($idEp)
  {


    try {
      $contar   = $this->con->prepare("SELECT * FROM musica WHERE Ep= ?");
      $contar->bindValue(1, $idEp);
      $contar->execute();
      if ($contar->rowCount() > 0
      ) {

        $dados = $contar->fetchAll(PDO::FETCH_OBJ);
        return $dados;
      } else {
        return 0;
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }  



    public function listaCategoriaAlbumArtista($idAlbum)
    {
      try{

        $busca = $this->con->prepare("SELECT * FROM `albums` JOIN artistas ON artistas.idArt= albums.idArtista JOIN categorias ON categorias.idCat = artistas.idCat WHERE albums.idAlbum=?");
        $busca->bindValue(1,$idAlbum);
        $busca->execute();
        if($busca->rowCount()==1){
          $dados = $busca->fetch(PDO::FETCH_ASSOC);
          return $dados;
        }else{
          return 0;
        }

      }catch(PDOException $e){
        echo "Erro ".$e->getMessage();
      }

    }

  public function listaCategoriaEpArtista($idEp)
  {
    try {

      $busca = $this->con->prepare("SELECT * FROM `ep` JOIN artistas ON artistas.idArt= ep.idArtista JOIN categorias ON categorias.idCat = artistas.idCat WHERE ep.idEp=?");
      $busca->bindValue(1, $idEp);
      $busca->execute();
      if ($busca->rowCount() == 1) {
        $dados = $busca->fetch(PDO::FETCH_ASSOC);
        return $dados;
      } else {
        return 0;
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }


  //BUSCA INFORMAÇÕES DE UMA MÚSICA

  public function infoMusica($idMusica,$idAlbum)
  {


    try {
      $contar   = $this->con->prepare("SELECT * FROM `musica` INNER JOIN Albums ON musica.Album= albums.idAlbum JOIN 
      artistas ON artistas.idArt = albums.idArtista JOIN categorias ON artistas.idCat = categorias.idCat 
      WHERE idMusica = ? AND musica.Album =?");
      $contar->bindValue(1, $idMusica,PDO::PARAM_INT);
      $contar->bindValue(2, $idAlbum, PDO::PARAM_INT);
      $contar->execute();

      if ($contar->rowCount() ==1) {

        $dados = $contar->fetch(PDO::FETCH_ASSOC);
        return $dados;
      }else{
        return 0;
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }  


// FAZ UMA BUSCA DA MUSICA

public function buscaAjaxMusica($busca,$limite)
{
    try {
      $b ="%$busca%";
      $buscar   = $this->con->prepare("SELECT * FROM musica INNER JOIN albums ON musica.Album = albums.idAlbum JOIN artistas ON artistas.idArt = albums.idArtista   WHERE Titulo LIKE ? LIMIT ?");
      $buscar->bindValue(1, $b);
      $buscar->bindValue(2, $limite,PDO::PARAM_INT);
      $buscar->execute();

      if ($buscar->rowCount() > 0) {

        $dados = $buscar->fetchAll(PDO::FETCH_OBJ);
        return $dados;
      }else{

        $buscar   = $this->con->prepare("SELECT * FROM artistas  INNER JOIN albums ON artistas.idArt
        = albums.idArtista JOIN musica ON musica.Album = albums.idAlbum WHERE NomeArtista LIKE ? LIMIT ?");
        $buscar->bindValue(1, $b);
        $buscar->bindValue(2, $limite,PDO::PARAM_INT);
        $buscar->execute();
        if ($buscar->rowCount() > 0) {
        $dados = $buscar->fetchAll(PDO::FETCH_OBJ);
        return $dados;
        }else{
          return 0;
        }
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
}

// CONTAR QUANTIDATE DE MUSICAS 
  public function contarMusica()
  {
    try {
      $contar   = $this->con->prepare("SELECT COUNT(*) FROM `musica`");
      $contar->execute();
       if ($contar->rowCount() > 0){

        $dados = $contar->fetch(PDO::FETCH_ASSOC);
         return $dados["COUNT(*)"];
        exit();
      } else {
        return 0;
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }

// LISTAR AS MUSICAS 
  public function listarMusica($inicio,$por_pagina)
  {


    try {
      $contar   = $this->con->prepare("SELECT * FROM `musica` ORDER BY Titulo  LIMIT ?,?");
      $contar->bindValue(1, $inicio,PDO::PARAM_INT);
      $contar->bindValue(2, $por_pagina,PDO::PARAM_INT);
      $contar->execute();
      if (
        $contar->rowCount() > 0
      ) {

        $dados = $contar->fetchAll(PDO::FETCH_OBJ);
        return $dados;
      } else {
        return 0;
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }


// LISTAR AS MUSICAS RECENTES
  public function listarMusicaRecente($limite)
  {


    try {
      $contar   = $this->con->prepare("SELECT * FROM `musica` ORDER BY IdMusica DESC LIMIT ?");
      $contar->bindValue(1, $limite,PDO::PARAM_INT);
      $contar->execute();
      if (
        $contar->rowCount() > 0
      ) {

        $dados = $contar->fetchAll(PDO::FETCH_OBJ);
        return $dados;
      } else {
        return 0;
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }



   // CADASTRA OU ATUALIZA A MUSICA BAIXADA

  public function atualizarMusicaBaixada($idMusica)
  {

    try{
      /**
       * VERIFICA SE JA EXISTE DOWNLOADS DA MUISICA
       * */
        $busca   = $this->con->prepare("SELECT * FROM musicas_baixadas WHERE musica_id= ?");
        $busca->bindValue(1,$idMusica);
        $busca->execute();
        if($busca->rowCount()==1){
            $dados = $busca->fetch(PDO::FETCH_ASSOC);

            $ndownlods = $dados["n_downloads"];
            $nDownlods = $ndownlods + 1;

            $update = $this->con->prepare("UPDATE musicas_baixadas SET `n_downloads` = ? WHERE musica_id = ?");
            $update->bindValue(1,$nDownlods);
            $update->bindValue(2,$idMusica);
            $update->execute();
        }else{

          $nDownlods = 1;
          $status=1;

          $cadastra = $this->con->prepare("INSERT INTO musicas_baixadas VALUES(DEFAULT,?,?,?)");
          $cadastra->bindValue(1,$idMusica);
          $cadastra->bindValue(2,$nDownlods);
          $cadastra->bindValue(3,$status);
          $cadastra->execute();
        }

    }catch(PDOException $e){
        echo "Erro ".$e->getMessage();
    }

  } 

  //CONTAR QUANTOS ALBUM FAZ PARTE DE UMA DETERMINADA ARTISTA

  public function listarMusicaBaixada($limite)
  {


    try{
        $contar   = $this->con->prepare("SELECT * FROM musicas_baixadas ORDER BY `n_downloads` DESC LIMIT ? ");
        $contar->bindValue(1,$limite,PDO::PARAM_INT);
        $contar->execute();
        if($contar->rowCount() >0){

          $dados = $contar->fetchAll(PDO::FETCH_ASSOC);
          foreach($dados as $dado){
            $busca = $this->con->prepare("SELECT * FROM musica WHERE idMusica = ? ");
            $busca->bindValue(1,$dado["musica_id"]);
            $busca->execute();

            if($busca->rowCount()==1){

              $dadosM = $busca->fetch(PDO::FETCH_ASSOC);
             echo '

              <div class="col-md-2 text-center mt-2 ">
                <img class="img-fluid rounded" src="photos/musica/'.$dadosM["Imagem"].'" width="400" height="300" alt="" role="img">
                <p class="fw-light fs-4">Yola araujo</p>
              </div>
             ';
            }else{
              echo "<p>Nenhuma </p>";
            }
          }

        }else{
          echo "<p>Nenhuma</p>";
        }

    }catch(PDOException $e){
        echo "Erro ".$e->getMessage();
    }

  }   

}
?>
