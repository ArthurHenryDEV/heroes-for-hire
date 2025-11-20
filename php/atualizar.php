<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $novo_status = $_POST['novo_status'];
    if (!empty($id) && !empty($novo_status)) {
        $sql = "UPDATE missoes SET status = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$novo_status, $id])) {
            header("Location: ../mural.php?msg=status_atualizado");
            exit;
        } else {
            echo "Erro ao atualizar a missão.";
        }
        
    } else {
        echo "Dados inválidos.";
    }

} else {
    header("Location: ../index.php");
    exit;
}
?>