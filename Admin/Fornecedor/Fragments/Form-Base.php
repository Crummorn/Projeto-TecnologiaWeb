<div class="row">
    <div class="form-group col-md-4">
        <label class="control-label" for="cnpj">CNPJ *</label>
        <input type="text" class="form-control" name="cnpj" autofocus="autofocus" 
        placeholder="Informe o CNPJ" value="<?= $fornecedor['cnpj'] ?>"  <?= campoVazio($fornecedor['cnpj'])?>>
    </div>
    
    <div class="form-group col-md-4">
        <label class="control-label" for="nome">Nome *</label>
        <input type="text" class="form-control" name="nome"
        placeholder="Informe o Nome" value="<?= $fornecedor['nome'] ?>">
    </div>
    
    <div class="form-group col-md-4">
        <label class="control-label" for="contato">Contato</label>
        <input type="text" class="form-control" name="contato" 
            placeholder="Informe o Nome" value="<?= $fornecedor['contato'] ?>">
    </div>
</div>

<div class="form-group ">
    <label class="control-label" for="endereco">Endereco</label>
    <input type="text" class="form-control" name="endereco" 
    placeholder="Informe o Endereco" value="<?= $fornecedor['endereco'] ?>">
</div>

<div class="form-group row">
    <div class="col-md-12 ">
        <p class="form-control-plaintext text-danger">* Campos Obrigatórios</p>
    </div>
</div>


