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
        <h1 class="text-center mb-5">🛡️ Heroes for Hire</h1>
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="row">
                            
                            <div class="col-md-5">
                                <h3>Sou Cidadão</h3>
                                <p class="opacity-75">Preciso de ajuda!</p>
                                <form action="php/login.php" method="POST">
                                    <input type="hidden" name="tipo" value="civil">
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Seu E-mail" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="senha" class="form-control" placeholder="Sua Senha" required>
                                    </div>
                                    <button class="btn btn-primary w-100">Entrar</button>
                                </form>
                                <hr style="border-color: #2a3b55;">
                                <a href="cadastro_civil.php" class="btn btn-link text-info w-100 btn-sm">Criar conta Cidadão</a>
                            </div>

                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                <div style="height: 100%; border-left: 1px solid #2a3b55; box-shadow: 0 0 10px cyan;"></div>
                            </div>

                            <div class="col-md-5 text-end">
                                <h3>Sou Herói</h3>
                                <p class="opacity-75">Acesso Restrito S.H.I.E.L.D.</p>
                                <form action="php/login.php" method="POST">
                                    <input type="hidden" name="tipo" value="heroi">
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control text-end" placeholder="E-mail do Herói" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="senha" class="form-control text-end" placeholder="Senha Secreta" required>
                                    </div>
                                    <button class="btn btn-danger w-100">Acessar QG</button>
                                </form>
                                <hr style="border-color: #ff3333;">
                                <button onclick="verificarCodigoHeroi()" class="btn btn-link text-danger w-100 btn-sm">Recrutamento de Heróis</button>
                            </div>

                        </div>
                    </div>
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