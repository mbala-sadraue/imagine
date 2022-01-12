<?php 
require_once "connection.php";


class Ep extends Connected
{



  //CADASTRA ALBUM
  public function cadastraEp($dados = array(),$nomeEp)
  {
    try {
      $search =  $this->con->prepare("SELECT * FROM `ep` WHERE NomeEp = ?");
      $search->bindValue(1,$nomeEp);
      $search->execute();
      if ($search->rowCount() > 0) {
        header("location:../../");
        exit();
      } else {

        $cadastra = $this->con->prepare("INSERT INTO ep  VALUES(DEFAULT,?,?,?,?,?,?,?)");

        foreach ($dados as $k => $v) {
        $cadastra->bindValue($k, $v);
        }
        $cadastra->execute();

        if ($cadastra->rowCount() == 1) {
          header("location:../../");
        } else {
          //header("location:../../");
        }
    }
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }

  //CADASTRA ALBUM
  public function updateEp($dados = array(), $nomeEp)
  {
    try {
     

      $update = $this->con->prepare("UPDATE `ep` SET `NomeEp` =?, `DLancamento`=?,`DUpdated`=?,	EpImagem=? WHERE `idEp` =?");

      foreach ($dados as $k => $v) {
        $update->bindValue($k, $v);
      }
      $update->execute();

      if ($update->rowCount() == 1) {
        header("location:../../");
      } else {
         header("location:../../");
       
      }
    
    } catch (PDOException $e) {
      echo "Erro " . $e->getMessage();
    }
  }


  //CONTAR QUANTOS ALBUM FAZ PARTE DE UMA DETERMINADA ARTISTA

  public function contarEpArtista($idArtista)
  {


    try{
        $contar   = $this->con->prepare("SELECT COUNT(*)FROM ep WHERE idArtista= ?");
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

  

  // LISTAR ALBUM DE UM DETERMINADADOS ARTISTA

   public function listarEpArtista($idArtista)
  {


    try{
        $contar   = $this->con->prepare("SELECT * FROM ep WHERE idArtista= ? ORDER BY DLancamento DESC");
        $contar->bindValue(1,$idArtista);
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

  public function deletaArista($id)
  {
    try {

      
      // DELETA MUSICA
      $deMusica = $this->con->prepare("DELETE FROM `musica` WHERE  Ep = ?");
      $deMusica->bindValue(1, $id);
      $deMusica->execute();


      $delete = $this->con->prepare("DELETE FROM `ep` WHERE idEp = ?");
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

  public function listarEpId($idAlbum, $public)
  {

    try {

      $listar = $this->con->prepare("SELECT * FROM ep WHERE idEp = ? AND `Status` =?  ");
      $listar->bindValue(1, $idAlbum);
      $listar->bindValue(2, $public);
      $listar->execute();
      if ($listar->rowCount() > 0
      ) {
        $dados = $listar->fetch(PDO::FETCH_ASSOC);
        return $dados;
      } else {
        return 0;
      }
    } catch (PDOException $e) {

      echo "Erro " . $e->getMessage();
    }
  }


}
?>