-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Maio-2016 às 22:23
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engsw`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE `aula` (
  `CodAula` int(2) NOT NULL,
  `CodDisciplina` int(2) NOT NULL,
  `CodPessoaAluno` int(2) NOT NULL,
  `DataAula` date NOT NULL,
  `LocalAula` varchar(20) NOT NULL,
  `IndicadorAulaRealizadaAluno` varchar(1) NOT NULL,
  `IndicadorAulaRealizadaProfessor` varchar(1) NOT NULL,
  `IndicadorExcluido` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `CodDisciplina` int(2) NOT NULL,
  `NomeDisciplina` varchar(20) NOT NULL,
  `PrecoDisciplina` float NOT NULL,
  `CodPessoa` int(2) NOT NULL,
  `IndicadorExcluido` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`CodDisciplina`, `NomeDisciplina`, `PrecoDisciplina`, `CodPessoa`, `IndicadorExcluido`) VALUES
(2, 'Geografia', 100, 1, 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `CodPessoa` int(2) NOT NULL,
  `NomePessoa` varchar(20) NOT NULL,
  `CPFPessoa` varchar(11) NOT NULL,
  `EmailPessoa` varchar(20) NOT NULL,
  `GeneroPessoa` varchar(1) NOT NULL,
  `EnderecoPessoa` varchar(20) NOT NULL,
  `NumeroPessoa` varchar(5) DEFAULT NULL,
  `BairroPessoa` varchar(20) NOT NULL,
  `CEPPessoa` varchar(9) NOT NULL,
  `TelefonePessoa` varchar(13) NOT NULL,
  `DataNascimentoPessoa` varchar(10) NOT NULL,
  `SenhaPessoa` varchar(32) NOT NULL,
  `SaldoPessoa` decimal(10,2) NOT NULL,
  `IndicadorProfessor` varchar(1) NOT NULL,
  `IndicadorFuncionario` varchar(1) NOT NULL,
  `IndicadorExcluido` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`CodPessoa`, `NomePessoa`, `CPFPessoa`, `EmailPessoa`, `GeneroPessoa`, `EnderecoPessoa`, `NumeroPessoa`, `BairroPessoa`, `CEPPessoa`, `TelefonePessoa`, `DataNascimentoPessoa`, `SenhaPessoa`, `SaldoPessoa`, `IndicadorProfessor`, `IndicadorFuncionario`, `IndicadorExcluido`) VALUES
(1, 'Matheus Michel', '12345678971', 'mat@mat.com', 'M', 'TF', '', 'BF', '90035-201', '33113973', '17/05/2016', '202cb962ac59075b964b07152d234b70', '50.00', 'S', 'N', 'N'),
(2, 'Rafael Allegretti', '12345678910', 'rafa@all.com', '', '', NULL, '0', '0', '', '0000-00-00', '21232f297a57a5a743894a0e4a801fc3', '53.00', 'N', 'N', 'N'),
(4, 'Bruno Freitas', '11111111111', 'bruno@freitas.com', '', '', NULL, '0', '0', '', '0000-00-00', '202cb962ac59075b964b07152d234b70', '0.00', 'N', 'N', 'N'),
(6, 'Alberto Pena', '22222222222', 'bruno@freitas.com', '', '', NULL, '0', '0', '', '0000-00-00', '21232f297a57a5a743894a0e4a801fc3', '0.00', 'S', 'N', 'N'),
(8, 'Hermes Tessaro', '33333333333', 'hermes@tessaro.com', '', '', NULL, '0', '0', '', '0000-00-00', '21232f297a57a5a743894a0e4a801fc3', '0.00', 'N', 'N', 'N'),
(9, 'Michel', '44444444444', 'mic@mic.com', '', '', NULL, '0', '0', '', '0000-00-00', '21232f297a57a5a743894a0e4a801fc3', '0.00', 'N', 'N', 'N'),
(11, 'Michel', '1', '1', 'M', 'Rua A', '1', 'Azenha', '1', '123456', '0000-00-00', '202cb962ac59075b964b07152d234b70', '0.00', 'N', 'N', 'N'),
(12, 'Izabel', '12345678911', 'iza@iza.com', 'F', 'Rua TF', '171', 'BF', '90035-201', '(51) 81913203', '10/08/1956', '202cb962ac59075b964b07152d234b70', '0.00', 'N', 'N', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`CodAula`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`CodDisciplina`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`CodPessoa`),
  ADD UNIQUE KEY `CPFPessoa` (`CPFPessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aula`
--
ALTER TABLE `aula`
  MODIFY `CodAula` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `CodDisciplina` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `CodPessoa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
