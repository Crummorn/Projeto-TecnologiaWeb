
CREATE TABLE `tecweb_loja`.`permissao` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(100) NOT NULL,
	`descricao` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tecweb_loja`.`usuario` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(255) NOT NULL,
	`senha` VARCHAR(255) NOT NULL,
	`nome` VARCHAR(255) NOT NULL,
	`ativo` TINYINT NULL DEFAULT 1,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tecweb_loja`.`usuario_permissao` (
	`usuario_id` INT NOT NULL,
	`permissao_id` INT NOT NULL,
	INDEX `fk_usuario_idx` (`usuario_id` ASC),
	INDEX `fk_permissao_idx` (`permissao_id` ASC),
	CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tecweb_loja`.`usuario` (`id`),
	CONSTRAINT `fk_permissao` FOREIGN KEY (`permissao_id`) REFERENCES `tecweb_loja`.`permissao` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- PERMISSAO
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('LISTAR_CATEGORIA', 'O usuario pode listar categorias.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ADICIONAR_CATEGORIA', 'O usuario pode adicionar categorias.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ALTERAR_CATEGORIA', 'O usuario pode alterar categorias.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('DELETAR_CATEGORIA', 'O usuario pode deletar categorias');

INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('LISTAR_FORNECEDOR', 'O usuario pode listar fornecedores.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ADICIONAR_FORNECEDOR', 'O usuario pode adicionar fornecedores.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ALTERAR_FORNECEDOR', 'O usuario pode alterar fornecedores.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('DELETAR_FORNECEDOR', 'O usuario pode deletar fornecedores');

INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('LISTAR_PRODUTOS', 'O usuario pode listar produtos.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ADICIONAR_PRODUTOS', 'O usuario pode adicionar produtos.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ALTERAR_PRODUTOS', 'O usuario pode alterar produtos.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('DELETAR_PRODUTOS', 'O usuario pode deletar produtos');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ALTERAR_ESTOQUE_PRODUTOS', 'O usuario pode alterar o estoque dos produtos.');

INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('LISTAR_STATUS_PEDIDO', 'O usuario pode listar status dos pedidos.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ADICIONAR_STATUS_PEDIDO', 'O usuario pode adicionar status dos pedidos.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ALTERAR_STATUS_PEDIDO', 'O usuario pode alterar status dos pedidos.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('DELETAR_STATUS_PEDIDO', 'O usuario pode deletar status dos pedidos');

INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('LISTAR_PERMISSOES', 'O usuario pode listar as permissoes existentes.');

INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('LISTAR_USUARIOS', 'O usuario pode listar usuarios.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ADICIONAR_USUARIOS', 'O usuario pode adicionar usuarios.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ALTERAR_USUARIOS', 'O usuario pode alterar usuarios.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ATIVAR_DESATIVAR_USUARIOS', 'O usuario pode ativar ou desativar usuarios existentes.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ALTERAR_PERMISSOES_USUARIOS', 'O usuario pode alterar permissoes de usuarios existentes.');

INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('LISTAR_PEDIDOS', 'O usuario pode listar pedido.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ADICIONAR_PEDIDOS', 'O usuario pode adicionar pedidos.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ALTERAR_STATUS_PEDIDOS', 'O usuario pode alterar status dos pedidos.');
INSERT INTO `tecweb_loja`.`permissao` (`nome`, `descricao`) VALUES ('ATIVAR_DESATIVAR_PEDIDOS', 'O usuario pode ativar ou desativar pedidos existentes.');

-- Senha: admin
INSERT INTO `tecweb_loja`.`usuario` (`email`, `senha`, `nome`) VALUES ('admin@loja.com', '21232f297a57a5a743894a0e4a801fc3', 'Loja Admin');
-- Adicionou todas as permissões ao usuario admin
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '1');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '2');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '3');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '4');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '5');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '6');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '7');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '8');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '9');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '10');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '11');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '12');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '13');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '14');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '15');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '16');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '17');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '18');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '18');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '19');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '20');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '21');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '22');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '23');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '24');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '25');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '26');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('1', '27');

-- Senha: listar
INSERT INTO `tecweb_loja`.`usuario` (`email`, `senha`, `nome`) VALUES ('listar@loja.com', 'c1cd37dd21d421796ebbb9eb8b361813', 'Loja Lists');
-- Adicionou permissões de listagem ao usuario listar
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('2', '1');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('2', '4');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('2', '7');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('2', '11');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('2', '14');
INSERT INTO `tecweb_loja`.`usuario_permissao` (`usuario_id`, `permissao_id`) VALUES ('2', '24');