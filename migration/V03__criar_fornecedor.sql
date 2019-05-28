CREATE TABLE `tecweb_loja`.`fornecedor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(14) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(255) NOT NULL,
  `endereco` VARCHAR(255) NULL DEFAULT 'Sem Endereço',
  `contato` VARCHAR(50) NULL DEFAULT 'Sem Contato',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tecweb_loja`.`fornecedor` (`cnpj`, `nome`, `descricao`) VALUES ('12345678900000', 'Fornecedor 1', 'Fornecedor 1');
INSERT INTO `tecweb_loja`.`fornecedor` (`cnpj`, `nome`, `descricao`) VALUES ('12345678901111', 'Fornecedor 2', 'Fornecedor 2');
INSERT INTO `tecweb_loja`.`fornecedor` (`cnpj`, `nome`, `descricao`) VALUES ('12345678902222', 'Fornecedor 3', 'Fornecedor 3');