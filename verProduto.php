<?php

$nomeArquivo = "produto.json";

function cadastrarProduto($nomeProduto, $categoriaProduto, $precoProduto, $fotoProduto, $descProduto, $quantidadeProduto)
{

    global $nomeArquivo;

    if (!file_exists($nomeArquivo)) {
        $produtos = [];
    } else {
        $produtos = json_decode(file_get_contents($nomeArquivo), true);
    }

    //importando arquivos(imagens, excel, pdf, etc)
    $idProduto = count($produtos) + 1;
    $nomeImagem = $_FILES["fotoProduto"]["name"];
    $localTemp = $_FILES["fotoProduto"]["tmp_name"];
    $caminhoSalvo = "img/" . $nomeImagem;

    $produtos[] = ["id" => $idProduto, "nome" => $nomeProduto, "categoria" => $categoriaProduto, "preco" => $precoProduto, "foto" => $caminhoSalvo, "descricao" => $descProduto, "quantidade" => $quantidadeProduto];


    $json = json_encode($produtos);
    $deuCerto = file_put_contents($nomeArquivo, $json);
}

if ($_POST) {
    echo cadastrarProduto($_POST["nomeProduto"], $_POST["categoriaProduto"], $_POST["precoProduto"], $_FILES['foto'], $_POST["descProduto"], $_POST["quantidadeProduto"]);
}

$dadosProduto = json_decode(file_get_contents($nomeArquivo), true);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} elseif (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    echo "Voce deve passar um id!";
    exit;
}

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
    <link rel="stylesheet" href="css/style.css">
    <title>Ver Produto</title>
</head>

<body id="body-verProduto" class="container d-flex justify-content-center align-items-center">
    <?php include_once("variaveis.php") ?>
    <a href="index.php">VOLTAR</a>
    <section>
        <div class="container d-flex justify-content-between align-items-center" id="section-verProduto">



            <?php if (isset($dadosProduto) && $dadosProduto != []) { ?>
                <?php foreach ($dadosProduto as $produto) {
                        if ($_GET['id'] == $produto['id']) { ?>

                        <div class="row">
                            <div class="col-4">
                                <img class="img-fluid" src="<?php echo $produto['foto'] ?>" alt="">
                            </div>

                            <div class="col-8" id="img-verProduto">
                                <div class="row container-fluid d-flex align-items-center justify-content-center">
                                    <div class="col" id="conteudo-verProduto">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h1>Nome</h1>
                                                    <label for="nome">
                                                        <?php echo $produto["nome"]; ?>
                                                    </label>
                                                </div>
                                                <div class="col-md-12">
                                                    <h3>Categoria</h3>
                                                    <label for="categoria">
                                                        <?php echo $produto["categoria"]; ?>
                                                    </label>
                                                </div>
                                                <div class="col-md-12">
                                                    <h3>Descrição</h3>
                                                    <label for="descricao">
                                                        <?php echo $produto["descricao"]; ?>
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3>Quantidade em Estoque</h3>
                                                    <label for="estoque">
                                                        <?php echo $produto["quantidade"]; ?>
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3>Preço</h3>
                                                    <label for="preco">
                                                        <?php echo $produto["preco"]; ?>
                                                    </label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
    </section>
</body>

</html>