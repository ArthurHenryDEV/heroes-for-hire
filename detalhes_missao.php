<?php
require 'php/db.php';
session_start();
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: mural.php");
    exit;
}

$id_missao = $_GET['id'];
$sql = "SELECT * FROM missoes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_missao]);
$missao = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$missao) {
    echo "Missão não encontrada.";
    exit;
}
$corUrgencia = match($missao['nivel_urgencia']) {
    'Baixa' => 'text-info',
    'Media' => 'text-warning',
    'Alta' => 'text-danger',
    'Vingadores' => 'text-purple', 
    default => 'text-white'
};
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Missão #<?php echo $missao['id']; ?> | Stark Ind.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
    <style>
        .img-detalhe {
            width: 100%;
            max-height: 500px;
            object-fit: contain; 
            background-color: rgba(0,0,0,0.5);
            border: 1px solid var(--stark-blue);
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <a href="mural.php" class="btn btn-outline-secondary mb-4">← Voltar para o Mural</a>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="<?php echo $corUrgencia; ?>">
                    MISSÃO #<?php echo $missao['id']; ?>: <?php echo strtoupper($missao['nivel_urgencia']); ?>
                </h3>
                <span class="badge bg-secondary"><?php echo $missao['status']; ?></span>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="text-light border-bottom border-secondary pb-2 mb-3">Dados da Ocorrência</h5>
                        
                        <p class="mb-1 text-muted small">SOLICITANTE</p>
                        <p class="text-light fs-5"><?php echo $missao['nome_cidadao']; ?></p>

                        <p class="mb-1 text-muted small">LOCALIZAÇÃO</p>
                        <p class="text-light fs-5">📍 <?php echo $missao['localizacao']; ?></p>

                        <p class="mb-1 text-muted small">DESCRIÇÃO TÁTICA</p>
                        <div class="p-3 mb-3" style="background: rgba(255,255,255,0.05); border-left: 3px solid var(--stark-blue);">
                            <p class="text-light mb-0">"<?php echo htmlspecialchars($missao['descricao_problema']); ?>"</p>
                        </div>

                        <p class="mb-1 text-muted small">DATA DA SOLICITAÇÃO</p>
                        <p class="text-light"><?php echo date('d/m/Y H:i', strtotime($missao['data_criacao'])); ?></p>
                        <div class="mt-4 pt-3 border-top border-secondary">
                            <?php if ($missao['status'] == 'Pendente'): ?>
                                <form action="php/atualizar.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
                                    <input type="hidden" name="novo_status" value="Em Andamento">
                                    <button class="btn btn-warning w-100 fw-bold">ACEITAR MISSÃO AGORA</button>
                                </form>
                            <?php elseif ($missao['status'] == 'Em Andamento'): ?>
                                <form action="php/atualizar.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
                                    <input type="hidden" name="novo_status" value="Concluida">
                                    <button class="btn btn-success w-100 fw-bold">REPORTAR COMO CONCLUÍDA</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <h5 class="text-light border-bottom border-secondary pb-2 mb-3">Evidência Visual</h5>
                        
                        <?php if (!empty($missao['foto_ocorrencia'])): ?>
                            <img src="<?php echo $missao['foto_ocorrencia']; ?>" class="img-fluid img-detalhe rounded" alt="Foto da Ocorrência">
                            <p class="text-info mt-2 small">Imagem enviada via satélite seguro.</p>
                        <?php else: ?>
                            <div class="d-flex flex-column justify-content-center align-items-center h-75 border border-secondary rounded bg-dark bg-opacity-50">
                                <span class="display-1 text-muted">📷</span>
                                <p class="text-muted mt-3">Nenhuma imagem fornecida pelo civil.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="stark-footer">
        <p>STARK INDUSTRIES PROPRIETARY NETWORK</p>
        <p>SYSTEM: J.A.R.V.I.S. v4.0.2 | ACCESS LEVEL: RESTRICTED</p>
    </div>
</body>
</html>