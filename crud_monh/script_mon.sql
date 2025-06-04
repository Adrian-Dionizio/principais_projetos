-- Tabela de elementos/armas que serão atribuídos aos caçadores
CREATE TABLE elementosArmas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo ENUM('Fogo', 'Gelo', 'Água', 'Dragão', 'Raio') NOT NULL
);

-- Tabela de gatos relacionada com caçador
CREATE TABLE gato (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(100),
    genero ENUM('Masculino', 'Feminino', 'Outro') NOT NULL
);

-- Tabela de caçadores
CREATE TABLE cacador (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    arma VARCHAR(100),
    genero CHAR(1) NOT NULL,
    gato_id INT,
    elementosArmas_id INT,
    FOREIGN KEY (gato_id) REFERENCES gato(id) ON DELETE CASCADE,
    FOREIGN KEY (elementosArmas_id) REFERENCES elementosArmas(id) ON DELETE CAS
);  