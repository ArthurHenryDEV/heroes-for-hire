<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    $tabela = ($tipo == 'heroi') ? 'herois' : 'civis';
    $sql = "SELECT * FROM $tabela WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_tipo'] = $tipo;
        $_SESSION['usuario_nome'] = ($tipo == 'heroi') ? $usuario['nome_heroi'] : $usuario['nome'];
        if ($tipo == 'heroi') {
            header("Location: ../mural.php"); 
        } else {
            header("Location: ../painel_civil.php");
        }
        exit;  
    } else {
        header("Location: ../index.php?erro=dados_invalidos");
    }
}
?>