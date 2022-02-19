<?php
$url = "localhost/imagine/";

if ($stutsUser == 1) {
  $yC = '
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle " data-bs-toggle="dropdown">cadastra</a>
      <ul class="dropdown-menu">
        <li class="nav-item"><a href="http://' . $url . '?pg=new_categoria" class="nav-link">Categorias</a></li>
          <li class="nav-item"><a href="admin/artista/new_artista.php" class="nav-link">Artista</a></li>
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
}
$head =
'<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/img/logos/iconeRel.png">

  <!-- Bootstrap CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/bootstrap/css/fontawesome.css" rel="stylesheet">
  <!--   AOS-->
  <link rel="stylesheet" href="assets/js/aos/aos.css" />
  <!--   OWL-->
  <link rel="stylesheet" href="assets/css/owl/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/owl/owl.theme.default.min.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/Magnific-Popup-master/magnific-popup.css" />
  <link href="assets/css/geral.css" rel="stylesheet">
  <!-- Fontawesome -->
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
  <title>'.$title.'</title>

</head>

<body>
  <!-- Nav bar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="http://'.$url.'">
        <img class="img-fluid" src="assets/img/logos/nav150.png" height="50" id="logo_header">
        <!-- Imagine -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/imagine/">Ínicio</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link "  href="http://'.$url.'?pg=musica">Músicas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://'.$url.'?pg=artistas">Artistas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://'.$url.'?pg=category">Categorias</a>
          </li>
          '.$yC.'
          <li class="nav-item">
            <a class="nav-link " href="http://'.$url.'?pg=informacoes">Informações</a>
          </li>
          '.$yL. '
        </ul>
      </div>
    </div>
  </nav>
  <div id="container_geral">
   <div class="container-fluid">
        <div class="row">
          <div class="col-lg-10 offset-lg-1" id="content-section-central">


'
;













$footer =


'
</div>
</div>
</div>
</div>


<footer class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4">

        <a href="#">
        <img class="mb-2" src="assets/img/icones/face.png" alt="" width="35" height="35">
        </a>

        <a href="#">
        <img class="mb-2" src="assets/img/icones/insta.png" alt="" width="35" height="35">
        </a>

        <small class="d-block mb-3 text-muted">
          <span>
          Criado pela <a class="text-dark" href="https://vizuc.com" data-toggle="tooltip" data-placement="Bottom" title="Veja a impresa que fez a  construção deste website">Vizuc</a> |
          </span>
          © 2021</small>

      </div>
      <div class="col-md-4 mt-5 mt-md-0">
        <h5>Imagine</h5>
        <ul class="list-unstyled text-small">
          <li class="mt-1 fw-ligh lead"><a class="text-muted" href="/imagine/">Ínicio</a></li>
          <li class="mt-1 fw-ligh lead"><a class="text-muted" href="http://'.$url.'?pg=musica">Músicas</a></li>
          <li class="mt-1 fw-ligh lead"><a class="text-muted" href="http://'.$url.'?pg=artistas">Artistas</a></li>
          <li class="mt-1 fw-ligh lead"><a class="text-muted" href="http://'.$url.'?pg=category">Categorias</a></li>
          <li class="mt-1 fw-ligh lead"><a class="text-muted" href="http://'.$url.'?pg=informacoes">Informações</a></li>
        </ul>
      </div>
      <div class="col-md-4 mt-5 mt-md-0">
        <h5>Endereço</h5>
        <ul class="list-unstyled text-small">
          <li><span class="fw-ligh pb-2 lead" href="#">
              <img class="mb-2" src="assets/img/icones/telefone.png" alt="" width="25" height="25">
              924 999 423</span></li>
          <li><span class="fw-ligh pb-2 lead" href="#">
              <img class="mb-2" src="assets/img/icones/email.png" alt="" width="25" height="25"> imagine.estudio@imagine.ao</span></li>
            <li><span class="fw-ligh pb-2 lead" href="#">
              <img class="mb-2" src="assets/img/icones/local.png" alt="" width="25" height="25"> Bairro Sagrada Esperança, Travessa da rua da FAPA</span></li>
        </ul>
      </div>
    </div>
  </div>
</footer>

  <!--   jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
  <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <!--      OWL-->
  <script src="assets/js/owl/owl.carousel.min.js"></script>
  <!--      Magnific-Popup-master-->
  <script src="assets/js/Magnific-Popup-master/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/owl/main.js"></script>
  <!-- bootstrap Java script-->
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Ajax-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Isotope-->
  <script src="assets/js/isotope/isotope.pkgd.min.js"> </script>
  <!-- AOS JS -->
  <script src="assets/js/aos/aos.js"></script>
  <script>
    AOS.init({
      duration: 2000,
    });
    var owl =()=> {
      var owl = document.getElementsByClassName("owl-carousel");
      // $(".owl-carousel").owlCarousel({
        owl.owlCarousel({
        items:4,
        loop:true,
        margin:10,
        autoplay:false,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        responsive:{
          0:{
              items:1,
              nav: false
          },
          600:{
              items:6,
              nav: false
          },
          1000:{
              items:10,
              nav: false
          }
        }
      },);
    };
    owl()
  </script>
</body>

</html>

'


;

$head2 =
'<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/img/logos/iconeRel.png">

  <!-- Bootstrap CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/bootstrap/css/fontawesome.css" rel="stylesheet">
  <!--   AOS-->
  <link rel="stylesheet" href="assets/js/aos/aos.css" />
  <!--   OWL-->
  <link rel="stylesheet" href="assets/css/owl/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/owl/owl.theme.default.min.css" />
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/Magnific-Popup-master/magnific-popup.css" />
  <link href="assets/css/geral.css" rel="stylesheet">
  <!-- Fontawesome -->
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
  <title>'.$title.'</title>
</head>

<body>
  <!-- Nav bar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="http://'.$url.'">
        <img class="img-fluid" src="assets/img/logos/nav150.png" height="50" id="logo_header">
        <!-- Imagine -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/imagine/">Ínicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="http://'.$url.'?pg=musica">Músicas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://'.$url.'?pg=artistas">Artistas</a>
          </li>
          '.$yC.'
          <li class="nav-item">
            <a class="nav-link " href="http://'.$url.'?pg=category">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://'.$url.'?pg=informacoes">Informações</a>
          </li>
          '.$yL. '
        </ul>
      </div>
    </div>
  </nav>
  <div id="container_geral">
   <div class="">
        <div >
          <div>


'
;

 ?>
