<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipo = $_POST['tipo_usuario'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    try {
        if ($tipo == 'heroi') {
            $sql = "INSERT INTO herois (nome_heroi, identidade_secreta, poderes, afiliacao, email, senha) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_POST['nome'], $_POST['identidade'], $_POST['poderes'], $_POST['afiliacao'], $email, $senha]);
        } else {
            $sql = "INSERT INTO civis (nome, email, senha, endereco) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$_POST['nome'], $email, $senha, $_POST['endereco']]);
        }
        header("Location: ../index.php?msg=cadastrado");        
    } catch (PDOException $e) {
        echo "Erro: Email já cadastrado ou erro no banco.";
    }
}
?>