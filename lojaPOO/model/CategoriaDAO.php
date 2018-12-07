<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 29/09/18
 * Time: 22:24
 *
 * Classe de Acesso a Dados de Categoria - Contem os métodos para manipulacao dos dados
 */

require_once "Categoria.php";
require_once "DAO.php";

class CategoriaDAO extends DAO
{
    public function selectAll(){
        $sql = "select * from categoria order by nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }
    public function select($id){
        $sql = "SELECT * FROM categoria where id=:valorid order by nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':valorid', $id);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }
    public function insert($categoria){
        //RECEBE UM OBJETO DO TIPO CATEGORIA E 
        //INSERE SEUS DADOS NO BANCO
        $sql = "INSERT INTO categoria (nome, descricao) VALUES (:nome, :descricao)";
        $stmt = $this->conexao->prepare($sql);
        $nome = $categoria->getNome();
        $desc = $categoria->getDescricao();
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $desc);
        if ( $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update($categoria){
        $sql = "UPDATE categoria set nome = :nome, descricao = :descricao where id = :id";
        $stmt = $this->conexao->prepare($sql);
        $id = $categoria->getId();
        $nome = $categoria->getNome();
        $desc = $categoria->getDescricao();
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $desc);
        if ( $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM categoria where id = :valorid";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':valorid', $id);
            $stmt->execute();
            return true;
        }catch (PDOException $e){
            throw new PDOException($e);
        }
    }
}