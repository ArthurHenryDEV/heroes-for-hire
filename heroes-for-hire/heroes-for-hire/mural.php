<?php require 'php/db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Missões | Stark Ind.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
</head>
<body> 
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-info">🛡️ Missões Ativas</h2>
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'missao_arquivada'): ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert" 
                 style="background: rgba(25, 135, 84, 0.2); border: 1px solid #198754; color: #75b798;">
                <strong>SUCESSO:</strong> Missão concluída e arquivada no banco de dados da S.H.I.E.L.D.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
            <a href="index.php" class="btn btn-outline-danger btn-sm">Encerrar Sessão</a>
        </div>
        
        <div class="row">
            <?php
            $sql = "SELECT * FROM missoes ORDER BY data_criacao DESC";
            $stmt = $pdo->query($sql);
            
            while ($missao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $borderClass = match($missao['status']) {
                    'Pendente' => 'border-danger',   
                    'Em Andamento' => 'border-warning', 
                    'Concluida' => 'border-success',  
                };
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 <?php echo $borderClass; ?>" style="border-width: 2px;">
                        <div class="card-body">
                            <h5 class="card-title text-uppercase" style="letter-spacing: 1px;">
                                <?php echo $missao['nivel_urgencia']; ?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                📍 <?php echo $missao['localizacao']; ?>
                            </h6>
                            
                            <p class="card-text mt-3">
                                "<?php echo htmlspecialchars($missao['descricao_problema']); ?>"
                            </p>
                            
                            <div class="alert alert-dark p-2 mt-3 mb-3" style="background: rgba(0,0,0,0.3); border: none;">
                                <small>Solicitante: <?php echo $missao['nome_cidadao']; ?></small><br>
                                <strong>Status: <?php echo $missao['status']; ?></strong>
                            </div>
                            <?php if ($missao['status'] == 'Pendente'): ?>
                                <form action="php/atualizar.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
                                    <input type="hidden" name="novo_status" value="Em Andamento">
                                    <button class="btn btn-warning w-100 fw-bold">Aceitar Missão</button>
                                </form>
                            <?php elseif ($missao['status'] == 'Em Andamento'): ?>
                                <form action="php/atualizar.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
                                    <input type="hidden" name="novo_status" value="Concluida">
                                    <button class="btn btn-success w-100 fw-bold">Concluir Missão</button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-outline-secondary w-100" disabled>Arquivo Morto</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="stark-footer">
        <p>STARK INDUSTRIES PROPRIETARY NETWORK</p>
        <p>SYSTEM: J.A.R.V.I.S. v4.0.2 | ACCESS LEVEL: RESTRICTED</p>
    </div>
</body>
</html>