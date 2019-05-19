CREATE TABLE `loja`.`produto` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(100) NOT NULL,
	`descricao` VARCHAR(255) NOT NULL,
	`peso` DECIMAL NULL DEFAULT 0,
	`estoque` INT NULL DEFAULT 0,
	`valor` DECIMAL NOT NULL,
	`custo` DECIMAL NOT NULL,
	`categoria_id` INT NOT NULL,
	`fornecedor_id` INT NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `fk_categoria_idx` (`categoria_id` ASC),
	INDEX `fk_fornecedor_idx` (`fornecedor_id` ASC),
	CONSTRAINT `fk_categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `testexcel`.`categoria` (`id`),
	CONSTRAINT `fk_fornecedor_id` FOREIGN KEY (`fornecedor_id`) REFERENCES `testexcel`.`fornecedor` (`id`)
);

INSERT INTO `loja`.`produto` (`nome`, `descricao`, `estoque`, `valor`, `custo`, `categoria_id`, `fornecedor_id`) VALUES ('Lapis', 'Um Lapis', '500', '3.00', '1.00', '1', '1');
INSERT INTO `loja`.`produto` (`nome`, `descricao`, `estoque`, `valor`, `custo`, `categoria_id`, `fornecedor_id`) VALUES ('Caderno', 'Um Caderno', '100', '20.00', '5.00', '1', '2');
INSERT INTO `loja`.`produto` (`nome`, `descricao`, `valor`, `custo`, `categoria_id`, `fornecedor_id`) VALUES ('Agente', 'Uma Agenda', '15.00', '2.00', '1', '3');
INSERT INTO `loja`.`produto` (`nome`, `descricao`, `valor`, `custo`, `categoria_id`, `fornecedor_id`) VALUES ('Teste 1', 'Teste 1', '200.00', '30.00', '2', '1');
INSERT INTO `loja`.`produto` (`nome`, `descricao`, `estoque`, `valor`, `custo`, `categoria_id`, `fornecedor_id`) VALUES ('Coelho', 'Coelho', '1000', '500.00', '2.00', '2', '2');
INSERT INTO `loja`.`produto` (`nome`, `descricao`, `estoque`, `valor`, `custo`, `categoria_id`, `fornecedor_id`) VALUES ('Sei la', 'Sei la', '9999', '150.00', '2.00', '3', '3');