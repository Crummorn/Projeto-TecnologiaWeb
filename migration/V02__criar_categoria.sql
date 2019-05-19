CREATE TABLE `loja`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `loja`.`categoria` (`nome`) VALUES ('Escolar');
INSERT INTO `loja`.`categoria` (`nome`) VALUES ('Roupas');
INSERT INTO `loja`.`categoria` (`nome`) VALUES ('Eletrodomesticos');
INSERT INTO `loja`.`categoria` (`nome`) VALUES ('Ferramentas');
INSERT INTO `loja`.`categoria` (`nome`) VALUES ('Bebidas Alcoolicas');