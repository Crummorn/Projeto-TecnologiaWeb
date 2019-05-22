<?php
require_once('DataSource.php');

class PedidoService extends DataSource {
    private $conexao;

    function __construct() {
        $this->conexao = $this->getConexao();
    }

    function adicionar($endereco, $frete) {
        $endereco = mysqli_real_escape_string($this->conexao, $endereco);

        $query = "INSERT INTO pedido (endereco_entrega, frete) VALUES ('{$endereco}', '{$frete}' )";

        mysqli_query($this->conexao, $query);
        return mysqli_insert_id($this->conexao);
    }

    function adicionarPedidoProduto($idPedido, $idProduto, $quantidade) {
        $query = "INSERT INTO pedido_produto (pedido_id, produto_id, quantidade) 
                    VALUES ('{$idPedido}', '{$idProduto}', '{$quantidade}')";        
        mysqli_query($this->conexao, $query);
    }
    
    function alterarStatus($id, $idStatus) {
        $query = "UPDATE pedido SET status_id = '{$idStatus}' WHERE id = '{$id}'";
        return mysqli_query($this->conexao, $query);
    }
    
    function ativarPedido($id) {
        $query = "UPDATE pedido SET ativo = '1' WHERE id = {$id}";
        return mysqli_query($this->conexao, $query);
    }
    
    function desativarPedido($id) {
        $query = "UPDATE pedido SET ativo = '0' WHERE id = {$id}";
        return mysqli_query($this->conexao, $query);
    }
    
    function listaPedidos() {
        $pedidos = array();
        $query = "SELECT pedido.*, status_pedido.nome as status_nome
                    FROM pedido
                    LEFT JOIN status_pedido ON pedido.status_id = status_pedido.id";
        $resultado = mysqli_query($this->conexao, $query);
        while($pedido = mysqli_fetch_assoc($resultado)) {
            array_push($pedidos, $pedido);
        }
        return $pedidos;
    }

    function buscaPedido($id) {
        $query = "SELECT * FROM pedido WHERE id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function buscaPedidoProdutos($id) {
        $produtos = array();
        $query = "SELECT 
                        pedido_produto.quantidade, 
                        produto.id, produto.nome, produto.valor, 
                        (pedido_produto.quantidade * produto.valor) AS total
                    FROM pedido_produto
                    RIGHT JOIN produto 
                        ON pedido_produto.produto_id = produto.id    
                    WHERE pedido_id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);
        while($produto = mysqli_fetch_assoc($resultado)) {
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    function pedidoValorTotal($id) {
        $query = "SELECT 
                    sum(pedido_produto.quantidade * produto.valor) + pedido.frete AS valor_total
                    FROM pedido_produto
                    RIGHT JOIN produto 
                        ON pedido_produto.produto_id = produto.id                                            
                    RIGHT JOIN pedido 
                        ON pedido_produto.pedido_id = pedido.id
                    WHERE pedido_id = {$id}
                ";

        $resultado = mysqli_query($this->conexao, $query);                    
        $row = mysqli_fetch_object($resultado);
        return $row->valor_total;
    }

    function totalPedidos() {
        $query = "SELECT * FROM pedido";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }

    function totalPedidosAtivos() {
        $query = "SELECT * FROM pedido WHERE ativo = '1'";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }

    function totalPedidosDesativados() {
        $query = "SELECT * FROM pedido WHERE ativo = '0'";
        $resultado = mysqli_query($this->conexao, $query);
        return $resultado->num_rows;
    }
}

?>