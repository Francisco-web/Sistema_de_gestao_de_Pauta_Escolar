-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Set-2019 às 18:56
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agp_impal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `nome_completo` varchar(30) NOT NULL,
  `num_aluno` varchar(30) NOT NULL,
  `area_formacao` varchar(30) NOT NULL,
  `num_proc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `id_curso`, `id_turma`, `nome_completo`, `num_aluno`, `area_formacao`, `num_proc`) VALUES
(1, 1, 1, 'Francisco André', '20', 'Informática', '31876'),
(2, 1, 2, 'william Quizundo', '14', 'Informática', '31845'),
(3, 2, 4, 'Amadeu Simão Simuel', '32', 'Estações Electrica', '878455');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `nome_classe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classe`
--

INSERT INTO `classe` (`id_classe`, `nome_classe`) VALUES
(1, '10º'),
(2, '11º'),
(3, '12º'),
(4, '13º');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coordenacao`
--

CREATE TABLE `coordenacao` (
  `id_coordenacao` int(11) NOT NULL,
  `nome_coordenacao` varchar(30) NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `coordenador` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `coordenador`) VALUES
(1, 'Técnico de Informática', 'Pedro Massiala'),
(2, 'Técnico de Estalações Electric', 'Vida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `director_pedagogico`
--

CREATE TABLE `director_pedagogico` (
  `id_director_pedagogico` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `nome_dis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `id_curso`, `id_classe`, `nome_dis`) VALUES
(1, 1, 1, 'Matemática'),
(3, 1, 1, 'Física');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disc_curso`
--

CREATE TABLE `disc_curso` (
  `id_disc_curso` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_pauta` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `mac` double NOT NULL,
  `pp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`id_nota`, `id_pauta`, `id_aluno`, `id_professor`, `id_disciplina`, `mac`, `pp`) VALUES
(2, 2, 1, 1, 1, 12, 12),
(3, 2, 1, 1, 1, 12, 12),
(10, 1, 1, 1, 3, 15, 18),
(11, 1, 1, 1, 3, 15, 18);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pauta`
--

CREATE TABLE `pauta` (
  `id_pauta` int(11) NOT NULL,
  `nome_pauta` varchar(255) DEFAULT NULL,
  `id_turma` int(11) NOT NULL,
  `ano_lectivo` year(4) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_trimestre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pauta`
--

INSERT INTO `pauta` (`id_pauta`, `nome_pauta`, `id_turma`, `ano_lectivo`, `id_disciplina`, `id_trimestre`) VALUES
(1, 'Pauta de Física 1', 3, 2019, 3, 1),
(2, NULL, 3, 2019, 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `id_utilizador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `id_disciplina`, `id_utilizador`) VALUES
(1, 3, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `trimestre`
--

CREATE TABLE `trimestre` (
  `id_trimestre` int(11) NOT NULL,
  `nome_trimestre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `trimestre`
--

INSERT INTO `trimestre` (`id_trimestre`, `nome_trimestre`) VALUES
(1, 'I Trimestre'),
(2, 'II Trimestre'),
(3, 'III Trimestre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(30) NOT NULL,
  `director_turma` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`, `director_turma`) VALUES
(1, 'I12BT', 'Sungo Afonso'),
(2, 'I13BT', 'Valdemar Adão'),
(3, 'I10BM', 'Flávio'),
(4, 'EI10AT', 'gomes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id_utilizador` int(11) NOT NULL,
  `nome_completo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sexo` enum('M','F') CHARACTER SET utf8 NOT NULL,
  `num_bi` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(30) CHARACTER SET utf8 NOT NULL,
  `tipo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id_utilizador`, `nome_completo`, `email`, `sexo`, `num_bi`, `telefone`, `tipo`, `senha`) VALUES
(7, 'William Quizundo', 'williamtribal35@gmail.com', 'M', '003837181LA076', '945067075', 'Administrador', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, 'Amadeu Simão Samuel', 'AmadeuSamuel@gmail.com', 'M', '00383331LA0205', '929837954', 'Professor', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `fk_aluno` (`id_curso`),
  ADD KEY `fkey_aluno` (`id_turma`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD PRIMARY KEY (`id_coordenacao`),
  ADD KEY `fk_coordenacao` (`id_utilizador`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `director_pedagogico`
--
ALTER TABLE `director_pedagogico`
  ADD PRIMARY KEY (`id_director_pedagogico`),
  ADD KEY `fk_director_pedagogico` (`id_utilizador`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`),
  ADD KEY `fk_disciplina` (`id_curso`),
  ADD KEY `fkey_disciplina` (`id_classe`);

--
-- Indexes for table `disc_curso`
--
ALTER TABLE `disc_curso`
  ADD PRIMARY KEY (`id_disc_curso`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `fk_nota` (`id_pauta`),
  ADD KEY `fkey_nota` (`id_aluno`),
  ADD KEY `id_disciplina` (`id_disciplina`),
  ADD KEY `id_professor` (`id_professor`);

--
-- Indexes for table `pauta`
--
ALTER TABLE `pauta`
  ADD PRIMARY KEY (`id_pauta`),
  ADD KEY `fk_pauta` (`id_turma`),
  ADD KEY `id_trimestre` (`id_trimestre`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `fk_professor` (`id_utilizador`),
  ADD KEY `fkey_professor` (`id_disciplina`);

--
-- Indexes for table `trimestre`
--
ALTER TABLE `trimestre`
  ADD PRIMARY KEY (`id_trimestre`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id_utilizador`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `num_bi` (`num_bi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coordenacao`
--
ALTER TABLE `coordenacao`
  MODIFY `id_coordenacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `director_pedagogico`
--
ALTER TABLE `director_pedagogico`
  MODIFY `id_director_pedagogico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disc_curso`
--
ALTER TABLE `disc_curso`
  MODIFY `id_disc_curso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pauta`
--
ALTER TABLE `pauta`
  MODIFY `id_pauta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trimestre`
--
ALTER TABLE `trimestre`
  MODIFY `id_trimestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `fkey_aluno` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `coordenacao`
--
ALTER TABLE `coordenacao`
  ADD CONSTRAINT `fk_coordenacao` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`);

--
-- Limitadores para a tabela `director_pedagogico`
--
ALTER TABLE `director_pedagogico`
  ADD CONSTRAINT `fk_director_pedagogico` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`);

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `fk_disciplina` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `fkey_disciplina` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id_classe`);

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota` FOREIGN KEY (`id_pauta`) REFERENCES `pauta` (`id_pauta`),
  ADD CONSTRAINT `fkey_nota` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`);

--
-- Limitadores para a tabela `pauta`
--
ALTER TABLE `pauta`
  ADD CONSTRAINT `fk_pauta` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`),
  ADD CONSTRAINT `pauta_ibfk_1` FOREIGN KEY (`id_trimestre`) REFERENCES `trimestre` (`id_trimestre`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizador` (`id_utilizador`),
  ADD CONSTRAINT `fkey_professor` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
