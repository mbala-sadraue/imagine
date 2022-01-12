<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <title>logar </title>
  <style type="text/css">
  html,body,#formulario{
    height: 100%;
  }
    #formulario{
      background: linear-gradient(to left ,blue,red);
      height: 100%;

    }
    #form{
      background: #fff;
      min-height: 100%;
      border-radius: 50px;
      padding: 50px;
    }
    #box-login{
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      top: 100px;
    }

    #form input{
      padding: 10px;
      border-radius: 20px;
    }
    #form label{
      font-weight: 500;
      color:#69646b;
    }
    #form h2{
      font-size: 26px;
      color: #1d7e88;
      font-weight: 900;
      text-align: center;
      margin-bottom: 30px;
    }
    #form .btn-login{
      background:#1d7e88;
      color: #fff; 
      width: 100%;
      border-radius: 20px;
    }
    .img-login{
      height: 50px;
      text-align: center;
    }

    @media (max-width: 576px) {
      #box-login{
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: relative;
      top: 10px;
      padding: 0 2px;
    }
    #form{

      #margin:0px 20px !important;
      background: #fff;
      min-height: 100%;
      border-radius: 20px;
      padding: 15px;
    }
}
  </style>
</head>

<body>



  <div class="container">
    
  </div>
  <div id="formulario">
    <div class="container">
      <div class="row" id="box-login">
        <form action="controller/session.php" method="post" class="col-lg-4 offset-lg-4" id="form">
            <div class="text-center">
               <img src="assets/img/icon.png" class="img-fluid img-login">
            </div>
            <h2 class="h2">Entrar no imagine</h2>
          <div class="my-4">
            <label for="">Usuario</label>
            <input type="text" class="form-control" name="user" placeholder="digite usuario">
          </div>
          <div class="my-4">
            <label for="">Senha</label>
            <input type="password" class="form-control" name="pw" placeholder="digite senha">
          </div>
          <button type="submit" name="acao" value="logar" class="btn btn-login d-block">Entrar</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>