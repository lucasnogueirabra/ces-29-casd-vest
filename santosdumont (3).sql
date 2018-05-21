-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Abr-2018 às 03:28
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santosdumont`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mensagem` text NOT NULL,
  `enviado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrevista_casd_2019`
--

CREATE TABLE `entrevista_casd_2019` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `info_1` varchar(40) NOT NULL,
  `info_2` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas_vestibulinho_casd`
--

CREATE TABLE `escolas_vestibulinho_casd` (
  `id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escolas_vestibulinho_casdinho`
--

CREATE TABLE `escolas_vestibulinho_casdinho` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interesseparceiro`
--

CREATE TABLE `interesseparceiro` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `site` varchar(60) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `mensagem` text NOT NULL,
  `enviado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `interessevoluntario`
--

CREATE TABLE `interessevoluntario` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `interesse` varchar(20) NOT NULL,
  `enviado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `curso` varchar(20) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_daniel`
--

CREATE TABLE `professor_daniel` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `content` text,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_danirolopes`
--

CREATE TABLE `professor_danirolopes` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `content` text,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_germano`
--

CREATE TABLE `professor_germano` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `title` text NOT NULL,
  `content` text,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0' COMMENT 'Role 1 = admin, Role 2 = prof, Role 0 = default'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vestibulinho_casdinho_2018`
--

CREATE TABLE `vestibulinho_casdinho_2018` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `RG` varchar(30) NOT NULL,
  `CPF` varchar(30) DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `nascimento` varchar(15) NOT NULL,
  `responsavel` varchar(140) NOT NULL,
  `parentesco` varchar(20) NOT NULL,
  `telefone1` varchar(25) NOT NULL,
  `telefone2` varchar(25) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `necessidade` varchar(40) DEFAULT NULL,
  `serie` int(5) NOT NULL,
  `tipo_escola` varchar(25) NOT NULL,
  `nome_escola` varchar(70) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `conheceu` varchar(50) NOT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `cor` varchar(12) NOT NULL,
  `automoveis` int(4) NOT NULL,
  `empregados` int(4) NOT NULL,
  `maquinas` int(4) NOT NULL,
  `banheiros` int(4) NOT NULL,
  `dvds` int(4) NOT NULL,
  `geladeiras` int(4) NOT NULL,
  `freezers` int(4) NOT NULL,
  `computadores` int(4) NOT NULL,
  `lavaloucas` int(4) NOT NULL,
  `microondas` int(4) NOT NULL,
  `motocicletas` int(4) NOT NULL,
  `secadoras` int(4) NOT NULL,
  `agua` varchar(20) NOT NULL,
  `pavimentacao` varchar(15) NOT NULL,
  `escolaridade_chefe` varchar(40) NOT NULL,
  `data_inscricao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vestibulinho_casd_2018`
--

CREATE TABLE `vestibulinho_casd_2018` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `RG` varchar(30) NOT NULL,
  `CPF` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nascimento` varchar(15) NOT NULL,
  `responsavel` varchar(140) DEFAULT NULL,
  `parentesco` varchar(20) DEFAULT NULL,
  `telefone1` varchar(25) NOT NULL,
  `telefone2` varchar(25) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `necessidade` varchar(40) DEFAULT NULL,
  `escolaridade` varchar(50) NOT NULL,
  `tipo_escola` varchar(25) NOT NULL,
  `nome_escola` varchar(70) NOT NULL,
  `trabalha` tinyint(1) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `ex_aluno` varchar(50) NOT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `cor` varchar(12) NOT NULL,
  `data_inscricao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nota_vestibulinho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vestibulinho_casd_2019`
--

CREATE TABLE `vestibulinho_casd_2019` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `RG` varchar(30) NOT NULL,
  `CPF` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `nascimento` varchar(15) NOT NULL,
  `responsavel` varchar(140) DEFAULT NULL,
  `parentesco` varchar(20) DEFAULT NULL,
  `telefone1` varchar(25) NOT NULL,
  `telefone2` varchar(25) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `necessidade` varchar(40) DEFAULT NULL,
  `escolaridade` varchar(50) NOT NULL,
  `tipo_escola` varchar(25) NOT NULL,
  `nome_escola` varchar(70) NOT NULL,
  `trabalha` tinyint(1) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `ex_aluno` varchar(50) NOT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `cor` varchar(12) NOT NULL,
  `data_inscricao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nota_vestibulinho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vestibulinho_variables`
--

CREATE TABLE `vestibulinho_variables` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `status` varchar(90) NOT NULL,
  `last_change` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrevista_casd_2019`
--
ALTER TABLE `entrevista_casd_2019`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escolas_vestibulinho_casd`
--
ALTER TABLE `escolas_vestibulinho_casd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escolas_vestibulinho_casdinho`
--
ALTER TABLE `escolas_vestibulinho_casdinho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interesseparceiro`
--
ALTER TABLE `interesseparceiro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interessevoluntario`
--
ALTER TABLE `interessevoluntario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indexes for table `professor_daniel`
--
ALTER TABLE `professor_daniel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor_danirolopes`
--
ALTER TABLE `professor_danirolopes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor_germano`
--
ALTER TABLE `professor_germano`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vestibulinho_casdinho_2018`
--
ALTER TABLE `vestibulinho_casdinho_2018`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vestibulinho_casd_2018`
--
ALTER TABLE `vestibulinho_casd_2018`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vestibulinho_casd_2019`
--
ALTER TABLE `vestibulinho_casd_2019`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vestibulinho_variables`
--
ALTER TABLE `vestibulinho_variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `entrevista_casd_2019`
--
ALTER TABLE `entrevista_casd_2019`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `escolas_vestibulinho_casd`
--
ALTER TABLE `escolas_vestibulinho_casd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `escolas_vestibulinho_casdinho`
--
ALTER TABLE `escolas_vestibulinho_casdinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `interesseparceiro`
--
ALTER TABLE `interesseparceiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `interessevoluntario`
--
ALTER TABLE `interessevoluntario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `professor_daniel`
--
ALTER TABLE `professor_daniel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `professor_danirolopes`
--
ALTER TABLE `professor_danirolopes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `professor_germano`
--
ALTER TABLE `professor_germano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vestibulinho_casdinho_2018`
--
ALTER TABLE `vestibulinho_casdinho_2018`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vestibulinho_casd_2018`
--
ALTER TABLE `vestibulinho_casd_2018`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `vestibulinho_casd_2019`
--
ALTER TABLE `vestibulinho_casd_2019`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vestibulinho_variables`
--
ALTER TABLE `vestibulinho_variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `professores_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
