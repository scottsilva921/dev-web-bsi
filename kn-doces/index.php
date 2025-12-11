
<!--Trabalho realizado por Kaio Henrique, Pedro Vitor e Gabriel Silva-->

<html>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Estilo da página-->
    
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--CSS padrão-->
    <link href="styles.css" rel="stylesheet">

    <!--Icons-->
    <script src="https://kit.fontawesome.com/8fa3e7ecda.js" crossorigin="anonymous"></script>

    <head>
        <link rel="icon" type="image/x-icon" href="imagens/logo.png">
        <title>KN Doces e Guloseimas
        </title>
    </head>

    <body>
        <div class="row d-flex h-100">

            <div class="col-sm-4">
            </div>
            
            <div class="col-sm-4 justify-content-center align-self-center">

                <form class="shadow p-3 mb-5 rounded form-login" method="POST" action="login.php">

                    <div class="p-2 bg-1 text-white text-center">
                        <img class="img-logo" src="imagens/logo.png">
                        <h2 class="">Entrar</h2>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="emailUsuario" placeholder="Digite seu email" name="emailUsuario">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senhaUsuario" placeholder="Digite sua senha" name="senhaUsuario">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                    <p>Ou</p>
                    <a href="tela_cadastro.php" class="btn btn-primary">Cadastrar-se</a>
                </form>

            </div>

            <div class="col-sm-4">
            </div>

        </div>

    </body>
</html>
