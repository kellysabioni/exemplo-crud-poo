<?php
/* Acessando as funções de Produtos */
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-utilitarias.php";

$listaDeProdutos = listarProdutos($conexao);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-2 shadow-lg rounded pb-1">
        <h1><a class="btn btn-dark btn-lg" href="../index.php">Home</a> Produtos | SELECT</h1>

        <hr>
        <h2>Lendo e carregando todos os produtos.</h2>

        <p><a class="btn btn-primary btn-sm" href="inserir.php">Inserir novo produto</a></p>

        <div class="row g-1" >

<?php foreach ($listaDeProdutos as $produto) { ?>
            <div class="col-sm-6">
                <article class="bg-body-secondary p-2 rounded-2">
                
                <input type="hidden" name="id" value="<?=$fabricante['id']?>">
            
                    <h3><?=$produto['produto']?></h3>
                    <p>Preço: <b><?=formatarPreco($produto['preco'])?></b></p>
                    <p>Quantidade: <b><?=$produto['qtde']?></b></p>        
                    <p>Valor Total(direto): <b><?=formatarPreco($produto['preco']*$produto['qtde'])?></b></p>
                    <p>Valor Total(função): <b><?=calcularTotal($produto['preco'], $produto['qtde'])?></b></p>
                    <p>Valor Total(dentro SELECT): <b><?=formatarPreco($produto['Total'])?></b></p>

                    <p>Fabricante: <b><?=$produto['fabricante']?></b></p>   
                    <p>
                        <a class="btn btn-outline-dark" href="atualizar.php?id=<?=$produto["id"]?>">Editar</a> 
                        
                        <!-- Criando link dinamico *EXCLUIR* -->
                        <a class="btn btn-outline-danger" href="excluir.php?id=<?=$produto['id']?>">Excluir</a>
                    
                    </p>
                    
                    
                </article>
            </div>
        
<?php }?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>