<?php
    session_start();
    
    $nomeUsuario = $_POST["nomeUsuarioConta"];
    $emailUsuario = $_POST["emailUsuarioConta"];
    $nascUsuario = $_POST["nascUsuarioConta"];
    $senhaAntiga = $_POST["senhaAntigaConta"];
    $senhaNova = $_POST["senhaNovaConta"];
    $idUsuario = $_SESSION["idUsuario"];

    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $query_select = "SELECT senhaUsuario FROM usuario WHERE idUsuario = '$idUsuario'";
    $select = mysqli_query($connect, $query_select);
    $array = mysqli_fetch_array($select);
    $senhaUsuario = $array["senhaUsuario"];

    if($emailUsuario == "" || $emailUsuario == null || $nomeUsuario == "" || $nomeUsuario == NULL || $nascUsuario == "" || $nascUsuario == NULL || $senhaAntiga == "" || $senhaAntiga == NULL || $senhaNova == "" || $senhaNova == NULL){
        echo"<script language='javascript' type='text/javascript'>
        alert('Todos os campos devem estar preenchidos!');window.location.href='
        tela_sua_conta.php';</script>";
    }
    else{
        if ($senhaAntiga != $senhaUsuario){
            echo"<script language='javascript' type='text/javascript'>
            alert('Senha antiga está incorreta!');window.location.href='
            tela_sua_conta.php';</script>";
        }
        else{
            $query_update = "UPDATE usuario SET nomeUsuario = '$nomeUsuario', emailUsuario = '$emailUsuario', nascUsuario = '$nascUsuario', senhaUsuario = '$senhaNova' WHERE idUsuario = '$idUsuario'";
            $update = mysqli_query($connect, $query_update);

            mysqli_close($connect);
            $_SESSION["emailUsuario"] = $emailUsuario;

        }
    }
    header('Location: tela_sua_conta.php');
?>