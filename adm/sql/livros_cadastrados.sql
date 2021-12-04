-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2021 às 21:53
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `miniphp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_livro`
--

CREATE TABLE `tb_livro` (
  `cod_liv` int(11) NOT NULL,
  `cod_ed` int(11) DEFAULT NULL,
  `titulo_liv` varchar(45) DEFAULT NULL,
  `desc_liv` text DEFAULT NULL,
  `img_liv` varchar(45) DEFAULT NULL,
  `valor_liv` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_livro`
--

INSERT INTO `tb_livro` (`cod_liv`, `cod_ed`, `titulo_liv`, `desc_liv`, `img_liv`, `valor_liv`) VALUES
(11, 1, 'Livro dos Beatles ', '', 'Album Abbey Road.png', '1000'),
(13, 1, 'Detective comics #27', 'Primeira aparição do Batman', 'Detective_Comics_27.jpg', '200'),
(14, 2, 'introdução à programação em Python', 'Comece seu desenvolvimento com python', 'Introdução à programação com Python.jpg', '1000'),
(16, 3, 'Aprendendo node', 'Se você busca aumentar seus conhecimentos ou aprender sobre node, esse é o livro certo', 'node.jpg', '200'),
(17, 1, 'Algoritimos e lógica de programação', 'Algoritimos e lógica de programação', 'Algoritimos e lógica de programação.jpg', '200');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD PRIMARY KEY (`cod_liv`),
  ADD KEY `fk_ed` (`cod_ed`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  MODIFY `cod_liv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_livro`
--
ALTER TABLE `tb_livro`
  ADD CONSTRAINT `fk_ed` FOREIGN KEY (`cod_ed`) REFERENCES `tb_editora` (`cod_ed`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
