<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Portal Stark Industries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stark.css" rel="stylesheet">
    <style>
        .choice-card {
            transition: all 0.5s;
            cursor: pointer;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 1px solid var(--stark-blue-dim);
            text-decoration: none;
        }
        .choice-card:hover {
            transform: scale(1.05);
            background-color: rgba(0, 242, 255, 0.05);
            border-color: var(--stark-blue);
            box-shadow: 0 0 30px var(--stark-blue-dim);
        }
        .choice-card.hero-choice:hover {
            border-color: var(--stark-red);
            box-shadow: 0 0 30px rgba(255, 51, 51, 0.3);
            background-color: rgba(255, 51, 51, 0.05);
        }
        .icon-large { font-size: 4rem; margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
        
        <div class="text-center mb-5">
            <h1 style="font-size: 3rem; text-shadow: 0 0 20px var(--stark-blue);">HERO FOR HIRE</h1>
            
            <p class="text-light" style="letter-spacing: 3px;">STARK INDUSTRIES INITIATIVE</p>
        </div>

        <div class="row w-100 justify-content-center">
            
            <div class="col-md-5 mb-4"> 
                <a href="acesso.php?perfil=civil" class="card choice-card text-center text-white">
                    <div class="icon-large">🏙️</div>
                    <h2 style="color: var(--stark-blue);">SOU CIDADÃO</h2>
                    <p>Preciso de ajuda imediata</p>
                </a>
            </div>

            <div class="col-md-5 mb-4">
                <a href="#" onclick="verificarAcessoHeroi(event)" class="card choice-card hero-choice text-center text-white">
                    <div class="icon-large">🛡️</div>
                    <h2 class="text-danger">SOU HERÓI</h2>
                    <p>Acesso Restrito S.H.I.E.L.D.</p>
                </a>
            </div>

        </div>

        <div class="stark-footer mt-5">
            <p>SYSTEM: J.A.R.V.I.S. v4.0.2 | STATUS: ONLINE</p>
        </div>
    </div>

    <script>
        function verificarAcessoHeroi(event) {
            event.preventDefault();
            let codigo = prompt("🔐 PROTOCOLOS DE SEGURANÇA ATIVOS\n\nDigite o código de acesso nível 5 da S.H.I.E.L.D:");
            if (codigo === "heroi123") {
                window.location.href = "acesso.php?perfil=heroi";
            } else {
                alert("🚫 ACESSO NEGADO: Identidade não confirmada. Sua tentativa foi registrada nos servidores da Stark Industries.");
            }
        }
    </script>
</body>
</html>