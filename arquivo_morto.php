<?php 
require 'php/db.php'; 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Arquivo Morto | Stark Ind.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="text-secondary">📂 Arquivo Morto</h2>
                <p class="text-muted">Histórico de missões concluídas</p>
            </div>
            <a href="mural.php" class="btn btn-outline-info">← Voltar para Missões Ativas</a>
        </div>

        <div class="row">
            <?php
            $sql = "SELECT * FROM missoes WHERE status = 'Concluida' ORDER BY data_criacao DESC";
            $stmt = $pdo->query($sql);

            if ($stmt->rowCount() == 0) {
                echo "<div class='col-12 text-center text-muted'><h5>Nenhuma missão arquivada ainda.</h5></div>";
            }

            while ($hist = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 border-secondary opacity-75">
                        <div class="card-body">
                            <h6 class="card-title text-success text-decoration-line-through">
                                <?php echo $hist['nivel_urgencia']; ?>
                            </h6>
                            <p class="small text-muted mb-1">📍 <?php echo $hist['localizacao']; ?></p>
                            <p class="card-text small text-white-50">"<?php echo htmlspecialchars($hist['descricao_problema']); ?>"</p>
                            
                            <div class="mt-3 pt-2 border-top border-secondary">
                                <span class="badge bg-success">RESOLVIDO</span>
                                <small class="d-block mt-1 text-muted">Civil: <?php echo $hist['nome_cidadao']; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <div class="stark-footer">
        <p>STARK INDUSTRIES PROPRIETARY NETWORK</p>
        <p>SYSTEM: J.A.R.V.I.S. v4.0.2 | ACCESS LEVEL: ARCHIVE</p>
    </div>
</body>
</html>