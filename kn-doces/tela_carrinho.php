<!--Trabalho realizado por Kaio Henrique, Pedro Vitor e Gabriel Silva-->
<?php
    session_start();
    $emailUsuario = $_SESSION["emailUsuario"];
    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');
    $idUsuario = $_SESSION['idUsuario'];
    $valorTotal = 0;

    $query_select = "SELECT * FROM pedido WHERE (idUsuario = '$idUsuario') AND (dataPedido is NULL) ";

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
    </head>

    <body>

        <button onclick="topFunction()" id="topButton" title="Go to top"><i class="fa-solid fa-turn-up"></i></button>

        <div class="p-5 bg-1 text-white text-center">
            <a href="tela_inicial.php"><img class="img-logo" src="imagens/logo.png"></a>
        </div>

        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid justify-content-center">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="tela_sua_conta.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sua Conta"><i class="fa-solid fa-circle-user"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tela_inicial.php#feedbacks" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Feedbacks"><i class="fa-solid fa-comment"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tela_inicial.php#produtos" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nossos Produtos"><i class="fa-solid fa-cookie-bite"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tela_inicial.php#redes-sociais" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nossas Redes Sociais"><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tela_carrinho.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Seu carrinho"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
                </ul>
            </div>
        </nav>

        <div class="row py-3">
            
            <div class="col-sm-1"></div>

            <div class="col-sm-10 bg-1 p-3 mb-5 rounded">

                <div id="produtos" class="py-5">

                    <div class="row px-5">

                        <div class="col-8 bg-2 p-4 mb-5 rounded">

                            <h3 class="">Seu carrinho</h3>
                            <div style="overflow: hidden; border-radius: 10px;">
                                <table class="table-carrinho">
                                    <tr>
                                        <th>Produto</th>
                                        <th>Valor</th>
                                        <th>Quantidade</th>
                                    </tr>
                                        <?php
                                        
                                        while ($p = mysqli_fetch_assoc($select)){
                                            $idPedido = $p['idPedido'];
                                            $idUsuario = $p['idUsuario'];
                                            $idProduto = $p['idProduto'];
                                            $qtdProduto = $p['qtdProduto'];

                                            $query_select = "SELECT nomeProduto, valorProduto, imagemProduto FROM produto WHERE idProduto = '$idProduto'";
                                            $select2 = mysqli_query($connect, $query_select);
                                            $array = mysqli_fetch_array($select2);
                                            $nomeProduto = $array["nomeProduto"];
                                            $valorProduto = $array["valorProduto"];
                                            $valorProdutoPrint = number_format($array["valorProduto"], 2, ",", ".");
                                            $imagemProduto = $array["imagemProduto"];

                                            echo '<tr>
                                                    <td>',$nomeProduto,'</td>
                                                    <td>R$ ',$valorProdutoPrint,'</td>
                                                    <td>',$qtdProduto,'</td>
                                                </tr>';
                                            
                                            $valorTotal += ($valorProduto * $qtdProduto);
                                        }

                                        ?>
                                </table>
                            </div>
                        </div>

                        <div class="col-1"></div>

                        <div class="col-3 bg-2 p-4 mb-5 rounded">
                            <h4>Valor Total: <span style="color: #5f2a24">R$<?php echo number_format($valorTotal, 2, ",", ".")?></span></h4>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#modalFinalizar" class="btn bg-3">Finalizar</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-1"></div>

        </div>

        <!-- The Modal -->
        <div class="modal fade" id="modalFinalizar">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmar Compra</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Deseja finalizar a comprar?
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <a href="tela_inicial.php#produtos" class="btn bg-1">Continuar Comprando</a>
                    <a href="finalizar_compra.php" class="btn bg-3">Finalizar</a>
                </div>

                </div>
            </div>
        </div>

        <div class="mt-5 p-4 bg-dark text-white text-center">
            <p>© 2025 Todos os direitos reservados.</p>
            <a href="">Política de privacidade</a>
        </div>
        
        <script src="script.js"></script>
    </body>
    
</html>