<div class="form-group">
    <label class="control-label" for="nome">Nome *</label>
    <input type="text" class="form-control" name="nome" autofocus="autofocus" 
        placeholder="Informe o Nome" value="<?= $status['nome'] ?>">
</div>

<div class="form-group">
    <label class="control-label" for="descricao">Descricao *</label>
    <textarea class="form-control" name="descricao" 
        placeholder="Informe a Descrição"><?= $status['descricao'] ?></textarea>
</div>

<div class="form-group row">
    <div class="col-md-12 ">
        <p class="form-control-plaintext text-danger">* Campos Obrigatórios</p>
    </div>
</div>


