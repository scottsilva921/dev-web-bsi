<!--Trabalho realizado por Kaio Henrique, Pedro Vitor e Gabriel Silva-->

<?php
    session_start();
    $emailUsuario = $_SESSION["emailUsuario"];
    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $query_select = "SELECT idUsuario, nomeUsuario FROM usuario WHERE emailUsuario = '$emailUsuario'";
    $select = mysqli_query($connect, $query_select);
    $array = mysqli_fetch_array($select);
    $nomeUsuario = $array["nomeUsuario"];
    $_SESSION['idUsuario'] = $array["idUsuario"];

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
            function chamarAdicionarCarrinho(idPedido){
                fetch('adicionar_ao_carrinho.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'idProduto='+idPedido
                })
            }
        </script>
    </head>

    <body>

        <button onclick="topFunction()" id="topButton" title="Go to top"><i class="fa-solid fa-turn-up"></i></button>

        <div class="p-5 bg-1 text-white text-center">
            <img class="img-logo" src="imagens/logo.png">
            <h2>Seja Bem Vindo(a) <?php echo($nomeUsuario) ?></h2>
        </div>

        <nav class="navbar navbar-expand-sm">
            <div class="container-fluid justify-content-center">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="tela_sua_conta.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sua Conta"><i class="fa-solid fa-circle-user"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#feedbacks" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Feedbacks"><i class="fa-solid fa-comment"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#produtos" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nossos Produtos"><i class="fa-solid fa-cookie-bite"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#redes-sociais" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nossas Redes Sociais"><i class="fa-brands fa-instagram"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tela_carrinho.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Seu carrinho"><i class="fa-solid fa-cart-shopping"></i></a>
                </li>
                </ul>
            </div>
        </nav>

        <div class="row py-3">
            <div class="col-sm-2"></div>

            <div class="col-sm-8">
                <div class="py-5">
                    <h1 class="text-center">Se delicie com os melhores doces da região</h1>
                    <h3 class="text-center">Não perca a oportunidade de experimentar os deliciosos doces da <b>KN Doces e Guloseimas</b></h3>
                </div>

                <form id="form-email-oferta" class="form-inline py-3" action="/action_page.php">

                    <h5 class="text-center">Você pode receber ofertas diretamente no seu email e ficar por dentro das novidades da loja!</h5>

                    <div class="input-group mb-3">
                        
                        <input type="text" class="form-control" placeholder="Digite seu email">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-primary" type="button">Receber ofertas por email agora!</button>
                        </div>
                    </div>

                    <!--<p class="text-center"><b>Já temos mais 5.000 clientes cadastrados e satisfeitos!</b></p>-->

                </form>

                <div id="produtos" class="py-5">
                    <h2 class="">Nossos Produtos</h2>

                    <div class="row">
                        
                        <?php

                            while ($p = mysqli_fetch_assoc($select)){
                                $idProduto = $p['idProduto'];
                                $imagemProduto = $p['imagemProduto'];
                                $nomeProduto = $p['nomeProduto'];
                                $descProduto = $p['descProduto'];
                                $valorProduto = $p['valorProduto'];
                                $estoqueProduto = $p['estoqueProduto'];

                                echo '<div class="card" style="width:33%">
                                        <img class="card-img-top" src="',$imagemProduto,'" alt="Card image">
                                        <div class="card-body">
                                            <h4 class="card-title">',$nomeProduto,'</h4>
                                            <p class="card-text">',$descProduto,'</p>
                                            <button onclick="chamarAdicionarCarrinho(',$idProduto,')" class="btn btn-primary">Adicionar ao carrinho</button>
                                        </div>
                                    </div>';
                            }
                        ?>
                        <!--
                        <div class="card" style="width:33%">
                            <img class="card-img-top" src="imagens/palha-chocolate.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Palha Italiana</h4>
                                <p class="card-text">A campeã de vendas!</p>
                                <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
                            </div>
                        </div>

                        <div class="card" style="width:33%">
                            <img class="card-img-top" src="imagens/pe-de-moca.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Pé de Moça</h4>
                                <p class="card-text">O doce de amendoim mais querido!</p>
                                <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
                            </div>
                        </div>

                        <div class="card" style="width:33%">
                            <img class="card-img-top" src="imagens/cocada.jpg" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">Cocada</h4>
                                <p class="card-text">A melhor cocada que você já experimentou!</p>
                                <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
                            </div>
                        </div>
                        -->
                    </div>
                    
                    
                </div>

                <div id="feedbacks" class="py-5">
                        <h2>Feedbacks</h2>
                        <p><img src="imagens/Lisa_Simpson.jpg"><span class="quote"> "Essa palha italiana é simplesmente fenomenal! Super indico!"</span> - Lisa Simpson</p>
                        <p><img src="imagens/klebin.jpg"><span class="quote"> "Nunca comi uma palha italiana tão gostosa! Dá pra sentir o capricho no preparo, é caseira de verdade."</span> - Klebin</p>
                        <p><img src="imagens/ronaldin.jpg"><span class="quote"> "Sabor incrível! Dá pra sentir o gostinho do leite condensado e do amendoim torrado na medida certa."</span> - Ronaldin</p>
                        <p><img src="imagens/paty.jpg"><span class="quote"> "Os doces são incríveis! Tudo feito com muito carinho e sabor — dá pra sentir em cada mordida."</span> - Paty</p>
                    </div>
                
                    <div id="redes-sociais" class="py-5 text-center">
                        <h2>Nos siga em nossas redes sociais</h2>
                        <a href="https://www.instagram.com/kndoceseguloseimas?igsh=MWN0bXoxbnhkMDI3Yg==" class="btn bg-danger"><i class="fa-brands fa-instagram"></i>@kndoceseguloseimas</a>
                        <a href="https://www.instagram.com/kndoceseguloseimas?igsh=MWN0bXoxbnhkMDI3Yg==" class="btn btn-primary"><i class="fa-brands fa-facebook"></i>@kndoceseguloseimas</a>
                        <a href="https://www.instagram.com/kndoceseguloseimas?igsh=MWN0bXoxbnhkMDI3Yg==" class="btn bg-info"><i class="fa-brands fa-twitter"></i>@kndoceseguloseimas</a>
                    </div>

            </div>

            <div class="col-sm-2"></div>
        </div>

        <div class="mt-5 p-4 bg-dark text-white text-center">
            <p>© 2025 Todos os direitos reservados.</p>
            <a href="">Política de privacidade</a>
        </div>
        
        <script src="script.js">
        </script>
    </body>
</html>