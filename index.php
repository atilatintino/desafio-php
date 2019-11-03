<?php

$nomeArquivo = "produto.json";

function cadastrarProduto($nomeProduto, $categoriaProduto, $precoProduto, $fotoProduto, $descProduto, $quantidadeProduto)
{
    global $nomeArquivo;
    $idProduto = 0;

    if (file_exists($nomeArquivo)) {

        //abrindo e pegando informações do arquivo JSON

        $arquivo = file_get_contents($nomeArquivo);

        //transformando JSON em ARRAY para poder inserir produtos
        $produtos = json_decode($arquivo, true);

        
        //adicionando um novo produto dentro do ARRAY que estava dentro do arquivo
        $produtos[] = ["id" => $idProduto, "nome" => $nomeProduto, "categoria" => $categoriaProduto, "preco" => $precoProduto, "foto" => $fotoProduto, "descricao" => $descProduto, "quantidade" => $quantidadeProduto];
        $idProduto = count($produtos) + 1;
        //salvando JSON dentro de um arquivo
        $json = json_encode($produtos);

        //validando se ocorreu algum erro na hora de colocar o conteúdo dentro do arquivo JSON
        $deuCerto = file_put_contents($nomeArquivo, $json);

        //validando se ocorreu algum erro na hora de colocar o conteúdo dentro do arquivo JSON
        if ($deuCerto) {
            return "Dados salvos com sucesso!!";
        } else {
            return "Ops, encontramos um problema! Entre em contato com o administrador do sistema!";
        }
    } else {
        $produtos = [];


        //adicionando um novo produto, mesma idéia do array_push, porém utilizando menos processamento da máquina
        $produtos[] = ["id" => $idProduto, "nome" => $nomeProduto, "categoria" => $categoriaProduto, "preco" => $precoProduto, "foto" => $fotoProduto, "descricao" => $descProduto, "quantidade" => $quantidadeProduto];
        $idProduto = count($produtos) + 1;
        //transformando a array $produtos em JSON
        $json = json_encode($produtos);

        //salvando o JSON dentro de um arquivo
        $deuCerto = file_put_contents($nomeArquivo, $json);

        //validando se ocorreu algum erro na hora de colocar o conteúdo dentro do arquivo JSON
        if ($deuCerto) {
            return "Dados salvos com sucesso!";
        } else {
            return "Ops, encontramos um problema! Entre em contato com o administrador do sistema!";
        }
    }
}

//importando arquivos(imagens, excel, pdf, etc)




if ($_POST) {
    $nomeImagem = $_FILES["fotoProduto"]["name"];
    $localTemp = $_FILES["fotoProduto"]["tmp_name"];
    $caminhoSalvo = "img/" . $nomeImagem;
    $deuCerto = move_uploaded_file($localTemp, $caminhoSalvo);


    echo cadastrarProduto($_POST["nomeProduto"], $_POST["categoriaProduto"], $_POST["precoProduto"], $caminhoSalvo, $_POST["descProduto"], $_POST["quantidadeProduto"]);
} else { }

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

    <title>Cadastro</title>
</head>

<body class="container-fluid d-flex justify-content-between align-items-center">
    <?php include_once("variaveis.php"); ?>
    <main class="container d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-6">
                <section>
                    <h1>Todos os produtos</h1>
                    <table class="table">
                        <tr>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Preço</th>
                        </tr>
                        <?php if ($produtos != []) {
                            foreach ($produtos as $produto) { ?>
                                <tr>
                                    <td>
                                        <a href="verProduto.php?id= <?php echo $produto['id']; ?>">
                                            <?php echo $produto["nome"]; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $produto["categoria"]; ?></td>
                                    <td><?php echo "R$".$produto["preco"]; ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <span>
                                <h5 id="span-h1">Atenção! Não existem FRUTAS cadastradas.</h5>
                            </span>
                        <?php } ?>
                    </table>
            </div>
            </section>


            <div id="section-dois" class="col-6 rounded">
                <section  class="d-flex justify-content-center align-items-center">
                    <div class="row container-fluid justify-content-center">
                        <div>
                            <h1 class="border-bottom">Cadastro de Produtos</h1>
                            <form action="index.php" method="post" enctype="multipart/form-data" id="index-form">
                                <div class="form-group">
                                    <div class="index-campos">
                                        <h5>Nome</h5>
                                        <input class="form-control" type="text" required="required" name="nomeProduto" placeholder="">
                                    </div>
                                    <div class="index-campos">
                                        <h5>Descrição</h5>
                                        <textarea class="form-control" required="required" name="descProduto"></textarea>
                                    </div>
                                    <div>
                                        <div class="index-campos">
                                            <h5>Categoria</h5>
                                            <select class="form-control index-campos" required="required" name="categoriaProduto">
                                                <option value="" hidden>Selecione uma categoria</option>
                                                <option value="Frutas Vermelhas">Frutas Vermelhas</option>
                                                <option value="Frutas Verdes">Frutas Verdes</option>
                                                <option value="Frutas Amarelas">Frutas Amarelas</option>
                                            </select>
                                        </div>
                                        <div class="index-campos">
                                            <h5>Quantidade</h5>
                                            <input class="form-control" type="text" required="required" name="quantidadeProduto" placeholder="">
                                        </div>
                                        <div class="index-campos">
                                            <h5>Preço</h5>
                                            <input class="form-control" type="number" required="required" name="precoProduto" placeholder="">
                                        </div>
                                        <div class="index-campos">
                                            <h5>Foto do produto</h5>
                                            <input class="form-control" type="file" required="required" name="fotoProduto" placeholder="">
                                        </div>
                                        <button class="btn btn-success" type="submit">Enviar</button>                                        
                                    </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </main>
</body>

</html>