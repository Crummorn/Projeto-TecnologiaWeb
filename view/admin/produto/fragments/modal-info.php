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
                    <span class="col-md-3">
                        Codigo:
                    </span>
                    <span class="col-md-8">
                        <?=$produto['id']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Peso:
                    </span>
                    <span class="col-md-8">
                        <?=$produto['peso']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Descricao:
                    </span>
                    <span class="col-md-8">
                        <?=$produto['descricao']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Estoque:
                    </span>
                    <span class="col-md-8">
                        <?=$produto['estoque']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Valor:
                    </span>
                    <span class="col-md-8">
                        <?=$produto['valor']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Custo:
                    </span>
                    <span class="col-md-8">
                        <?=$produto['custo']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Categoria:
                    </span>
                    <span class="col-md-8">
                        <?=$produto['categoria_nome']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Fornecedor:
                    </span>
                    <span class="col-md-8">
                        <?=$produto['fornecedor_nome']?>
                    </span>
                </div> 

                <hr>

                <div class="row">
                    <form action="controller/estoqueAumenta.php" method="POST">
                        <label class="control-label col-md-12" for="quantidade">Aumentar Estoque</label>
                        <input type="hidden" name="id" value="<?=$produto['id']?>" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="col-md-1"></span>
                                <label class="control-label col-md-4" for="quantidade">Quantidade</label>
                                <input type="text" class="form-control col-md-4" style="display: inline" name="quantidade" autofocus="autofocus" 
                                    placeholder="Quantidade">
                                <button type="submit" class="btn btn-primary btn-xs float-right">
                                    <i class="fa fa-save"></i> <span>Adicionar</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <form action="controller/estoqueBaixa.php" method="POST">
                        <label class="control-label col-md-12" for="quantidade">Dar Baixa No Estoque</label>
                        <input type="hidden" name="id" value="<?=$produto['id']?>" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="col-md-1"></span>
                                <label class="control-label col-md-4" for="quantidade">Quantidade</label>
                                <input type="text" class="form-control col-md-4" style="display: inline" name="quantidade" autofocus="autofocus" 
                                    placeholder="Quantidade">
                                <button type="submit" class="btn btn-primary btn-xs float-right">
                                    <i class="fa fa-save"></i> <span>Baixar</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>