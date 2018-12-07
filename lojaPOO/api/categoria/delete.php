<?php

require_once "../../model/Categoria.php";
require_once "../../model/CategoriaDAO.php";

$dados_recebidos = file_get_contents('php://input');

$dados = json_decode($dados_recebidos, true);

$id = $dados['id'];

$catdao = new CategoriaDAO();

if ($catdao->delete($id)){
    header('HTTP/1.1 201 Created');
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Excluido com sucesso!']);
}else{
    header('Content-type: application/json');
    echo json_encode(['msg'=>'Erro ao deletar categoria']);
}

