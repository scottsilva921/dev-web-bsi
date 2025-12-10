<?php
    session_start();

    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $emailUsuario = $_SESSION['emailUsuario'];
    $query_select = "SELECT idUsuario FROM usuario WHERE emailUsuario = '$emailUsuario'";
    $select = mysqli_query($connect, $query_select);
    $array = mysqli_fetch_array($select);
    $idUsuario = $array["idUsuario"];

    $idProduto = $_POST["idProduto"];
    
    $query_select = "SELECT idPedido, qtdProduto FROM pedido WHERE idUsuario = '$idUsuario' AND idProduto = '$idProduto' AND dataPedido is NULL";
    $select = mysqli_query($connect, $query_select);
    $array = mysqli_fetch_array($select);
    $idPedido = $array["idPedido"];
    $qtdProduto = $array["qtdProduto"]+1;

    if($idPedido != NULL || $idPedido != ''){
        $query_update = "UPDATE pedido SET qtdProduto = '$qtdProduto' WHERE idPedido = '$idPedido'";
        $update = mysqli_query($connect, $query_update);
    }
    else{
        $query_insert = "INSERT INTO pedido(idUsuario, idProduto, dataPedido, qtdProduto) VALUES('$idUsuario', '$idProduto', NULL, '$qtdProduto')";
        $insert = mysqli_query($connect, $query_insert);
    }
    
    mysqli_close($connect);

    header('Location: tela_inicial.php');

?>