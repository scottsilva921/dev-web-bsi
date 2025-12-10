<?php
    session_start();
    
    $emailUsuario = $_POST["emailUsuario"];
    $senhaUsuario = $_POST["senhaUsuario"];

    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $query_select = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '$emailUsuario'";
    $select = mysqli_query($connect, $query_select);
    $array = mysqli_fetch_array($select);
    $logarray = $array["emailUsuario"];

    if($emailUsuario == "" || $emailUsuario == null){
        echo"<script language='javascript' type='text/javascript'>
        alert('O campo login deve ser preenchido');window.location.href='
        cadastro.html';</script>";
    }
    else{
        $query_senha = "SELECT senhaUsuario FROM usuario WHERE emailUsuario = '$emailUsuario'";
        $select = mysqli_query($connect, $query_senha);
        $array = mysqli_fetch_array($select);
        $logarray = $array["senhaUsuario"];

        if ($logarray != $senhaUsuario){
            echo"<script language='javascript' type='text/javascript'>alert('Senha Incorreta!');window.location.href='cadastro.html';</script>";
        }
        else{
            mysqli_close($connect);
            $_SESSION["emailUsuario"] = $emailUsuario;

            header('Location: tela_inicial.php');
        }
    }
?>