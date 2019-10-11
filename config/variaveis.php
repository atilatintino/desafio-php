<?php

$nomeProduto = $_POST["nomeProduto"];
$categoriaProduto = $_POST["categoriaProduto"];
$precoProduto = $_POST["precoProduto"];
$produtos = [
    ["nome"=>$nomeProduto, "categoria"=>$categoriaProduto, "preco"=>$precoProduto],
    ["nome"=>"Samsung S11", "categoria"=>"Smarthphone", "preco"=>"1000.00"],
    ["nome"=>"PS5", "categoria"=>"Videogame", "preco"=>"5000.00"],
];

?>