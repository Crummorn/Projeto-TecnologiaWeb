CREATE TABLE `tecweb_loja`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tecweb_loja`.`categoria` (`nome`) VALUES ('Escolar');
INSERT INTO `tecweb_loja`.`categoria` (`nome`) VALUES ('Roupas');
INSERT INTO `tecweb_loja`.`categoria` (`nome`) VALUES ('Eletrodomesticos');
INSERT INTO `tecweb_loja`.`categoria` (`nome`) VALUES ('Ferramentas');
INSERT INTO `tecweb_loja`.`categoria` (`nome`) VALUES ('Bebidas Alcoolicas');