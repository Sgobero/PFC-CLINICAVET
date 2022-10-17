-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2022 às 00:16
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `clinica_veterinaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(11) NOT NULL,
  `data_consulta` date NOT NULL,
  `horario_consulta` date NOT NULL,
  `descricao` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_consulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idendereco` int(11) NOT NULL,
  `cep` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_residencial` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idendereco`, `cep`, `rua`, `numero_residencial`, `cidade`, `estado`) VALUES
(17, '85864242', 'rua marmoteira', '543', 'Foz do Iguaçu', 'Parana'),
(45, '', '', '', '', ''),
(46, '236544', 'Marmota', '123', 'Foz do Iguaçu', 'Parana'),
(47, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `idpet` int(11) NOT NULL,
  `nome_pet` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade_pet` int(11) NOT NULL,
  `raca` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `consulta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca_pet`
--

CREATE TABLE `raca_pet` (
  `idraca_pet` int(11) NOT NULL,
  `raca` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_pet` enum('cachorro','gato','ave') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `raca_pet`
--

INSERT INTO `raca_pet` (`idraca_pet`, `raca`, `tipo_pet`) VALUES
(5, 'pomerânia', 'cachorro'),
(6, 'bulldog francês', 'cachorro'),
(7, 'shih tzu', 'cachorro'),
(8, 'rottweiler', 'cachorro'),
(9, 'pug', 'cachorro'),
(10, 'golden retriever', 'cachorro'),
(11, 'pastor alemão', 'cachorro'),
(12, 'yorkshire terrier', 'cachorro'),
(13, 'bolder collie', 'cachorro'),
(14, 'SRD (sem raça definida)', 'cachorro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_consulta`
--

CREATE TABLE `tipo_consulta` (
  `idtipo_consulta` int(11) NOT NULL,
  `nome_consulta` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_consulta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_consulta`
--

INSERT INTO `tipo_consulta` (`idtipo_consulta`, `nome_consulta`, `valor_consulta`) VALUES
(1, 'consulta cardiológica', 999),
(2, 'consulta geral', 500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome_usuario` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_usuario` enum('mantenedor','cliente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha_usuario` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome_usuario`, `cpf`, `rg`, `data_nascimento`, `email`, `tipo_usuario`, `senha_usuario`, `endereco`) VALUES
(12, 'Marcos', '323434343', '222333444', '2003-11-29', 'marcos@marcos.com', 'cliente', 'marcos123', 17),
(40, 'matheus', '123', '321', '0000-00-00', 'matheus@matheus.com', 'cliente', '123', 45),
(41, 'iluska', '92837465', '76859403', '2000-07-25', 'iluska@iluska.com', 'cliente', 'iluska123', 46),
(42, '', '4321', '1432', '0000-00-00', '4132', 'cliente', '', 47);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `tipo_consulta_idx` (`tipo_consulta`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idendereco`);

--
-- Índices para tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`idpet`),
  ADD KEY `raca_pet_idx` (`raca`),
  ADD KEY `consulta_idx` (`consulta`),
  ADD KEY `usuario_idx` (`usuario`);

--
-- Índices para tabela `raca_pet`
--
ALTER TABLE `raca_pet`
  ADD PRIMARY KEY (`idraca_pet`);

--
-- Índices para tabela `tipo_consulta`
--
ALTER TABLE `tipo_consulta`
  ADD PRIMARY KEY (`idtipo_consulta`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idEndereco_idx` (`endereco`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idendereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `idpet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `raca_pet`
--
ALTER TABLE `raca_pet`
  MODIFY `idraca_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tipo_consulta`
--
ALTER TABLE `tipo_consulta`
  MODIFY `idtipo_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `tipo_consulta` FOREIGN KEY (`tipo_consulta`) REFERENCES `tipo_consulta` (`idtipo_consulta`);

--
-- Limitadores para a tabela `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `consulta` FOREIGN KEY (`consulta`) REFERENCES `consulta` (`idconsulta`),
  ADD CONSTRAINT `raca_pet` FOREIGN KEY (`raca`) REFERENCES `raca_pet` (`idraca_pet`),
  ADD CONSTRAINT `usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `idEndereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`idendereco`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
