<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 30/09/18
 * Time: 14:45
 */

require_once "model/CategoriaDAO.php";
require_once "model/Categoria.php";
require_once "view/View.php";

class CategoriaController
{
    private $dados;
    public function principal(){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->selectAll();
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/listar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function detalhes($id){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->select($id);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/detalhes.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    //chama a página com o FORM de inclusao
    public function incluir(){
        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/incluir.html');
        View::carregar('view/template/rodape.html');
    }

    //recebe um obj categoria e chama o método de insert do DAO
    public function inserir($categoria){
        $catdao = new CategoriaDAO();
        if ($catdao->insert($categoria)){
            header('Location: index.php');
        }else{
            echo "erro ao inserir";
        }

    }

    // Atualizar
    public function atualizar($id){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try {
            $categorias = $catdao->select($id);
        } catch (PDOException $e){
            echo "Erro: ". $e->getMessage();
        }

        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/atualizar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function gravaAtualizar($categoriaNova){
        $catdao = new CategoriaDAO();
        if ($catdao->update($categoriaNova)) {
            header('Location: index.php');
        } else {
            echo "Erro ao atualizar.";
        }
    }

    // Excluir
    public function excluir ($id){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try {
            $categorias = $catdao->select($id);
        } catch (PDOException $e){
            echo "Erro: " . $e->getMessage();
        }

        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/excluir.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function confExcluir($categoriaNova){
        $catdao = new CategoriaDAO();
        if ($catdao->delete($categoriaNova)){
            header('Location: index.php');
        } else {
            echo "Erro ao atualizar.";
        }
    }

}