<?php
session_start();
require 'php/db.php';

$nome_usuario = $_SESSION['usuario_nome'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Chamados | Stark Ind.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(0, 242, 255, 0.1);
            color: #fff;
        }
        .table td, .table th {
            background-color: transparent !important; 
            border-color: #2a3b55; 
        }
    </style>
</head>
<body> 
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="text-info" style="text-shadow: 0 0 10px cyan;">📡 Meus Chamados</h2>
                <p class="text-light">Cidadão: <strong><?php echo htmlspecialchars($nome_usuario); ?></strong></p>
            </div>
            <div>
                <a href="painel_civil.php" class="btn btn-outline-primary me-2">📝 Nova Solicitação</a>
                <a href="index.php" class="btn btn-outline-danger">Sair</a>
            </div>
        </div>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'sucesso'): ?>
            <div class="alert alert-success border-success text-success bg-opacity-10 bg-success mb-4">
                <strong>Solicitação Enviada!</strong> Acompanhe o status abaixo.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <div class="card" style="background-color: rgba(12, 20, 35, 0.85) !important; border: 1px solid #00f2ff;">
            <div class="card-header border-bottom border-info">
                <h3 class="text-light mb-0">Histórico de Solicitações</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-light mb-0">
                        <thead>
                            <tr>
                                <th class="text-info">Status</th>
                                <th class="text-light">Problema Relatado</th>
                                <th class="text-light">Local</th>
                                <th class="text-light">Nível de Urgência</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM missoes WHERE nome_cidadao = ? ORDER BY data_criacao DESC";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([$nome_usuario]);
                            
                            if ($stmt->rowCount() == 0) {
                                echo "<tr><td colspan='4' class='text-center py-4 text-light opacity-75'>Nenhuma solicitação registrada no sistema.</td></tr>";
                            }

                            while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $corStatus = match($linha['status']) {
                                    'Pendente' => 'text-danger fw-bold',
                                    'Em Andamento' => 'text-warning fw-bold',
                                    'Concluida' => 'text-success fw-bold',
                                    default => 'text-white'
                                };
                                
                                $icone = match($linha['status']) {
                                    'Pendente' => '📡 Aguardando Herói',
                                    'Em Andamento' => '🚀 Herói a Caminho',
                                    'Concluida' => '✅ Resolvido',
                                };
                            ?>
                                <tr>
                                    <td class="<?php echo $corStatus; ?>"><?php echo $icone; ?></td>
                                    <td class="text-light"><?php echo htmlspecialchars($linha['descricao_problema']); ?></td>
                                    <td class="text-light opacity-75"><?php echo htmlspecialchars($linha['localizacao']); ?></td>
                                    <td class="text-light"><?php echo $linha['nivel_urgencia']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <div class="stark-footer">
        <p>STARK INDUSTRIES PROPRIETARY NETWORK</p>
        <p>SYSTEM: J.A.R.V.I.S. v4.0.2 | ACCESS LEVEL: CITIZEN</p>
    </div>
</body>
</html>