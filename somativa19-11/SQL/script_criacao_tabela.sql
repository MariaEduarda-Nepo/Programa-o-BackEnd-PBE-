-- Script SQL para criação do banco de dados e tabela
-- Sistema de Gerenciamento de Livros da Biblioteca Escolar
-- SENAI "Luiz Varga" - 2DEVT

-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS biblioteca_escolar CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Usar o banco de dados
USE biblioteca_escolar;

-- Criar tabela de livros
CREATE TABLE IF NOT EXISTS livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    autor VARCHAR(150) NOT NULL,
    ano INT NOT NULL,
    genero VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserir dados de exemplo (opcional)
INSERT INTO livros (titulo, autor, ano, genero, quantidade) VALUES
('Dom Casmurro', 'Machado de Assis', 1899, 'Romance', 5),
('O Cortiço', 'Aluísio Azevedo', 1890, 'Romance', 3),
('Grande Sertão: Veredas', 'Guimarães Rosa', 1956, 'Romance', 4),
('1984', 'George Orwell', 1949, 'Ficção Científica', 7),
('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 1943, 'Fantasia', 10),
('Harry Potter e a Pedra Filosofal', 'J.K. Rowling', 1997, 'Fantasia', 8),
('O Senhor dos Anéis', 'J.R.R. Tolkien', 1954, 'Fantasia', 6),
('Memórias Póstumas de Brás Cubas', 'Machado de Assis', 1881, 'Romance', 4),
('A Revolução dos Bichos', 'George Orwell', 1945, 'Ficção', 5),
('Vidas Secas', 'Graciliano Ramos', 1938, 'Romance', 3);

-- Consultar todos os livros
SELECT * FROM livros ORDER BY titulo;

-- Consultar total de exemplares
SELECT SUM(quantidade) as total_exemplares FROM livros;

-- Consultar livros por gênero
SELECT genero, COUNT(*) as quantidade_titulos, SUM(quantidade) as total_exemplares 
FROM livros 
GROUP BY genero 
ORDER BY quantidade_titulos DESC;