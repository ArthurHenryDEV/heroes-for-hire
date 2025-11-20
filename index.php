<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Hero for Hire - Peça Socorro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-danger text-white">
                <h3>🚨 Pedido de Socorro</h3>
            </div>
            <div class="card-body">
                <form action="php/inserir.php" method="POST" onsubmit="return validarFormulario()">
                    <div class="mb-3">
                        <label>Seu Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>O que está acontecendo?</label>
                        <textarea name="descricao" id="descricao" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Localização:</label>
                        <input type="text" name="local" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Nível de Urgência:</label>
                        <select name="urgencia" class="form-select">
                            <option value="Baixa">Baixa (Gato na árvore)</option>
                            <option value="Media">Média (Assalto/Fuga)</option>
                            <option value="Alta">Alta (Super-vilão)</option>
                            <option value="Vingadores">Nível Vingadores (Aliens)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger w-100">CHAMAR HERÓI!</button>
                </form>
            </div>
        </div>
        <a href="mural.php" class="d-block mt-3 text-center">Sou um Herói (Acesso Restrito)</a>
    </div>
    <script src="js/script.js"></script>
</body>
</html>