<!--Trabalho realizado por Kaio Henrique, Pedro Vitor e Gabriel Silva-->

<?php
    session_start();
    $idUsuario = $_SESSION['idUsuario'];
    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $query_select = "SELECT * FROM usuario WHERE idUsuario = '$idUsuario'";
    $select = mysqli_query($connect, $query_select);
    $array = mysqli_fetch_array($select);
    $nomeUsuario = $array["nomeUsuario"];
    $emailUsuario = $array["emailUsuario"];
    $nascUsuario = $array["nascUsuario"];
    $senhaUsuario = $array["senhaUsuario"];

    $query_select = "SELECT * FROM produto WHERE estoqueProduto>0";

    $select = mysqli_query($connect, $query_select);

?>

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

        <script>
            
        </script>
    </head>

    <body>
        <div class="row d-flex h-100">

            <div class="col-sm-4">
            </div>
            
            <div class="col-sm-4 justify-content-center align-self-center">

                <form class="shadow p-3 mb-5 rounded form-login" method="POST" action="alterar_dados_usuario.php">

                    <div class="p-2 bg-1 text-white text-center">
                        <a href="tela_inicial.php"><img class="img-logo" src="imagens/logo.png"></a>
                        <h2 class="">Seus Dados</h2>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3 mt-3">
                                <label for="username" class="form-label">Nome de Usuário:</label>
                                <input type="text" name="nomeUsuarioConta" id="nomeUsuarioConta" class="form-control" value="<?php echo $nomeUsuario?>">
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="emailUsuarioConta" id="emailUsuarioConta" class="form-control" value="<?php echo $emailUsuario?>">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pwd" class="form-label">Data de Nascimento:</label>
                        <input type="date" name="nascUsuarioConta" id="nascUsuarioConta" class="form-control" value="<?php echo $nascUsuario?>">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Senha Antiga:</label>
                                <input type="password" name="senhaAntigaConta" id="senhaAntigaConta" class="form-control" value="<?php echo $senhaUsuario?>">
                            </div>
                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Nova Senha:</label>
                                <input type="password" name="senhaNovaConta" id="senhaNovaConta" class="form-control" Value="<?php echo $senhaUsuario?>">
                            </div>
                        </div>

                    </div>

                    <div class="row p-2">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                        <p></p>
                        <a href="sair.php" class="btn btn-primary">Sair</a>
                        <p></p>
                        <a href="excluir_conta.php" class="btn bg-red">Excluir Conta</a>
                        
                    </div>
                </form>

            </div>

            <div class="col-sm-4">
            </div>

        </div>

    </body>
</html>