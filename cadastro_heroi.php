<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Recrutamento de Heróis | Stark Ind.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
</head>
<body> <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>🦸 Cadastro de Super-Herói</h3>
                    </div>
                    <div class="card-body">
                        <form action="php/registrar_usuario.php" method="POST">
                            <input type="hidden" name="tipo_usuario" value="heroi">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Nome do Herói (Codinome):</label>
                                    <input type="text" name="nome" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Identidade Secreta (Opcional):</label>
                                    <input type="text" name="identidade" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Super Poderes:</label>
                                <input type="text" name="poderes" class="form-control" placeholder="Ex: Voo, Super Força..." required>
                            </div>

                            <div class="mb-3">
                                <label>Afiliação:</label>
                                <select name="afiliacao" class="form-select">
                                    <option value="Solo">Trabalho Sozinho</option>
                                    <option value="Vingadores">Vingadores</option>
                                    <option value="Jovens Vingadores">Jovens Vingadores</option>
                                    <option value="Quarteto Fantástico">Quarteto Fantástico</option>
                                    <option value="X-Men">X-Men</option>
                                    <option value="X-Force">X-Force</option>
                                    <option value="Guardiões da Galáxia">Guardiões da Galáxia</option>
                                    <option value="Novos Guerreiros">Novos Guerreiros</option>
                                    <option value="Defensores">Defensores</option>
                                    <option value="Thunderbolts">Thunderbolts</option>
                                    <option value="S.H.I.E.L.D">S.H.I.E.L.D</option>
                                    <option value="S.W.O.R.D">S.W.O.R.D</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>E-mail Oficial:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Crie sua Senha de Acesso:</label>
                                    <input type="password" name="senha" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger w-100">Finalizar Cadastro</button>
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