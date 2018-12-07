<?php
//capturo o objeto categoria que foi passado em $dados
$categoria = $dados['categorias'][0];
?>
<h1>Detalhes da categoria</h1>

<p>ID: <?= $categoria->getId() ?></p>
<p>Nome: <input type="text" value="<?= utf8_encode($categoria->getNome()) ?>"></p>
<p>Descrição:<?= utf8_encode($categoria->getDescricao()) ?></p>

<button><a href="index.php?acao=atualizar&id=<?=$categoria->getId()?>">Atualizar</a></button>

<button><a href="index.php?acao=excluir&id=<?=$categoria->getId()?>">Excluir</a></button>