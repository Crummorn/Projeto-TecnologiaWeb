<!-- The Modal -->
<div class="modal" id="myModal<?=$produto['id']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Nome: <?=$produto['nome']?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Codigo:
                    </span>
                    <span class="col-md-7">
                        <?=$produto['id']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Peso:
                    </span>
                    <span class="col-md-7">
                        <?=$produto['peso']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Descricao:
                    </span>
                    <span class="col-md-7">
                        <?=$produto['descricao']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Estoque:
                    </span>
                    <span class="col-md-7">
                        <?=$produto['estoque']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Valor:
                    </span>
                    <span class="col-md-7">
                        <?=$produto['valor']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Custo:
                    </span>
                    <span class="col-md-7">
                        <?=$produto['custo']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Categoria:
                    </span>
                    <span class="col-md-7">
                        <?=$produto['categoria_nome']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Fornecedor:
                    </span>
                    <span class="col-md-7">
                        <?=$produto['fornecedor_nome']?>
                    </span>
                </div> 
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-4">
                        Lucro possivel:
                    </span>
                    <span class="col-md-7">
                        <?=possivelLucroDeUmProduto($produto['id'])?>
                    </span>
                </div> 

                <?php if (!testaPermissao(13)) : ?>
                    <hr>
                    <div class="row">
                        <form action="Controller/EstoqueAumenta.php" method="POST">
                            <label class="control-label col-md-12" for="quantidade">Aumentar Estoque</label>
                            <input type="hidden" name="id" value="<?=$produto['id']?>" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="col-md-1"></span>
                                    <label class="control-label col-md-4" for="quantidade">Quantidade</label>
                                    <input type="text" class="form-control col-md-4" style="display: inline" name="quantidade" autofocus="autofocus" 
                                        placeholder="Quantidade">
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fa fa-save"></i> <span>Adicionar</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <form action="Controller/EstoqueBaixa.php" method="POST">
                            <label class="control-label col-md-12" for="quantidade">Dar Baixa No Estoque</label>
                            <input type="hidden" name="id" value="<?=$produto['id']?>" />
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="col-md-1"></span>
                                    <label class="control-label col-md-4" for="quantidade">Quantidade</label>
                                    <input type="text" class="form-control col-md-4" style="display: inline" name="quantidade" autofocus="autofocus" 
                                        placeholder="Quantidade">
                                    <button type="submit" class="btn btn-primary float-right">
                                        <i class="fa fa-save"></i> <span>Baixar</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif;?>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="form-inline mr-auto">
                    <a class="btn btn-primary mr-2"
                        href="Altera-Form.php?id=<?=$produto['id']?>">
                        <i class="fas fa-pencil-alt"></i>
                        <span class="d-none d-md-inline d-lg-inline">
                            Alterar
                        </span>
                    </a>
                    <form action="Controller/Remover.php" method="post">
                        <input type="hidden" name="id" value="<?=$produto['id']?>" />
                        <button class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            <span class="d-none d-md-inline d-lg-inline">
                                Deletar
                            </span>
                        </button>
                    </form>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>