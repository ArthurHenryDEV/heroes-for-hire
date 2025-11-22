<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];
    $local = $_POST['local'];
    $urgencia = $_POST['urgencia'];

    $sql = "INSERT INTO missoes (nome_cidadao, descricao_problema, localizacao, nivel_urgencia) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if($stmt->execute([$nome, $desc, $local, $urgencia])) {

        header("Location: ../index.php?status=sucesso");
    } else {
        echo "Erro ao enviar pedido.";
    }
}
?>