<?php
session_start();
require 'php/db.php';
if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] != 'civil') {
    header("Location: acesso.php");
    exit;
}

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
            <div>
                <a href="historico_civil.php" class="btn btn-outline-primary me-2">📂 Ver Meus Chamados</a>
                <a href="acesso.php" class="btn btn-outline-danger btn-sm">Sair</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Formulário de Solicitação</h3>
                    </div>
                    <div class="card-body">
                        <form action="php/inserir.php" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                            
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
                                <label class="form-label text-light">Foto do Local (Opcional):</label>
                                <input type="file" name="foto" class="form-control text-light" accept="image/*">
                                <div class="form-text text-light opacity-50">Envie uma imagem para auxiliar a equipe tática.</div>
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