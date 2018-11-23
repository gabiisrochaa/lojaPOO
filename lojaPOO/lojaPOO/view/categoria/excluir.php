<?php
//Capturo o objeto categoria que foi passado em $dados

$categoria = $dados['categorias'][0];
?>

<h1>Excluir</h1>

<form action="?acao=confExcluir" method="POST">
    <input type="hidden" name="id" value="<?= $categoria->getId() ?>">
    <button>Excluir</button>
</form>