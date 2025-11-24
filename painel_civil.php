<?php
session_start();
require 'php/db.php';
$nome_usuario = $_SESSION['usuario_nome'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pedido de Socorro | Stark Ind.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
</head>
<body> 
    <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-danger" style="text-shadow: 0 0 10px red;">🚨 Canal de Emergência</h2>
            <a href="index.php" class="btn btn-outline-info btn-sm">Sair do Sistema</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Formulário de Solicitação</h3>
                    </div>
                    <div class="card-body">
                        <form action="php/inserir.php" method="POST" onsubmit="return validarFormulario()">
                            <?php if (isset($_GET['status']) && $_GET['status'] == 'sucesso'): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert" style="background: rgba(25, 135, 84, 0.2); border: 1px solid #198754; color: #75b798;">
                                    <strong>Sinal Enviado!</strong> Um herói foi notificado via satélite. Mantenha-se seguro.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label class="form-label text-light">Cidadão Identificado:</label>
                                <input type="text" name="nome" id="nome" class="form-control" 
                                       value="<?php echo htmlspecialchars($nome_usuario); ?>" readonly required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-light">Descrição da Ameaça:</label>
                                <textarea name="descricao" id="descricao" class="form-control" rows="3" placeholder="Descreva o perigo..." required></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-light">Coordenadas / Local:</label>
                                <input type="text" name="local" class="form-control" placeholder="Onde o herói deve pousar?" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-light">Nível de Ameaça Detectado:</label>
                                <select name="urgencia" id="selectUrgencia" class="form-select" onchange="mudarCorUrgencia()">
                                    <option value="Baixa">Nível 1 - Baixa (Gato, Furto simples)</option>
                                    <option value="Media">Nível 2 - Média (Assalto, Perseguição)</option>
                                    <option value="Alta">Nível 3 - Alta (Super-vilão, Explosivos)</option>
                                    <option value="Vingadores">Nível ÔMEGA - Vingadores (Invasão Alien)</option>
                                </select>
                                
                                <div id="avisoUrgencia" class="form-text mt-2 text-end fw-bold" style="color: #00f2ff;">
                                    Análise preliminar: Situação estável.
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger w-100 fw-bold" style="box-shadow: 0 0 15px red;">TRANSMITIR SINAL DE SOCORRO</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/script.js"></script>
    
    <div class="stark-footer">
        <p>STARK INDUSTRIES PROPRIETARY NETWORK</p>
        <p>SYSTEM: J.A.R.V.I.S. v4.0.2 | ACCESS LEVEL: CITIZEN</p>
    </div>
</body>
</html>