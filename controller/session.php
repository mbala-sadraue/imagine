<?php 

require_once "../App/Models/connection.php";

class Session extends Connected
{
  

public function  logar($user,$pass)
{

  try {
    $perm = 1;
    $logar = $this->con->prepare("SELECT * FROM usuarios WHERE Usuario = ? AND PassUser = ? AND Permissao= ? ");

    $logar->bindValue(1,$user);
    $logar->bindValue(2,$pass);
    $logar->bindValue(3,$perm);

    $logar->execute();

    if($logar->rowCount()==1){
      session_start();
        $dados = $logar->fetch(PDO::FETCH_ASSOC);
        $_SESSION["StutsUser"] = 1;
        $_SESSION["dadosUsuario"] = $dados;
        header("location:../");
        
    }else{
      header("location:../login.php");
    }
    
  } catch (PDOException $e) {
    echo "Erro ".$e->getMessage();
  }
}

}



if ((isset($_POST["acao"]) && $_POST["acao"] == "logar") && (isset($_POST["user"]) && isset($_POST["pw"]))) {
  $usuario = $_POST["user"];
  $password = sha1($_POST["pw"]);
  if ($usuario != null && $password != null) {

    $sessao = new Session();

    $sessao->logar($usuario, $password);
  }
}else{
  echo"mama";
}























?>