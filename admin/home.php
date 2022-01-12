<?php
$title = "Home";
require_once "layout/layout.php";

echo $head2;

echo '


<div id="depois-nav" class="">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img class="img-fluid" src="image/img/imagine.png" alt="">
      </div>
    </div>
    <div class="romw">
        <div class="col-md-6 offset-md-3">
          <form action="controller/busca.php" method="get"class="form">
              <div>
                <input type="search" name="search" id="search_top" placeholder="pesquisar" class="form-control py-2">
              </div>
          </form>
          <div id="result_search">

          </div>
        </div>
    </div>
    
    <div class="mt-3">
      <p class="text-center fs-1 fw-bold text-uppercase"> Tudo que voçê imagina sobre a criação e produção musical</p>
    </div>
    <div class="">
      <div class="row row-cols-1 row-cols-sm-3 text-uppercase">
        <div class="col text-center mt-5" data-aos="zoom-in-up">
          <img class="img-fluid" src="image/bootstrap-icons/disc-fill.svg" alt="Bootstrap" width="80" height="80" role="img">
          <h2 class="fw-light text-decoration-underline">Gravação</h2>
        </div>
        <div class="col text-center mt-5" data-aos="zoom-in-up">
          <img class="img-fluid" src="image/bootstrap-icons/hurricane.svg" alt="Bootstrap" width="80" height="80" role="img">
          <h2 class="fw-light text-decoration-underline">Mistura</h2>
        </div>
        <div class="col text-center mt-5" data-aos="zoom-in-up">
          <img class="img-fluid" src="image/bootstrap-icons/soundwave.svg" alt="Bootstrap" width="80" height="80" role="img">
          <h2 class="fw-light text-decoration-underline">Masterização</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Equipamentos -->
<div id="equipamentos" class="py-4">
  <div class="container">
    <div class="mt-3">
      <p class="text-dark fs-1 fw-bold"> Nossos equipamentos</p>
    </div>
    <div class="row row-cols-2 row-cols-md-3">
      <div class="col text-center mt-5">
        <img class="img-fluid" src="image/img/equipamentos/grava.png" width="433" height="200" alt="" role="img">
        <h2 class="fw-light">Gravadores</h2>
      </div>
      <div class="col text-center mt-5">
        <img class="img-fluid" src="image/img/equipamentos/mix.png" width="326" height="200" alt="" role="img">
        <h2 class="fw-light">Mixers</h2>
      </div>
      <div class="col text-center mt-5">
        <img class="img-fluid" src="image/img/equipamentos/micro.png" width="292" height="200" alt="" role="img">
        <h2 class="fw-light">Microfones</h2>
      </div>
      <div class="col text-center mt-5">
        <img class="img-fluid" src="image/img/equipamentos/compre.png" width="420" height="200" alt="" role="img">
        <h2 class="fw-light">Compressores</h2>
      </div>
      <div class="col text-center mt-5">
        <img class="img-fluid" src="image/img/equipamentos/moni.png" width="289" height="200" alt="" role="img">
        <h2 class="fw-light">Monitores</h2>
      </div>
      <div class="col text-center mt-5">
        <img class="img-fluid" src="image/img/equipamentos/instru.png" width="355" height="200" alt="" role="img">
        <h2 class="fw-light">Instrumentos</h2>
      </div>
    </div>
    <!-- <div class="row mt-4 row-cols-1 row-cols-sm-3">
                <div class="col text-center mt-5">
                    <img class="img-fluid" src="image/img/equipamentos/compre.png" width="420" height="200" alt="" role="img">
                    <h2 class="fw-light">Compressores</h2>
                </div>
                <div class="col text-center mt-5">
                    <img class="img-fluid" src="image/img/equipamentos/moni.png" width="289" height="200" alt="" role="img">
                    <h2 class="fw-light">Monitores</h2>
                </div>
                <div class="col text-center mt-5">
                    <img class="img-fluid" src="image/img/equipamentos/instru.png" width="355" height="200" alt="" role="img">
                    <h2 class="fw-light">Instrumentos</h2>
                </div>
            </div> -->
  </div>
</div>
<!-- Estudio -->
<div id="estudio" class="py-4">
  <div class="container">
    <div class="">
      <p class="text-dark fs-1 fw-bold"> Nosso estúdio</p>
      <p class="text-dark fs-4 fw-light"> Nosso estúdio com equipamentos recentes, para lhe dar o melhor que há na música </p>
    </div>
    <div class="row row-cols-2 row-cols-md-3">
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/estudio/estudio.png" width="400" height="300" alt="" role="img">
        <!-- <h2 class="fw-light">Gravadores</h2> -->
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/estudio/estudio.png" width="400" height="300" alt="" role="img">
        <!-- <h2 class="fw-light">Mixers</h2> -->
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/estudio/estudio.png" width="400" height="300" alt="" role="img">
        <!-- <h2 class="fw-light">Microfones</h2> -->
      </div>
    </div>
    <div class="row row-cols-2 row-cols-md-3">
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/estudio/estudio.png" width="400" height="300" alt="" role="img">
        <!-- <h2 class="fw-light">Gravadores</h2> -->
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/estudio/estudio.png" width="400" height="300" alt="" role="img">
        <!-- <h2 class="fw-light">Mixers</h2> -->
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/estudio/estudio.png" width="400" height="300" alt="" role="img">
        <!-- <h2 class="fw-light">Microfones</h2> -->
      </div>
    </div>
  </div>
</div>
<!-- Musicas Populares -->
<div id="musicas-populares" class="py-4">
  <div class="container">
    <p class="text-dark fs-1 fw-bold">Músicas populares</p>
  </div>
  <div class="owl-carousel owl-theme owl-loaded">
    <div class="element-item">
      <a href="image/img/musicas-recente/puto.jpeg" class="popup-link">
        <img class="img-fluid rounded" src="image/img/musicas-recente/puto.jpeg" role="img">
      </a>
    </div>
    <div class="element-item">
      <a href="image/img/musicas-recente/ana2.jpeg" class="popup-link">
        <img class="img-fluid rounded" src="image/img/musicas-recente/puto.jpeg" role="img">
      </a>
    </div>
    <div class="element-item">
      <a href="image/img/musicas-recente/puto.jpeg" class="popup-link">
        <img class="img-fluid rounded" src="image/img/musicas-recente/puto.jpeg" role="img">
      </a>
    </div>
    <div class="element-item">
      <a href="image/img/musicas-recente/puto.jpeg" class="popup-link">
        <img class="img-fluid rounded" src="image/img/musicas-recente/puto.jpeg" role="img">
      </a>
    </div>
  </div>
</div>
<!-- Musicas recentes -->
<div id="musicas-recentes" class="py-4">
  <div class="container">
    <div class="">
      <p class="text-dark fs-1 fw-bold">Músicas recentes</p>
    </div>
    <div class="row row-cols-2 row-cols-md-4">
      <div class="col-3 text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/puto.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Puto portugues</p>
      </div>
      <div class="col-3 text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/puto.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Puto portugues</p>
      </div>
      <div class="col-3 text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/puto.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Puto portugues</p>
      </div>
      <div class="col-3 text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/puto.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Puto portugues</p>
      </div>
    </div>
    <div class="row row-cols-2 row-cols-md-4">
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/ana2.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Ana joice</p>
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/ana2.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Ana joice</p>
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/ana2.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Ana joice</p>
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/ana2.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Ana joice</p>
      </div>
    </div>
  </div>
</div>
<!-- Musicas mais baixadas -->
<div id="musicas-mais-baixadas" class="py-4">
  <div class="container">
    <div class="">
      <p class="text-dark fs-1 fw-bold">Músicas mais baixadas</p>
    </div>
    <div class="row row-cols-2 row-cols-md-4">
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/yola.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Yola araujo</p>
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/yola.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Yola araujo</p>
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid rounded" src="image/img/musicas-recente/yola.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Yola araujo</p>
      </div>
      <div class="col text-center mt-2">
        <img class="img-fluid" src="image/img/musicas-recente/yola.jpeg" width="400" height="300" alt="" role="img">
        <p class="fw-light fs-4">Yola araujo</p>
      </div>
    </div>
  </div>
</div>




';






echo $footer;

?>
<script type="text/javascript" src="assets/js/main/jquery.js"></script>
<script type="text/javascript" src="assets/js/main/main.js"></script>