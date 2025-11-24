<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'heroi') { 
    $id = $_POST['id'];
    $novo_status = $_POST['novo_status'];
    if (!empty($id) && !empty($novo_status)) {
        
        try {
            $sql = "UPDATE missoes SET status = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$novo_status, $id]);
            if ($novo_status == 'Concluida') {
                header("Location: ../mural.php?msg=missao_concluida");
            } else {
                header("Location: ../mural.php?msg=status_atualizado");
            }
            exit;

        } catch (PDOException $e) {
            echo "Erro ao processar missão: " . $e->getMessage();
        }
        
    } else {
        echo "Dados inválidos.";
    }

} else {
    header("Location: ../index.php");
    exit;
}
?>