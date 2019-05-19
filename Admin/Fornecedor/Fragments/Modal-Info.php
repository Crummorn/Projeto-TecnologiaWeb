<!-- The Modal -->
<div class="modal" id="myModal<?=$fornecedor['id']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Nome: <?=$fornecedor['nome']?></h4>
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
                        <?=$fornecedor['id']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        CNPJ:
                    </span>
                    <span class="col-md-8">
                        <?=$fornecedor['cnpj']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Nome:
                    </span>
                    <span class="col-md-8">
                        <?=$fornecedor['nome']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Endereço:
                    </span>
                    <span class="col-md-8">
                        <?=$fornecedor['endereco']?>
                    </span>
                </div>
                <div class="row">
                    <span class="col-md-1"></span>
                    <span class="col-md-3">
                        Contato:
                    </span>
                    <span class="col-md-8">
                        <?=$fornecedor['contato']?>
                    </span>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="form-inline mr-auto">
                    <a class="btn btn-primary mr-2"
                        href="Altera-Form.php?id=<?=$fornecedor['id']?>">
                        <i class="fas fa-pencil-alt"></i>
                        <span class="d-none d-md-inline d-lg-inline">
                            Alterar
                        </span>
                    </a>
                    <form action="Controller/Remover.php" method="post">
                        <input type="hidden" name="id" value="<?=$fornecedor['id']?>" />
                        <button class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                            <span class="d-none d-md-inline d-lg-inline">
                                Deletar
                            </span>
                        </button>
                    </form>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>