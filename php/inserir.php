<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];
    $local = $_POST['local'];
    $urgencia = $_POST['urgencia'];
    $caminho_foto = null; 
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        
        $arquivo_tmp = $_FILES['foto']['tmp_name'];
        $nome_original = $_FILES['foto']['name'];
        $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        
        if (in_array($extensao, $permitidos)) {
            $novo_nome = uniqid() . "." . $extensao;
            $destino = '../uploads/' . $novo_nome;
            if (move_uploaded_file($arquivo_tmp, $destino)) {
                $caminho_foto = 'uploads/' . $novo_nome;
            }
        }
    }
    $sql = "INSERT INTO missoes (nome_cidadao, descricao_problema, localizacao, nivel_urgencia, foto_ocorrencia) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if($stmt->execute([$nome, $desc, $local, $urgencia, $caminho_foto])) {
        header("Location: ../historico_civil.php?msg=sucesso");
    } else {
        echo "Erro ao registrar no banco de dados.";
    }
}
?>