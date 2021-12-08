-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Dez-2021 às 19:15
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `new_lc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `identification`
--

CREATE TABLE `identification` (
  `id` int(11) NOT NULL,
  `fantasy_name` varchar(100) NOT NULL,
  `slogan` varchar(190) DEFAULT NULL,
  `icon` varchar(190) DEFAULT NULL,
  `logo` varchar(190) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `identification`
--

INSERT INTO `identification` (`id`, `fantasy_name`, `slogan`, `icon`, `logo`, `registration_date`) VALUES
(1, 'LC Engenharia', 'Entre nesse Geração', 'logo-fold.png', 'logo.png', '2021-12-08 13:25:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `identification`
--
ALTER TABLE `identification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `identification`
--
ALTER TABLE `identification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
