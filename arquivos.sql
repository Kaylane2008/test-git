-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/10/2024 às 21:13
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `upload`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `data_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `nome` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `path`, `data_upload`, `nome`) VALUES
(5, 'arquivos/671d37b21030f.jpg', '2024-10-26 15:40:50', 'onça test.jpg'),
(6, 'arquivos/671d37b2179eb.jpg', '2024-10-26 15:40:50', 'gato test.jpg'),
(7, 'arquivos/671d37b218f62.jpg', '2024-10-26 15:40:50', 'cachorro test.jpg'),
(9, 'arquivos/671d39a73199a.jpg', '2024-10-26 15:49:11', 'arvores.jpg'),
(10, 'arquivos/671d3b662177a.jpeg', '2024-10-26 15:56:38', 'WhatsApp Image 2024-10-26 at 15.52.55.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
