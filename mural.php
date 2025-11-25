<?php 
require 'php/db.php'; 
session_start();
?>
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
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="text-danger" style="text-shadow: 0 0 10px red;">🛡️ Central de Comando</h2>
                <p class="text-light">Operador: <strong><?php echo $_SESSION['usuario_nome']; ?></strong></p>
            </div>
            <div>
                <a href="arquivo_morto.php" class="btn btn-outline-secondary me-2">📂 Ver Arquivo Morto</a>
                <a href="index.php" class="btn btn-outline-danger">Sair</a>
            </div>
        </div>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'missao_concluida'): ?>
            <div class="alert alert-success border-success text-success bg-opacity-10 bg-success mb-4">
                <strong>Sucesso!</strong> Missão movida para o Arquivo Morto.
            </div>
        <?php endif; ?>

        <h4 class="mb-4 text-warning" style="border-bottom: 1px solid #ffc107; padding-bottom: 10px;">
            ⚠️ AMEAÇAS ATIVAS
        </h4>
        
        <div class="row">
            <?php
            $sql = "SELECT * FROM missoes WHERE status != 'Concluida' ORDER BY data_criacao DESC";
            $stmt = $pdo->query($sql);

            if ($stmt->rowCount() == 0) {
                echo "<div class='col-12 text-center text-light py-5'><h5>Nenhuma ameaça ativa. O mundo está seguro.</h5></div>";
            }

            while ($missao = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $borderClass = ($missao['status'] == 'Pendente') ? 'border-danger' : 'border-warning';
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 <?php echo $borderClass; ?>" style="border-width: 2px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-uppercase"><?php echo $missao['nivel_urgencia']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-light opacity-75">📍 <?php echo $missao['localizacao']; ?></h6>
                            <p class="card-text text-light text-truncate">"<?php echo htmlspecialchars($missao['descricao_problema']); ?>"</p>
                            <?php if (!empty($missao['foto_ocorrencia'])): ?>
                                <div class="mb-2 text-info small">
                                    📷 Contém Imagem Anexada
                                </div>
                            <?php endif; ?>
                            <div class="mt-auto">
                                <div class="alert alert-dark p-2 mt-2 mb-3" style="background: rgba(0,0,0,0.3); border: none;">
                                    <small class="text-light">Solicitante: <?php echo $missao['nome_cidadao']; ?></small>
                                </div>
                                <a href="detalhes_missao.php?id=<?php echo $missao['id']; ?>" class="btn btn-outline-info w-100 mb-2">
                                    🔍 Ver Detalhes & Foto
                                </a>
                                <?php if ($missao['status'] == 'Pendente'): ?>
                                    <form action="php/atualizar.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
                                        <input type="hidden" name="novo_status" value="Em Andamento">
                                        <button class="btn btn-warning w-100">Aceitar Missão</button>
                                    </form>
                                <?php else: ?>
                                    <form action="php/atualizar.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
                                        <input type="hidden" name="novo_status" value="Concluida">
                                        <button class="btn btn-success w-100">Concluir & Arquivar</button>
                                    </form>
                                <?php endif; ?>
                            </div>
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