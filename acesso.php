<?php
$perfil = $_GET['perfil'] ?? 'ambos'; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Acesso ao Sistema | Stark Ind.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">
            <?php echo ($perfil == 'heroi') ? '🛡️ Acesso Restrito' : '🏙️ Portal do Cidadão'; ?>
        </h1>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-5">
<?php if (isset($_GET['erro'])): ?>
                            
                            <?php if ($_GET['erro'] == 'usuario_inexistente'): ?>
                                <div class="alert alert-danger text-center mb-4" role="alert" 
                                     style="background: rgba(255, 51, 51, 0.1); border: 1px solid #ff3333; color: #ff3333; box-shadow: 0 0 15px rgba(255, 51, 51, 0.2);">
                                    <strong>🚫 ACESSO NEGADO:</strong><br>
                                    Endereço de e-mail não encontrado na base de dados.
                                </div>
                            
                            <?php elseif ($_GET['erro'] == 'senha_incorreta'): ?>
                                <div class="alert alert-warning text-center mb-4" role="alert" 
                                     style="background: rgba(255, 204, 0, 0.1); border: 1px solid #ffcc00; color: #ffcc00; box-shadow: 0 0 15px rgba(255, 204, 0, 0.2);">
                                    <strong>⚠️ CREDENCIAIS INVÁLIDAS:</strong><br>
                                    A senha digitada está incorreta. Tente novamente.
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($perfil == 'civil' || $perfil == 'ambos'): ?>
                            <div class="text-center mb-4">
                                <h3 class="text-primary">Login Cidadão</h3>
                                <p class="opacity-75">Entre para pedir socorro</p>
                            </div>
                            <form action="php/login.php" method="POST">
                                <input type="hidden" name="tipo" value="civil">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Seu E-mail" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="senha" class="form-control" placeholder="Sua Senha" required>
                                </div>
                                <button class="btn btn-primary w-100 mb-3">Entrar</button>
                            </form>
                            <hr style="border-color: #2a3b55;">
                            <a href="cadastro_civil.php" class="btn btn-link text-info w-100 btn-sm">Não tem conta? Cadastre-se</a>
                        <?php endif; ?>

                        <?php if ($perfil == 'heroi' || $perfil == 'ambos'): ?>
                            <div class="text-center mb-4">
                                <h3 class="text-danger">Login S.H.I.E.L.D.</h3>
                                <p class="opacity-75">Identificação Obrigatória</p>
                            </div>
                            <form action="php/login.php" method="POST">
                                <input type="hidden" name="tipo" value="heroi">
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control text-end" placeholder="E-mail do Herói" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="senha" class="form-control text-end" placeholder="Senha Secreta" required>
                                </div>
                                <button class="btn btn-danger w-100 mb-3">Acessar QG</button>
                            </form>
                            <hr style="border-color: #ff3333;">
                            <button onclick="verificarCodigoHeroi()" class="btn btn-link text-danger w-100 btn-sm">Recrutamento de Novos Heróis</button>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="text-center mt-3">
                    <a href="index.php" class="text-muted text-decoration-none">← Voltar para a Seleção</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function verificarCodigoHeroi() {
            let codigo = prompt("Digite o código de acesso da Agência S.H.I.E.L.D:");
            if (codigo === "heroi123") {
                window.location.href = "cadastro_heroi.php";
            } else {
                alert("Código incorreto! Acesso negado.");
            }
        }
    </script>
    
    <div class="stark-footer">
        <p>STARK INDUSTRIES PROPRIETARY NETWORK</p>
        <p>SYSTEM: J.A.R.V.I.S. v4.0.2 | ACCESS LEVEL: RESTRICTED</p>
    </div>
</body>
</html>