-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2016 at 09:01 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mostra_tecnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `Id_Autor` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(10) NOT NULL,
  `Usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`Id_Autor`, `Nome`, `Sobrenome`, `Email`, `Senha`, `Usuario`) VALUES
(1, 'abc', 'abc', 'abc@abc.com', '123', 'Autor');

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `Id_Avaliacao` int(11) NOT NULL,
  `Id_Trabalho` int(11) NOT NULL,
  `Id_Revisor` int(11) NOT NULL,
  `Nota_1` int(11) NOT NULL,
  `Nota_2` int(11) NOT NULL,
  `Nota_3` int(11) NOT NULL,
  `Nota_Final` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avaliacao`
--

INSERT INTO `avaliacao` (`Id_Avaliacao`, `Id_Trabalho`, `Id_Revisor`, `Nota_1`, `Nota_2`, `Nota_3`, `Nota_Final`) VALUES
(1, 1, 1, 4, 4, 4, 4),
(2, 2, 3, 2, 2, 2, 2),
(3, 3, 3, 3, 3, 3, 3),
(4, 4, 3, 3, 3, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cnpq`
--

CREATE TABLE `cnpq` (
  `Id_Area` int(11) NOT NULL,
  `Area` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cnpq`
--

INSERT INTO `cnpq` (`Id_Area`, `Area`) VALUES
(1, 'Matemática '),
(2, 'Informática'),
(3, 'Astronomia'),
(4, 'Física '),
(5, 'Química'),
(6, 'Biologia'),
(7, 'Agronomia'),
(8, 'Medicina'),
(9, 'Arquitetura'),
(10, 'Filosofia'),
(11, 'Sociologia'),
(12, 'Geografia'),
(13, 'História'),
(14, 'Linguística');

-- --------------------------------------------------------

--
-- Table structure for table `organizador`
--

CREATE TABLE `organizador` (
  `Id_Organizador` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Senha` varchar(10) NOT NULL,
  `Usuario` varchar(30) NOT NULL DEFAULT 'Organizador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizador`
--

INSERT INTO `organizador` (`Id_Organizador`, `Nome`, `Sobrenome`, `Email`, `Senha`, `Usuario`) VALUES
(1, 'Teste', 'Teste', 'teste@teste.com', '123', 'Organizador');

-- --------------------------------------------------------

--
-- Table structure for table `revisor`
--

CREATE TABLE `revisor` (
  `Id_Revisor` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Senha` int(11) NOT NULL,
  `Id_Area` int(11) NOT NULL,
  `Usuario` varchar(30) NOT NULL DEFAULT 'Revisor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revisor`
--

INSERT INTO `revisor` (`Id_Revisor`, `Nome`, `Sobrenome`, `Email`, `Senha`, `Id_Area`, `Usuario`) VALUES
(1, 'Der', 'Der', 'der@der.com', 123, 14, 'Revisor'),
(2, 'Jar', 'Jar', 'jar@jar.com', 123, 14, 'Revisor'),
(3, 'Cer', 'Cer', 'cer@cer.com', 123, 2, 'Revisor'),
(4, 'Far', 'Far', 'far@far.com', 123, 2, 'Revisor');

-- --------------------------------------------------------

--
-- Table structure for table `trabalho`
--

CREATE TABLE `trabalho` (
  `Titulo` varchar(50) NOT NULL,
  `Autor` varchar(30) NOT NULL,
  `Area` varchar(30) NOT NULL,
  `Resumo` mediumtext NOT NULL,
  `Id_Autor` int(11) NOT NULL,
  `Id_Trabalho` int(11) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Revisor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trabalho`
--

INSERT INTO `trabalho` (`Titulo`, `Autor`, `Area`, `Resumo`, `Id_Autor`, `Id_Trabalho`, `Estado`, `Revisor`) VALUES
('Portas Abertas', 'Eu', 'Linguística', 'Nenhum.', 1, 1, 'Aprovado', '1'),
('Mario Bros', 'Eu', 'Informática', 'Nenhum.', 1, 2, 'Reprovado', '3'),
('Filmes Interativos', 'Eu', 'Informática', 'Nenhum.', 1, 3, 'Avaliado', '3'),
('Desgin Gráfico', 'Eu', 'Informática', 'Nenhum.', 1, 4, 'Aprovado', '3'),
('Literatura', 'Eu', 'Linguística', 'Nenhum.', 1, 5, 'Encaminhado', '1'),
('Exatas Aplicada', 'Eu', 'Matemática ', 'Nenhum.', 1, 6, 'Pendente', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Id_Autor`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`Id_Avaliacao`);

--
-- Indexes for table `cnpq`
--
ALTER TABLE `cnpq`
  ADD PRIMARY KEY (`Id_Area`);

--
-- Indexes for table `organizador`
--
ALTER TABLE `organizador`
  ADD PRIMARY KEY (`Id_Organizador`);

--
-- Indexes for table `revisor`
--
ALTER TABLE `revisor`
  ADD PRIMARY KEY (`Id_Revisor`),
  ADD KEY `Id_Area` (`Id_Area`);

--
-- Indexes for table `trabalho`
--
ALTER TABLE `trabalho`
  ADD PRIMARY KEY (`Id_Trabalho`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `Id_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `Id_Avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cnpq`
--
ALTER TABLE `cnpq`
  MODIFY `Id_Area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `organizador`
--
ALTER TABLE `organizador`
  MODIFY `Id_Organizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `revisor`
--
ALTER TABLE `revisor`
  MODIFY `Id_Revisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trabalho`
--
ALTER TABLE `trabalho`
  MODIFY `Id_Trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
