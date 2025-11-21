<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Hero for Hire - Acesso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #1a1a2e; color: white; }
        .card { border: none; }
        .divider { border-left: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">🛡️ Hero for Hire</h1>
        
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg text-dark">
                    <div class="card-body p-5">
                        <div class="row">
                            
                            <div class="col-md-5">
                                <h3 class="text-primary">Sou Cidadão</h3>
                                <p>Preciso de ajuda!</p>
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
                                <hr>
                                <a href="cadastro_civil.php" class="btn btn-outline-primary w-100 btn-sm">Criar conta Cidadão</a>
                            </div>

                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                <div class="vr" style="height: 100%;"></div>
                            </div>

                            <div class="col-md-5 text-end">
                                <h3 class="text-danger">Sou Herói</h3>
                                <p>Quero aceitar missões.</p>
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
                                <hr>
                                <button onclick="verificarCodigoHeroi()" class="btn btn-outline-danger w-100 btn-sm">Recrutamento de Heróis</button>
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
</body>
</html>