<?php

    session_start();

    $idUsuario = $_SESSION["idUsuario"];
    $today = date("Y-m-d");

    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $query_update = "UPDATE pedido SET dataPedido = '$today' WHERE idUsuario = '$idUsuario' AND dataPedido is NULL";
    $update = mysqli_query($connect, $query_update);

    header("Location: tela_carrinho.php");

?>