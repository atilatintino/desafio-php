<?php 

$nomeProduto = $_POST["nomeProduto"];

echo $nomeProduto;
//var_dump($nomeProduto); 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <?php include_once("config/validacoes.php") ?>
    <?php include_once("config/variaveis.php") ?>
    <main class="container">

        <div class="row">
            <div class="col-6"> 
                <h1>Cadastro de Produtos</h1>   
                <form action="index.php" method="post">
                    <div class="form-group">
                        <div>
                            <input class="form-control" type="text" name="nomeProduto" id="" placeholder="Nome do produto">
                        </div>
                        <div>
                            <input class="form-control" type="text" name="descProduto" id="" placeholder="Desrição do produto">
                        </div>
                        <div>
                        <div>
                            <input class="form-control" type="text" name="categoriaProduto" id="" placeholder="Categoria do produto">
                        </div>
                        <div>
                            <input class="form-control" type="text" name="quantidadeProduto" id="" placeholder="Quantidade do produto">
                        </div>
                        <div>
                            <input class="form-control" type="number" name="precoProduto" id="" placeholder="Preço do produto">
                        </div>
                        <div>
                            <input class="form-control" type="file" name="fotoProduto" id="" placeholder="Foto do produto">
                        </div>
                        <button class="btn btn-success" type="submit">Cadastrar Produto</button>
                    </div>
                </form>
            </div>    
        </div>
        <div>
        <section>
            <h1>Todos os produtos</h1>
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                </tr>
                
                <?php foreach($produtos as $produto) { ?>
                <tr>
                    <td><?php array_push($produtos, $produto["nome"]); 
                                echo $produto["nome"];
                    ?></td>
                    <td><?php echo $produto["categoria"]; ?></td>
                    <td><?php echo $produto["preco"]; ?></td>
                </tr>  
                <?php } ?>
            </table>
        </div>
        </section>
    </main>
</body>
</html>