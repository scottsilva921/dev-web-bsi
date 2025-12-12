<?php

    session_start();

    $idUsuario = $_SESSION["idUsuario"];
    $today = date("Y-m-d");

    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $query_select = "SELECT idPedido FROM pedido WHERE idUsuario = '$idUsuario' AND dataPedido is NULL";
    $select = mysqli_query($connect, $query_select);

    if (mysqli_fetch_array($select) != NULL){
        $query_update = "UPDATE pedido SET dataPedido = '$today' WHERE idUsuario = '$idUsuario' AND dataPedido is NULL";
        $update = mysqli_query($connect, $query_update);
        if ($update){
            echo"<script language='javascript' type='text/javascript'>alert('Compra realizada com sucesso!');</script>";
        }
        else{
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível concluir a compra!');</script>";
            echo"<script language='javascript' type='text/javascript'>window.location.href='tela_carrinho.php';</script>";
        }
        
    }

    else{
        echo"<script language='javascript' type='text/javascript'>alert('Carrinho vazio! Continue comprando');</script>";
    }

    echo"<script language='javascript' type='text/javascript'>window.location.href='tela_inicial.php';</script>";

?>