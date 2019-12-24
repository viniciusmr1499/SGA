CREATE SCHEMA IF NOT EXISTS `sga` DEFAULT CHARACTER SET utf8 ;
USE `sga` ;

-- -----------------------------------------------------
-- Table `sga`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sga`.`usuarios` (
  `matricula` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `setor` VARCHAR(45) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  `nivel` INT NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `data_de_criacao` DATETIME NOT NULL,
  `data_de_atualizacao` DATETIME NOT NULL,
  PRIMARY KEY (`id_usuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sga`.`materiais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sga`.`materiais` (
  `id_material` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(10) UNIQUE NOT NULL,
  `equipamento` VARCHAR(45) NOT NULL,
  `referencia` VARCHAR(45) NOT NULL,
  `descricao` TEXT NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `servico` VARCHAR(45) NOT NULL,
  `quantidade` INT NOT NULL,
  `data_de_cadastro` DATETIME NOT NULL,
  `data_de_atualizacao` DATETIME NOT NULL,
  PRIMARY KEY (`id_material`))
ENGINE = InnoDB;



INSERT INTO usuarios (matricula,nome,email,setor,cargo,senha,data_de_criacao,data_de_atualizacao) VALUES 
('006238','Yuri Sousa dos Santos','yuri.sousa@aerisenergy.com.br','PCM','Aprendiz',md5('123'),now(),now());

INSERT INTO usuarios (matricula,nome,email,setor,cargo,senha,data_de_criacao,data_de_atualizacao) VALUES 
('006216','Marcos Vinicius Meneses de Oliveira','vinicius.oliveira@aerisenergy.com.br','TIC','Aprendiz',md5('123'),now(),now());
