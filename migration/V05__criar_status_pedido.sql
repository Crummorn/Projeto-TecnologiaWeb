CREATE TABLE `loja`.`status_pedido` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(100) NOT NULL,
	`descricao` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

INSERT INTO `loja`.`status_pedido` (`nome`, `descricao`) VALUES ('Aguardando pagament', 'Aguardando Pagamento.');
INSERT INTO `loja`.`status_pedido` (`nome`, `descricao`) VALUES ('Em Transporte.', 'Produto em transporte ao destinatario.');
INSERT INTO `loja`.`status_pedido` (`nome`, `descricao`) VALUES ('Entregue ao destinatario.', 'Produto Entregue ao destinatario.');
INSERT INTO `loja`.`status_pedido` (`nome`, `descricao`) VALUES ('Estraviado.', 'Produto Estraviado');