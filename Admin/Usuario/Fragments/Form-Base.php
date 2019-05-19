
<div class="form-group">
    <label class="control-label" for="nome">Nome *</label>
    <input type="text" class="form-control" name="nome" autofocus="autofocus" 
        placeholder="Informe o Nome" value="<?= $usuario['nome'] ?>">
</div>

<div class="form-group">
    <label class="control-label" for="email">Email *</label>
    <input type="email" class="form-control" name="email" autofocus="autofocus" 
        placeholder="Informe o Email" value="<?= $usuario['email'] ?>">
</div>

<div class="form-group">
    <label class="control-label" for="senha">Senha *</label>
    <input type="password" class="form-control" name="senha" autofocus="autofocus" 
        placeholder="Informe a Senha" value="<?= $usuario['senha'] ?>">
</div>

<div class="form-group row">
    <div class="col-md-12 ">
        <p class="form-control-plaintext text-danger">* Campos Obrigatórios</p>
    </div>
</div>