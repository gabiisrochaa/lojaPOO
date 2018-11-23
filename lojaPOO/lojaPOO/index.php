<?php

require_once "controller/CategoriaController.php";

//ROTAS -

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){
    case 'index':
        $cat = new CategoriaController();
        $cat->principal();
        exit;
    case 'detalhes':
        //pega o ID enviado
        $id = $_GET['id'];
        //instancia o controlador
        $cat = new CategoriaController();
        //chama o método
        $cat->detalhes($id);
        exit;
    case 'incluir':
        $cat = new CategoriaController();
        $cat->incluir();
        exit;
    case 'gravaInserir':
        //pegar dados do POST
        $categoriaNova = new Categoria();
        $categoriaNova->setNome($_POST['nome']);
        $categoriaNova->setDescricao($_POST['descricao']);
        $cat = new CategoriaController();
        $cat->inserir($categoriaNova);
        exit;

    case 'atualizar':
        //pega o ID enviado
        $id = $_GET['id'];
        //instancia o controlador
        $cat = new CategoriaController();
        //chama o método
        $cat->atualizar($id);
        exit;

    case 'gravaAtualizar':
        //pega dados do POST
        $categoriaNova = new Categoria();
        $categoriaNova->setId($_POST['id']);
        $categoriaNova->setNome($_POST['nome']);
        $categoriaNova->setDescricao($_POST['descricao']);
        $cat = new CategoriaController();
        $cat->gravaAtualizar($categoriaNova);
        exit;

    case 'excluir':
        //pega o ID enviado
        $id = $_GET['id'];
        //instancia o controlador
        $cat = new CategoriaController();
        //chama o método
        $cat->excluir($id);
        exit;

    case 'confExcluir':
        $categoriaNova = new Categoria();
        $categoriaNova->setId($_POST['id']);
        $cat = new CategoriaController();
        $cat->confExcluir($categoriaNova);
        exit;
    default:
        echo "Ação inválida";

}