-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jan-2022 às 17:11
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imagine`
--
CREATE DATABASE IF NOT EXISTS `imagine` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `imagine`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `albums`
--

CREATE TABLE `albums` (
  `idAlbum` int(11) NOT NULL,
  `NomeAlbum` varchar(200) NOT NULL,
  `AnoLancamento` year(4) NOT NULL,
  `idArtista` int(11) NOT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '1',
  `AlbumImagem` varchar(250) NOT NULL DEFAULT 'photo_padrao.png',
  `DCreated` timestamp NULL DEFAULT current_timestamp(),
  `DUpdated` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela `artistas`
--

CREATE TABLE `artistas` (
  `idArt` int(11) NOT NULL,
  `NomeArtista` varchar(200) NOT NULL,
  `ArtistaImagem` varchar(250) NOT NULL,
  `Stado` enum('0','1') NOT NULL DEFAULT '1',
  `idCat` int(11) NOT NULL,
  `DCreated` timestamp NULL DEFAULT current_timestamp(),
  `DUpdated` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCat` int(11) NOT NULL,
  `NomeCategoria` varchar(200) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela `ep`
--

CREATE TABLE `ep` (
  `idEp` int(11) NOT NULL,
  `NomeEp` varchar(200) NOT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '1',
  `idArtista` int(11) NOT NULL,
  `DLancamento` year(4) NOT NULL,
  `EpImagem` varchar(200) NOT NULL DEFAULT 'photo_ep_padrao.jpg',
  `DCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela `musica`
--

CREATE TABLE `musica` (
  `idMusica` int(11) NOT NULL,
  `Titulo` varchar(200) NOT NULL,
  `Musica` varchar(300) NOT NULL,
  `Imagem` varchar(300) NOT NULL,
  `Album` int(11) DEFAULT NULL,
  `Ep` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `DCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `DUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estrutura da tabela `musicas_baixadas`
--

CREATE TABLE `musicas_baixadas` (
  `id_baixada` int(11) NOT NULL,
  `musica_id` int(11) NOT NULL,
  `n_downloads` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL,
  `NameUser` varchar(150) NOT NULL,
  `Usuario` varchar(100) NOT NULL,
  `PassUser` varchar(180) NOT NULL,
  `Permissao` enum('1','2') NOT NULL,
  `DCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DUpdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `NameUser`, `Usuario`, `PassUser`, `Permissao`, `DCreated`, `DUpdate`) VALUES
(1, 'Emanuel ', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', '2021-12-17 09:38:25', '2021-12-22 07:25:29');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`idAlbum`),
  ADD KEY `idArtista` (`idArtista`);

--
-- Índices para tabela `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`idArt`),
  ADD KEY `idCat` (`idCat`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCat`);

--
-- Índices para tabela `ep`
--
ALTER TABLE `ep`
  ADD PRIMARY KEY (`idEp`),
  ADD KEY `idArtista` (`idArtista`);

--
-- Índices para tabela `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`idMusica`),
  ADD KEY `Album` (`Album`);

--
-- Índices para tabela `musicas_baixadas`
--
ALTER TABLE `musicas_baixadas`
  ADD PRIMARY KEY (`id_baixada`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `albums`
--
ALTER TABLE `albums`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `artistas`
--
ALTER TABLE `artistas`
  MODIFY `idArt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ep`
--
ALTER TABLE `ep`
  MODIFY `idEp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `musica`
--
ALTER TABLE `musica`
  MODIFY `idMusica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `musicas_baixadas`
--
ALTER TABLE `musicas_baixadas`
  MODIFY `id_baixada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`idArtista`) REFERENCES `artistas` (`idArt`);

--
-- Limitadores para a tabela `artistas`
--
ALTER TABLE `artistas`
  ADD CONSTRAINT `artistas_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `categorias` (`idCat`);

--
-- Limitadores para a tabela `ep`
--
ALTER TABLE `ep`
  ADD CONSTRAINT `ep_ibfk_1` FOREIGN KEY (`idArtista`) REFERENCES `artistas` (`idArt`);

--
-- Limitadores para a tabela `musica`
--
ALTER TABLE `musica`
  ADD CONSTRAINT `musica_ibfk_1` FOREIGN KEY (`Album`) REFERENCES `albums` (`idAlbum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
