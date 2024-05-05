-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 05/05/2024 às 10:48
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jaqueli1_bancop1teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `grade_horaria`
--

CREATE TABLE `grade_horaria` (
  `id` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `dia_semana` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `grade_horaria_cadastro`
--

CREATE TABLE `grade_horaria_cadastro` (
  `id` int(11) NOT NULL,
  `nome` text COLLATE utf8_unicode_ci NOT NULL,
  `professores` int(11) NOT NULL,
  `turmas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `grade_horaria_cadastro`
--

INSERT INTO `grade_horaria_cadastro` (`id`, `nome`, `professores`, `turmas`) VALUES
(1, 'Grade 2', 14, 24),
(2, 'Grade 2', 14, 22),
(3, 'Grade 2', 11, 0),
(4, 'Grade 4', 5, 22);

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `hora_1` int(11) NOT NULL,
  `hora_2` int(11) NOT NULL,
  `hora_3` int(11) NOT NULL,
  `hora_4` int(11) NOT NULL,
  `hora_5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios_aulas`
--

CREATE TABLE `horarios_aulas` (
  `id` int(11) NOT NULL,
  `dia_semana` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horario` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disponivel` tinyint(1) DEFAULT NULL,
  `id_professor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `horarios_aulas`
--

INSERT INTO `horarios_aulas` (`id`, `dia_semana`, `horario`, `disponivel`, `id_professor`) VALUES
(34, 'Quarta', '2', 1, 5),
(35, 'Quinta', '4', 1, 5),
(36, 'Quinta', '5', 1, 5),
(37, 'Sexta', '3', 1, 5),
(38, 'Segunda', '1', 1, 11),
(39, 'Segunda', '5', 1, 11),
(40, 'Terça', '2', 1, 11),
(41, 'Terça', '4', 1, 11),
(42, 'Quarta', '3', 1, 11),
(43, 'Quarta', '4', 1, 11),
(44, 'Quinta', '3', 1, 11),
(45, 'Quinta', '4', 1, 11),
(46, 'Sexta', '4', 1, 11),
(47, 'Segunda', '1', 1, 5),
(48, 'Segunda', '4', 1, 5),
(49, 'Terça', '4', 1, 5),
(50, 'Quarta', '4', 1, 5),
(51, 'Quinta', '3', 1, 5),
(52, 'Sexta', '3', 1, 5),
(53, 'Segunda', '3', 1, 14),
(54, 'Terça', '3', 1, 14),
(55, 'Quarta', '3', 1, 14),
(56, 'Quinta', '3', 1, 14),
(57, 'Quinta', '4', 1, 14),
(58, 'Quinta', '5', 1, 14),
(59, 'Sexta', '3', 1, 14),
(60, 'Sexta', '4', 1, 14),
(61, 'Sexta', '5', 1, 14),
(62, 'Segunda', '2', 1, 11),
(63, 'Terça', '2', 1, 11),
(64, 'Quarta', '5', 1, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Professores`
--

CREATE TABLE `Professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hpi` float NOT NULL,
  `hpc` float NOT NULL,
  `hpl` float NOT NULL,
  `hora_semana` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `Professores`
--

INSERT INTO `Professores` (`id`, `nome`, `hpi`, `hpc`, `hpl`, `hora_semana`) VALUES
(5, 'Roberto', 0, 0, 0, 0),
(11, 'Paula', 2, 2, 2, 24),
(14, 'Marcela', 1, 1, 1, 25),
(15, 'Luiz', 1, 1, 1, 24);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Professor_Turma`
--

CREATE TABLE `Professor_Turma` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `nome_professor` text COLLATE utf8_unicode_ci NOT NULL,
  `nome_turma` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `Professor_Turma`
--

INSERT INTO `Professor_Turma` (`id`, `id_professor`, `id_turma`, `nome_professor`, `nome_turma`) VALUES
(13, 15, 23, 'Professor 1', 'Turma 2'),
(14, 5, 42, 'Roberto', 'Turma A'),
(15, 11, 42, 'Paula', 'Turma A'),
(16, 14, 42, 'Marcela', 'Turma A'),
(17, 15, 42, 'Luiz', 'Turma A'),
(18, 11, 43, 'Paula', 'Turma B'),
(19, 14, 43, 'Marcela', 'Turma B'),
(20, 5, 44, 'Roberto', 'Turma C'),
(21, 11, 44, 'Paula', 'Turma C'),
(22, 15, 44, 'Luiz', 'Turma C');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `professor_id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `professor_id`, `data`) VALUES
(42, 'Turma A', 0, '2024-05-04 20:12:10'),
(43, 'Turma B', 0, '2024-05-05 01:37:14'),
(44, 'Turma C', 0, '2024-05-05 01:42:02'),
(45, 'Turma D', 0, '2024-05-05 01:42:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `grade_horaria`
--
ALTER TABLE `grade_horaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_horario` (`id_horario`),
  ADD KEY `id_turma` (`id_turma`),
  ADD KEY `id_professor` (`id_professor`);

--
-- Índices de tabela `grade_horaria_cadastro`
--
ALTER TABLE `grade_horaria_cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `horarios_aulas`
--
ALTER TABLE `horarios_aulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_professor` (`id_professor`);

--
-- Índices de tabela `Professores`
--
ALTER TABLE `Professores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Professor_Turma`
--
ALTER TABLE `Professor_Turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_professor` (`id_professor`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `grade_horaria`
--
ALTER TABLE `grade_horaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `grade_horaria_cadastro`
--
ALTER TABLE `grade_horaria_cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horarios_aulas`
--
ALTER TABLE `horarios_aulas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de tabela `Professores`
--
ALTER TABLE `Professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `Professor_Turma`
--
ALTER TABLE `Professor_Turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `grade_horaria`
--
ALTER TABLE `grade_horaria`
  ADD CONSTRAINT `grade_horaria_ibfk_1` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id`),
  ADD CONSTRAINT `grade_horaria_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id`);

--
-- Restrições para tabelas `horarios_aulas`
--
ALTER TABLE `horarios_aulas`
  ADD CONSTRAINT `fk_id_professor` FOREIGN KEY (`id_professor`) REFERENCES `Professores` (`id`);

--
-- Restrições para tabelas `Professor_Turma`
--
ALTER TABLE `Professor_Turma`
  ADD CONSTRAINT `Professor_Turma_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `Professores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
