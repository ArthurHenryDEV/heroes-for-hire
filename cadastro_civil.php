<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Cidadão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
</head>
<body> 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card"> 
                    <div class="card-header"> 
                        <h3>🏙️ Cadastro de Cidadão</h3>
                    </div>
                    <div class="card-body">
                        <form action="php/registrar_usuario.php" method="POST">
                            <input type="hidden" name="tipo_usuario" value="civil">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">Nome Completo:</label>
                                    <input type="text" name="nome" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">Endereço:</label>
                                    <input type="text" name="endereco" class="form-control" placeholder="Rua, Bairro...">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">E-mail:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label text-light">Crie sua Senha:</label>
                                    <input type="password" name="senha" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Finalizar Cadastro</button>
                            
                            <a href="index.php" class="btn btn-link w-100 mt-2" style="color: var(--stark-blue); text-decoration: none;">Já tenho conta (Voltar)</a>
                        </form>
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