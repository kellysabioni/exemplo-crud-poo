<?php 
require_once "conecta.php";

// listarProdutos: usada pela página produtos/visualizar.php
function listarProdutos(PDO $conexao):array{
    // $sql = "SELECT * FROM produtos ORDER BY nome ";

        $sql = "SELECT
        produtos.id,
        produtos.nome AS produto,
        produtos.preco,
        produtos.qtde,
        fabricantes.nome AS fabricante,
        (produtos.preco * produtos.qtde) AS Total
        FROM produtos
        JOIN fabricantes
        ON produtos.fabricante_id = fabricantes.id
        ORDER BY produto";

    try {
        /* Preparando o comando SQL ANTES de executar no servidor e guardando em memória (variável consulta ou query) */
        $consulta = $conexao->prepare($sql);
        
        /* Executando o comando no banco de dados */
        $consulta->execute();
    
        /* Busca/Retorna todos os dados provenientes da execução da consulta e os transforma em um array associativo */
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (Exception $erro) {
        die("Erro ao carregar PRODUTOS: ".$erro->getMessage());
    }
};

function inserirProduto(PDO $conexao, string $nome, float $preco, int $qtde, string $idFabricante, string $descricao):void{
    $sql = "INSERT INTO produtos (nome, preco, qtde, fabricante_id, descricao) 
    VALUES (:nome, :preco, :quantidade, :fabricante, :descricao)";
    
    try {
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);
        $consulta->bindValue(":quantidade", $qtde, PDO::PARAM_INT);
        $consulta->bindValue(":fabricante", $idFabricante, PDO::PARAM_INT);
        $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);

        $consulta-> execute();

    } catch (\Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }
}

function listarUmProduto(PDO $conexao, int $idProduto):array{
    $sql = "SELECT * FROM produtos WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idProduto, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar produto: ".$erro->getMessage());
    }
}

function atualizarProduto (PDO $conexao, int $id, string $nome, float $preco, int $qtde, int $idFabricante, string $descricao):void{
    $sql    = "UPDATE produtos SET
    nome   = :nome, 
    preco  = :preco, 
    qtde   = :quantidade, 
    fabricante_id = :fabricante, 
    descricao = :descricao
    WHERE id = :id ";

    try {
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);
        $consulta->bindValue(":quantidade", $qtde, PDO::PARAM_INT);
        $consulta->bindValue(":fabricante", $idFabricante, PDO::PARAM_INT);
        $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);

        $consulta-> execute();

    } catch (\Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    }   

}

function excluirProduto(PDO $conexao, int $idProduto):void{
    $sql = "DELETE FROM produtos WHERE id = :id ";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idProduto, PDO::PARAM_INT);
        
        $consulta->execute();
        
    } catch (Exception $erro) {
        die("Erro ao excluir produto: ".$erro->getMessage());
    }
}