CREATE SCHEMA IF NOT EXISTS `sga` DEFAULT CHARACTER SET utf8 ;
USE `sga` ;

-- -----------------------------------------------------
-- Table `sga`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sga`.`usuarios` (
`matricula` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`nome` VARCHAR(45) NOT NULL,
`usuario` VARCHAR(45) NOT NULL,
`email` VARCHAR(45) NOT NULL,
`setor` VARCHAR(45) NOT NULL,
`cargo` VARCHAR(45) NOT NULL,
`nivel` INT NOT NULL,
`nome_img` VARCHAR(45) NOT NULL,
`data_de_criacao` DATETIME NOT NULL,
`data_de_atualizacao` DATETIME NOT NULL,
PRIMARY KEY (`id_usuarios`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sga`.`materiais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sga`.`materiais` (
`codigo` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`un_medida` VARCHAR(10) NOT NULL,
`equipamento` VARCHAR(45) NOT NULL,
`referencia` VARCHAR(45) NOT NULL,
`descricao` TEXT NOT NULL,
`endereco` VARCHAR(45) NOT NULL,
`quantidade` INT NOT NULL,
`nome_img` VARCHAR(45) NOT NULL,
`data_de_cadastro` DATETIME NOT NULL,
`data_de_atualizacao` DATETIME NOT NULL,
`codigo_solicitacao` INT,
FOREIGN KEY(`codigo_solicitacao`) REFERENCES `sga`.`solicitacao`(id)
)AUTO_INCREMENT = 90000;
  
  
CREATE TABLE IF NOT EXISTS `sga`.`solicitacao` (
`id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
`codigo` INT NOT NULL,
`matricula` VARCHAR(8) NOT NULL,
`utilizacao` VARCHAR(45) NOT NULL,
`colaborador` VARCHAR(45) NOT NULL,
`quantidade` INT NOT NULL,
`data_de_despache` DATETIME NOT NULL
);