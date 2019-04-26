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
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>