<?php
    session_start();

    $emailUsuario = $_POST["emailUsuario"];
    $senhaUsuario = $_POST["senhaUsuario"];

    if (($emailUsuario == '' || $emailUsuario == null) || ($senhaUsuario == '' || $senhaUsuario == null)){
        echo"<script language='javascript' type='text/javascript'>
        alert('Todos os campos devem ser prenchidos');window.location.href='index.php';</script>";
    }

    else{
        $connect = mysqli_connect('localhost', 'root', '');
        $db = mysqli_select_db($connect, 'kndoces');

        $query_select = "SELECT emailUsuario, senhaUsuario FROM usuario WHERE emailUsuario = '$emailUsuario'";
        $select = mysqli_query($connect, $query_select);
        $array = mysqli_fetch_array($select);
        $logEmailUsuario = $array["emailUsuario"];
        $logSenhaUsuario = $array["senhaUsuario"];

        if (($logEmailUsuario == "" || $logEmailUsuario == null) || ($logSenhaUsuario != $senhaUsuario)){
            echo"<script language='javascript' type='text/javascript'>alert('Email ou senha incorretos!');window.location.href='index.php';</script>";
        }
        else{
            mysqli_close($connect);
            $_SESSION["emailUsuario"] = $emailUsuario;

            header('Location: tela_inicial.php');
        }
        
    }
    
?>