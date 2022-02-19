<?php
$url = "localhost/imagine/admin/";

if ($stutsUser == 1) {
  $user = '<li class="nav-item" > <a class="nav-link fw-bold">'.$nomeUser.'</a></li>';
  $yC = '
    <li class="nav-item">
            <a class="nav-link" href="http://'.$url.'categoria/category.php">Categoria</a>
          </li>
    <li class="nav-item dropdown">
      <a href="" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">Cadastra</a>
      <ul class="dropdown-menu">
        <li class="nav-item"><a href="http://' . $url . 'categoria/new_categoria.php" class="nav-link">Categoria</a></li>
          <li class="nav-item"><a href="http://' . $url . 'artista/new_artista.php" class="nav-link">Artista</a></li>
      </ul>
    </li>';
    $yL = '
    
      <li class="nav-item">
        <a class="nav-link"  href="http://'.$url.'destroy.php?&terminar=terminar_sessao">Sair</a>
      </li>
    ';
}else{
  $yC = '';
  $yL='';
  $user = '';
}
$head =
'<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/bootstrap/css/fontawesome.css" rel="stylesheet">
  <!--   AOS-->
  <link rel="stylesheet" href="../assets/js/aos/aos.css" />
  <!--   OWL-->
  <link rel="stylesheet" href="../assets/css/owl/owl.carousel.min.css" />
  <link rel="stylesheet" href="../assets/css/owl/owl.theme.default.min.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/Magnific-Popup-master/magnific-popup.css" />
  <link href="../../assets/css/geral.css" rel="stylesheet">
  <link href="../assets/css/home.css" rel="stylesheet">
  <!-- Fontawesome -->
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
  <title>'.$title.'</title>
  <style type="text/css">
      #header_admin{

        background:#c72020 !important;
      }
       .navbar-light .navbar-nav .nav-link {
          color: #fff;
      }
      
      .navbar-light .navbar-nav .dropdown-menu .nav-link{
          color:#000;
      }

  </style>
</head>

<body>
  <!-- Nav bar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light" id="header_admin">
    <div class="container-fluid">
     
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
         '.$user.'
         <li class="nav-item">
            <a class="nav-link">|</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://'.$url.'?pg=artistas">Artistas</a>
          </li>
          '.$yC.'
          '.$yL.'
          
        </ul>
      </div>
    </div>
  </nav>
  <div id="container_geral">



'
;













$footer =


'
	</div>

  <!--   jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="../../assets/js/jquery-3.3.1.slim.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <!--      OWL-->
  <script src="../../assets/js/owl/owl.carousel.min.js"></script>
  <!--      Magnific-Popup-master-->
  <script src="../../assets/js/Magnific-Popup-master/jquery.magnific-popup.min.js"></script>
  <script src="../../assets/js/owl/main.js"></script>
  <!-- bootstrap Java script-->
  <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Ajax-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Isotope-->
  <script src="../../assets/js/isotope/isotope.pkgd.min.js"> </script>
  <!-- AOS JS -->
  <script src="../../assets/js/aos/aos.js"></script>
  <script>
    AOS.init({
      duration: 2000,
    });
  </script>
</body>

</html>

'


;


 ?>