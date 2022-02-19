<?php 


  if(isset($_POST["busca"])){
      $busca = $_POST["busca"];

      require_once"../App/Models/musica.php";
      $musica = new Musica();
      $limite = 10;
      $dadosPesquisas = $musica->buscaAjaxMusica($busca,$limite);

      
    if($dadosPesquisas){
        $dadoPesquisa = new ArrayIterator($dadosPesquisas);
      
      if(isset($dadoPesquisa->current()->NomeArtista))
      {

        while($dadoPesquisa->valid()){

          echo '
               <li > 
               <a href="perfil_musica.php?id_musica=' . $dadoPesquisa->current()->idMusica . '">

                <span class="text-dark">
                  <span>
                    <img class="rounded" src="photos/capas/'.$dadoPesquisa->current()->ArtistaImagem.'" role="img"/>
                  </span>
                    '. $dadoPesquisa->current()->NomeArtista.'
                  </span> 
                <span class="text-dark">'.$dadoPesquisa->current()->Titulo.'</span>
                </a>
               </li>
          ';

          $dadoPesquisa->next();
        }
      }elseif(isset($dadoPesquisa->current()->Titulo)){
        
        $dadoPesquisa = new ArrayIterator($dadosPesquisas);

        while($dadoPesquisa->valid()){

          echo '
               <li class=""> 
               <a href="perfil_musica.php?id_musica=' . $dadoPesquisa->current()->idMusica . '">'. $dadoPesquisa->current()->Titulo.'</a>
               </li>
          ';

          $dadoPesquisa->next();
        }
      }
     }

  }


  /*
   *   
   * ATUALIZAR A MUSICA MAIS BAIXADA
   * 
   */

  if(isset($_POST["idMusica"]))
  {
    require_once"../App/Models/musica.php";
    $musica = new Musica();
    $id = $_POST["idMusica"]; 
    $musica->atualizarMusicaBaixada($id); 
  }

?>
