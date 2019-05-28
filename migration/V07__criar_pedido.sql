CREATE TABLE `tecweb_loja`.`pedido` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`endereco_entrega` VARCHAR(255) NOT NULL,
	`frete` DECIMAL NULL DEFAULT 0,
	`ativo` TINYINT NULL DEFAULT 1,
	`status_id` INT NULL DEFAULT 1,
	PRIMARY KEY (`id`),
	INDEX `fk_status_idx` (`status_id` ASC),
	CONSTRAINT `fk_status` FOREIGN KEY (`status_id`) REFERENCES `tecweb_loja`.`status_pedido` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tecweb_loja`.`pedido_produto` (
	`pedido_id` INT NOT NULL,
	`produto_id` INT NOT NULL,
	`quantidade` INT NOT NULL DEFAULT 1,
	INDEX `fk_pedido_idx` (`pedido_id` ASC),
	INDEX `fk_produto_idx` (`produto_id` ASC),
	CONSTRAINT `fk_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `tecweb_loja`.`pedido` (`id`),
	CONSTRAINT `fk_produto` FOREIGN KEY (`produto_id`) REFERENCES `tecweb_loja`.`produto` (`id`)
);

INSERT INTO `tecweb_loja`.`pedido` (`endereco_entrega`, `frete`, `status_id`) VALUES ('TESTE 1', '100', '1');
INSERT INTO `tecweb_loja`.`pedido` (`endereco_entrega`, `frete`,`status_id`) VALUES ('TESTE 2', '200', '2');
INSERT INTO `tecweb_loja`.`pedido` (`endereco_entrega`, `frete`, `status_id`) VALUES ('TESTE 3', '400', '3');

INSERT INTO `tecweb_loja`.`pedido_produto` (`pedido_id`, `produto_id`, `quantidade`) VALUES ('1', '1', '10');
INSERT INTO `tecweb_loja`.`pedido_produto` (`pedido_id`, `produto_id`, `quantidade`) VALUES ('1', '2', '10');
INSERT INTO `tecweb_loja`.`pedido_produto` (`pedido_id`, `produto_id`, `quantidade`) VALUES ('2', '2', '20');
INSERT INTO `tecweb_loja`.`pedido_produto` (`pedido_id`, `produto_id`, `quantidade`) VALUES ('3', '1', '100');
INSERT INTO `tecweb_loja`.`pedido_produto` (`pedido_id`, `produto_id`, `quantidade`) VALUES ('3', '2', '50');