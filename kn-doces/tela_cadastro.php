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

                <form class="shadow p-3 mb-5 rounded form-login" method="POST" action="cadastro.php">

                    <div class="p-2 bg-1 text-white text-center">
                        <img class="img-logo" src="imagens/logo.png">
                        <h2 class="">Cadastrar-se</h2>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3 mt-3">
                                <label for="username" class="form-label">Nome de Usuário:</label>
                                <input type="text" name="nomeUsuario" id="nomeUsuario" class="form-control" placeholder="Digite um nome de usuário">
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="emailUsuario" id="emailUsuario" class="form-control" placeholder="Digite seu email">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pwd" class="form-label">Data de Nascimento:</label>
                        <input type="date" name="nascUsuario" id="nascUsuario" class="form-control">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Senha:</label>
                                <input type="password" name="senhaUsuario" id="senhaUsuario" class="form-control" placeholder="Digite sua senha">
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Confirme Sua Senha:</label>
                                <input type="password" name="confirmarSenha" id="confirmarSenha" class="form-control" placeholder="Digite sua senha">
                            </div>
                        </div>

                    </div>

                    <div class="row p-2">
                        <button type="submit" class="btn btn-primary">Pronto</button>
                    </div>
                </form>

            </div>

            <div class="col-sm-4">
            </div>

        </div>

    </body>
</html>