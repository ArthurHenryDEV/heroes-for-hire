<?php require 'php/db.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Herói</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-warning">🛡️ Missões Disponíveis</h2>
        
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
                <div class="col-md-4 mb-3">
                    <div class="card bg-secondary text-white <?php echo $borderClass; ?> border-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $missao['nivel_urgencia']; ?> - <?php echo $missao['localizacao']; ?></h5>
                            <p class="card-text"><?php echo $missao['descricao_problema']; ?></p>
                            <p><small>Cidadão: <?php echo $missao['nome_cidadao']; ?></small></p>
                            <p><strong>Status: <?php echo $missao['status']; ?></strong></p>

                            <?php if ($missao['status'] == 'Pendente'): ?>
                                <form action="php/atualizar.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
                                    <input type="hidden" name="novo_status" value="Em Andamento">
                                    <button class="btn btn-warning btn-sm w-100">Aceitar Missão</button>
                                </form>
                            <?php elseif ($missao['status'] == 'Em Andamento'): ?>
                                <form action="php/atualizar.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
                                    <input type="hidden" name="novo_status" value="Concluida">
                                    <button class="btn btn-success btn-sm w-100">Concluir Missão</button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-dark btn-sm w-100" disabled>Missão Cumprida</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <a href="index.php" class="btn btn-outline-light mt-4">Voltar para Home</a>
    </div>
</body>
</html>