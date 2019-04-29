<div class="form-row">
    <div class="form-group col-md-8">
        <label class="control-label" for="nome">Nome *</label>
        <input type="text" class="form-control" name="nome" autofocus="autofocus" 
            placeholder="Informe o Nome" value="<?= $produto['nome'] ?>">
    </div>
    
    <div class="form-group col-md-4">
        <label class="control-label" for="peso">Peso</label>
        <input type="text" class="form-control" name="peso" 
            placeholder="Informe o Peso" value="<?= $produto['peso'] ?>">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-4">
        <label class="control-label" for="estoque">Estoque</label>
        <input type="text" class="form-control" name="estoque" 
            placeholder="Informe o Estoque" value="<?= $produto['estoque'] ?>" <?= campoVazio($produto['estoque'])?>>
    </div>
    
    <div class="form-group col-md-4">
        <label class="control-label" for="valor">Valor *</label>
        <input type="text" class="form-control" name="valor" 
            placeholder="Informe o Valor" value="<?= $produto['valor'] ?>">
    </div>
    
    <div class="form-group col-md-4">
        <label class="control-label" for="custo">Custo</label>
        <input type="text" class="form-control" name="custo" 
            placeholder="Informe o Custo" value="<?= $produto['custo'] ?>">
    </div>
</div>
    
<div class="form-row">
    <div class="form-group col-md-6">
        <label class="control-label" for="categoria">Categoria *</label>
        <select class="form-control" name="categoria_id">
            <?php foreach($categorias as $categoria) : 
                $essaEhACategoria = $produto['categoria_id'] == $categoria['id'];
                $selecao = $essaEhACategoria ? "selected='selected'" : "";
            ?>
                <option value="<?=$categoria['id']?>" <?=$selecao?>>
                    <?=$categoria['nome']?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group col-md-6">
        <label class="control-label" for="fornecedor">fornecedor *</label>
        <select class="form-control" name="fornecedor_id">
            <?php foreach($fornecedores as $fornecedor) :
                $essaEhOFornecedor = $produto['fornecedor_id'] == $fornecedor['id'];
                $selecao = $essaEhOFornecedor ? "selected='selected'" : "";
            ?>
                <option value="<?=$fornecedor['id']?>" <?=$selecao?>>
                    <?=$fornecedor['nome']?>
                </option>
            <?php endforeach ?>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label" for="descricao">Descricao</label>
    <textarea class="form-control" name="descricao" 
        placeholder="Informe a Descrição"><?= $produto['descricao'] ?></textarea>
</div>

<div class="form-group row">
    <div class="col-md-12 ">
        <p class="form-control-plaintext text-danger">* Campos Obrigatórios</p>
    </div>
</div>


