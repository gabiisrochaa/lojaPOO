<?php

require_once "../../model/Categoria.php";
require_once "../../model/CategoriaDAO.php";

$dados_recebidos = file_get_contents('php://input');

$dados = json_decode($dados_recebidos, true);

$id = $dados['id'];
$nome = $dados['nome'];
$descricao = $dados['descricao'];

$categoria = new Categoria($nome, $descricao, $id);

$catdao = new CategoriaDAO();

if ($catdao->update($categoria)){
    header('HTTP/1.1 201 Created');
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Atualizada com sucesso!']);
}else{
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Erro ao criar categoria']);
}

