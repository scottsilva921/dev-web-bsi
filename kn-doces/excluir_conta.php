<?php
    session_start();
    
    $idUsuario = $_SESSION["idUsuario"];

    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $query_delete = "DELETE FROM pedido WHERE idUsuario = '$idUsuario'";
    $delete = mysqli_query($connect, $query_delete);

    $query_delete = "DELETE FROM usuario WHERE idUsuario = '$idUsuario'";
    $delete = mysqli_query($connect, $query_delete);

    mysqli_close($connect);
    echo "<script language='javascript' type='text/javascript'>window.location.href='sair.php';</script>";
?>