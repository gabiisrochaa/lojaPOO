<?php
//Capturo o objeto categoria que foi passado em $dados

$categoria = $dados['categorias'][0];
?>

<h1>Atualizar</h1>

<form action="?acao=gravaAtualizar" method="POST">
    <input type="hidden" name="id" value="<?= $categoria->getId() ?>">

    <label for="nome">Nome: </label>
    <input type="text" value="<?= $categoria->getNome() ?>" name="nome">
    <br>
    <br>
    <label for="descricao">Descrição: </label>
    <input type="text" value="<?= $categoria->getDescricao() ?>" name="descricao" style="width: 250px">
    <br>
    <br>
    <input type="submit">
</form>