<?php 
require_once "connection.php";


class Album extends Connected
{



  //CADASTRA ALBUM

  public function cadastraAlbum($dados = array(),$nomeAlbum)
  {
    try {
      $search =  $this->con->prepare("SELECT * FROM `albums` WHERE NomeAlbum = ?");
      $search->bindValue(1, $nomeAlbum);
      $search->execute();
      if ($search->rowCount() > 0) {
        header("location:../../");
        exit();
      } else {
      $cadastra = $this->con->prepare("INSERT INTO albums  VALUES(DEFAULT,?,?,?,?,?,?,?)");

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
      header("location:../../");
    }
  }

  //CADASTRA ALBUM

  public function updateAlbum($dados = array(), $nomeAlbum)
  {
    try {
    
      $update = $this->con->prepare("UPDATE `albums` SET `NomeAlbum`=?,`AnoLancamento`=?,`DUpdated`=?,AlbumImagem=? WHERE `idAlbum`=?");

      foreach ($dados as $k => $v) {
        $update->bindValue($k, $v);
      }
      $update->execute();

      if ($update->rowCount() == 1 ){
        header("location:../../");
      } else {
        header("location:../../");
      }
      
    } catch (PDOException $e) {
      header("location:../../");
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
         header("location:../../"); 
    }

  }


  // LISTAR ALBUM DE UM DETERMINADADOS ARTISTA

  public function listarAlbumArtistaId($idArtista)
  {
    try {
      $contar   = $this->con->prepare("SELECT * FROM albums WHERE idArtista= ?  ORDER BY AnoLancamento DESC ");
      $contar->bindValue(1,$idArtista);
      $contar->execute();

      if ($contar->rowCount() > 0
      ) {

        $dados = $contar->fetchAll(PDO::FETCH_OBJ);
        return $dados;
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }  

  // LISTAR ALBUM DE UM DETERMINADADOS ARTISTA

   public function listarAlbumArtista($idArtista,$inicio,$final)
  {
    try{
        $contar   = $this->con->prepare("SELECT * FROM albums WHERE idArtista= ? ORDER BY AnoLancamento DESC LIMIT ?,?");
        $contar->bindValue(1,$idArtista);
        $contar->bindValue(2,$inicio,PDO::PARAM_INT);
        $contar->bindValue(3,$final,PDO::PARAM_INT);

        $contar->execute();

        if($contar->rowCount() >0){

          $dados = $contar->fetchAll(PDO::FETCH_OBJ);
          return $dados;

        }

    }catch(PDOException $e){
        echo "Erro ".$e->getMessage();
    }

  }


  // ELIMINA ARTISTA  

  public function deletaAlbum($id)
  {
    try {

      
      // DELETA MUSICA
      $deMusica = $this->con->prepare("DELETE FROM `musica` WHERE  Album = ?");
      $deMusica->bindValue(1, $id);
      $deMusica->execute();

      // DELETA ALBUM
      $delete = $this->con->prepare("DELETE FROM `albums` WHERE  idAlbum = ?");
      $delete->bindValue(1, $id);
      $delete->execute();
      if ($delete->rowCount() > 0) {
        header("location:../../");
      } else {
        header("location:../../");
      }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }



  //LISTAR PELO O SEU ID

  public function listarAlbumaId($idAlbum, $public)
  {

    try {

      $listar = $this->con->prepare("SELECT * FROM albums WHERE idAlbum = ? AND `Status` =?  ");
      $listar->bindValue(1, $idAlbum);
      $listar->bindValue(2, $public);
      $listar->execute();
      if ($listar->rowCount() > 0) {
        $dados = $listar->fetch(PDO::FETCH_ASSOC);
        return $dados;
      } else {
        return 0;
      }
    } catch (PDOException $e) {

      echo "Erro ".$e->getMessage();
    }
  }
			
}
?>