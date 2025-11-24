<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo']; 
    $tabela = ($tipo == 'heroi') ? 'herois' : 'civis';

    try {
        $sql = "SELECT * FROM $tabela WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$usuario) {
            header("Location: ../acesso.php?perfil=$tipo&erro=usuario_inexistente");
            exit;
        }
        if (!password_verify($senha, $usuario['senha'])) {
            header("Location: ../acesso.php?perfil=$tipo&erro=senha_incorreta");
            exit;
        }
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_tipo'] = $tipo;
        $_SESSION['usuario_nome'] = ($tipo == 'heroi') ? $usuario['nome_heroi'] : $usuario['nome'];
        if ($tipo == 'heroi') {
            header("Location: ../mural.php");
        } else {
            header("Location: ../painel_civil.php");
        }
        exit;

    } catch (PDOException $e) {
        echo "Erro no sistema: " . $e->getMessage();
    }
} else {
    header("Location: ../index.php");
    exit;
}
?>