<?php 
  /**
   * 
   */

  require_once "connection.php";
  class Artista extends Connected
  {
  	// CADASTRA ARTISTAS
  	public function cadastraArtista ($dados = array(),$nomeArtista)
  	{
  		try {
				$search =  $this->con->prepare("SELECT * FROM `artistas` WHERE NomeArtista = ?");
				$search->bindValue(1,$nomeArtista);
				$search->execute();
				if($search->rowCount()>0){
					header("location:../../");
					exit();
				}else{
  			
					$cadastra = $this->con->prepare("INSERT INTO artistas VALUES(DEFAULT,?,?,?,?,?,?)");

					foreach ($dados as $k => $v) {
						$cadastra->bindValue($k,$v);
					}
					$cadastra->execute();

					if($cadastra->rowCount()==1)
					{
						header("location:../../");
					}else{
					header("location:../../");
					}
				}
  		} catch (PDOException $e){
  			//echo "Erro ".$e->getMessage();
  			
  		}
  	}

  	public function listarArtista($inicio, $por_pagina)
  	{
  		try{

				$listar = $this->con->prepare("SELECT * FROM artistas ORDER BY NomeArtista LIMIT ?,? ");
				$listar->bindValue(1, $inicio, PDO::PARAM_INT);
				$listar->bindValue(2, $por_pagina,PDO::PARAM_INT);
				$listar->execute();
				if($listar->rowCount()>0){
					$dados = $listar->fetchAll(PDO::FETCH_OBJ);
					return $dados;
				}else{
					return 0;
				}

			}catch(PDOException $e){
				//echo "Erro ".$e->getMessage();
			}
  	}
  		public function listarArtistaCategoria($idCat,$inicio,$por_pagina)
  	{
  		try{

				$listar = $this->con->prepare("SELECT * FROM artistas WHERE idCat = ? ORDER BY NomeArtista LIMIT ?,? ");
				$listar->bindValue(1, $idCat);
				$listar->bindValue(2, $inicio, PDO::PARAM_INT);
				$listar->bindValue(3, $por_pagina,PDO::PARAM_INT);
				$listar->execute();
				if($listar->rowCount()>0){
					$dados = $listar->fetchAll(PDO::FETCH_OBJ);
					return $dados;
				}else{
					return 0;
				}

			}catch(PDOException $e){
				//echo "Erro ".$e->getMessage();
			}
  	}

	// RETORNA A QUANTIDADE DE ARTISTAS

	public function contarArtista()
	{
		try {

			$listar = $this->con->prepare("SELECT * FROM artistas ");
		
			$listar->execute();
			if ($listar->rowCount() > 0) {
				$dados = $listar->fetchAll(PDO::FETCH_OBJ);
				return count($dados);
			} else {
				return 0;
			}
		} catch (PDOException $e) {
			echo "Erro " . $e->getMessage();
		}
	}


  



	//LISTAR PELO O SEU ID

	public function listarArtistaId($idArt, $public)
	{

		try {

			$listar = $this->con->prepare("SELECT * FROM artistas WHERE idArt = ? AND Stado =?  ");
			$listar->bindValue(1,$idArt);
			$listar->bindValue(2,$public);
			$listar->execute();
			if ($listar->rowCount() > 0) {
				$dados = $listar->fetch(PDO::FETCH_ASSOC);
				return $dados;
			} else {
				return 0;
			}
		} catch (PDOException $e) {
			echo "Erro " . $e->getMessage();
		}
	}


	//EDITAR ARTISTA

	public function updateArtista($dados = array())
	{

		try {

			$update = $this->con->prepare("UPDATE `artistas` SET `NomeArtista`=?,`ArtistaImagem`=?,`idCat`=?,`DUpdated`= ?WHERE idArt = ?");
			foreach ($dados as $k => $v) {
				$update->bindValue($k, $v);
			}

			$update->execute();
			if ($update->rowCount() ==0) {

				header("location:../../");
			} else {
				header("location:../../");
			}
		} catch (PDOException $e) {
			echo "Erro " . $e->getMessage();
		}
	}




	// ELIMINA ARTISTA  

	public function deletaArista($id)
	{
		try {

			//SELECION ALBUM
			$selAlbum = $this->con->prepare("SELECT DISTINCT (idAlbum) FROM `albums` WHERE idArtista = ?");
			$selAlbum->bindValue(1, $id);
			$selAlbum->execute();
			if($selAlbum->rowCount()>0)
			{
				$idAlbum = $selAlbum->fetchall(PDO::FETCH_OBJ);
				$idAl = new ArrayIterator($idAlbum);

					// APAGA MUSICA E ALBUM
				while($idAl->valid()){
					// DELETA MUSICA
					$deMusica = $this->con->prepare("DELETE FROM `musica` WHERE  Album = ?");
					$deMusica->bindValue(1, $idAl->current()->idAlbum);
					$deMusica->execute();
					$idAl->next();
				}
			}

			// DELETA ALBUM
			$deAl = $this->con->prepare("DELETE FROM `albums` WHERE  idArtista = ?");
			$deAl->bindValue(1,$id);
			$deAl->execute();


			//SELECION EPs
			$selEp= $this->con->prepare("SELECT DISTINCT (idEp) FROM `ep` WHERE idArtista = ?");
			$selEp->bindValue(1,$id
			);
			$selEp->execute();
			if ($selEp->rowCount() > 0) {
				$idEps = $selEp->fetchAll(PDO::FETCH_OBJ);
				$idEp = new ArrayIterator($idEps);

				// APAGA MUSICA E ALBUM
				while ($idEp->valid()) {
					// DELETA MUSICA
					$deMusica = $this->con->prepare("DELETE FROM `musica` WHERE  Ep = ?");
					$deMusica->bindValue(1, $idEp->current()->idEp);
					$deMusica->execute();
					$idEp->next();
				}
			}

			// DELETA ALBUM
			$deAl = $this->con->prepare("DELETE FROM `albums` WHERE  idArtista = ?");
			$deAl->bindValue(1, $id);
			$deAl->execute();




			$delete = $this->con->prepare("DELETE FROM `artistas` WHERE idArt = ?");

			$delete->bindValue(1,$id);
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


	}
 ?>