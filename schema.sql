-- Arquivo: schema.sql
-- Descrição: Define a estrutura inicial do banco de dados para a Loja de Ferramentas.

-- Garante que o banco de dados seja criado com o charset correto para suportar acentos e caracteres especiais.
CREATE DATABASE IF NOT EXISTS loja_de_ferramentas 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

-- Seleciona o banco de dados para as operações seguintes.
USE loja_de_ferramentas;

-- Tabela para armazenar as categorias das ferramentas.
-- Ex: 'Manuais', 'Elétricas', 'Jardinagem'
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(100) NOT NULL UNIQUE,
  `descricao` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela principal para armazenar as ferramentas.
-- Inclui um relacionamento com a tabela `categorias`.
CREATE TABLE IF NOT EXISTS `ferramentas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(200) NOT NULL,
  `descricao` TEXT,
  `preco` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `categoria_id` INT,
  `imagem_url` VARCHAR(255),
  `disponivel` BOOLEAN NOT NULL DEFAULT TRUE,
  `data_criacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`categoria_id`) 
    REFERENCES `categorias`(`id`) 
    ON DELETE SET NULL -- Se uma categoria for deletada, o campo na ferramenta fica nulo, mas a ferramenta não é apagada.
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabela para armazenar as mensagens enviadas pelo formulário de contato.
CREATE TABLE IF NOT EXISTS `contatos` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `assunto` VARCHAR(200),
  `mensagem` TEXT NOT NULL,
  `lido` BOOLEAN NOT NULL DEFAULT FALSE,
  `data_envio` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserção de dados de exemplo para começar a usar a aplicação.
INSERT INTO `categorias` (`nome`, `descricao`) VALUES
('Ferramentas Elétricas', 'Ferramentas que necessitam de energia elétrica para funcionar.'),
('Ferramentas Manuais', 'Ferramentas operadas manualmente, sem necessidade de energia.'),
('Jardinagem', 'Ferramentas para manutenção de jardins e áreas verdes.');

INSERT INTO `ferramentas` (`nome`, `descricao`, `preco`, `categoria_id`, `imagem_url`) VALUES
('Furadeira de Impacto 500W', 'Ideal para perfurações em alvenaria, madeira e metal.', 199.90, 1, 'https://via.placeholder.com/300x300.png?text=Furadeira'),
('Jogo de Chaves de Fenda (6 peças)', 'Conjunto com os tamanhos mais comuns de chaves Phillips e de Fenda.', 59.90, 2, 'https://via.placeholder.com/300x300.png?text=Chaves+de+Fenda'),
('Tesoura de Poda', 'Lâmina de aço carbono, ideal para podas de galhos pequenos.', 35.50, 3, 'https://via.placeholder.com/300x300.png?text=Tesoura+de+Poda'),
('Parafusadeira a Bateria 12V', 'Compacta e eficiente, com bateria de longa duração.', 299.00, 1, 'https://via.placeholder.com/300x300.png?text=Parafusadeira');

aa