<?php 
	
	

	require_once "connection.php";
	class Categoria extends Connected
	{
		
		

		// CADASTRA A CATEGORIA
		public function cadastraCategoria($dados = array())
		{
			try{

				$cadastra = $this->con->prepare("INSERT INTO categorias VALUES(DEFAULT,?,?,?)");

				foreach($dados as $k => $v)
				{
					$cadastra->bindValue($k,$v);
				}
				$cadastra->execute();

				if($cadastra->rowCount() ==1 ){
					header("location:../../");
				}
			}catch(PDOException $e)
			{
				echo "Erro ".$e->getMessage();
			}

		}

  		// LISTAR CATEGORIAS
		public function listarCategoria()
		{
			try{
				$status = 1;
				$listar = $this->con->prepare("SELECT * FROM categorias  WHERE `Status` = ? ORDER BY NomeCategoria ");
				$listar->bindValue(1,$status);
				$listar->execute();
				if($listar->rowCount()>0){
					$dados = $listar->fetchAll(PDO::FETCH_OBJ);
					return $dados;
				}else{
					return 0;
				}

			}catch(PDOException $e){
				echo "Erro ".$e->getMessage();
			}
		}
		// RETORNAR CATEGORIA PELO SEU ID
		public function listarCategoriaId($id)
		{
			try{

				$listar = $this->con->prepare("SELECT * FROM categorias WHERE `idCat`= ?");
				$listar->bindValue(1,$id);
				$listar->execute();
				if($listar->rowCount()==1){
					$dados = $listar->fetch(PDO::FETCH_ASSOC);
					return $dados;
				}else{
					return 0;
				}

			}catch(PDOException $e){
				echo "Erro ".$e->getMessage();
			}
		}

		public function atualizarCategoria($nomeCategoria,$id)
		{
			try{

				$update = $this->con->prepare("UPDATE categorias  SET `NomeCategoria` = ? WHERE `idCat` = ?");
				$update->bindValue(1,$nomeCategoria);
				$update->bindValue(2,$id);
				$update->execute();
				if($update->rowCount()==1){
					header("location:../../");
				}else{
					header("location:../../");
				}

				}catch(PDOException $e){
					echo "Erro ".$e->getMessage();
			}	
		}



		/*MUDA O VALOR DE  CAMPO DE STATUS*/
		public function atualizarStatus($id)
		{
			try{
				$v = 0;
				$update = $this->con->prepare("UPDATE categorias  SET `Status` = ? WHERE `idCat` = ?");
				$update->bindValue(1,$v);
				$update->bindValue(2,$id);
				$update->execute();
				if($update->rowCount()==1){
					header("location:../../");
				}else{
					header("location:../../");
				}

				}catch(PDOException $e){
					echo "Erro ".$e->getMessage();
			}	
		}
	
	




	}
	
 ?>