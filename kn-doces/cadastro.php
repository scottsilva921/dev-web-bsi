<?php

$nomeUsuario = $_POST["nomeUsuario"];
$emailUsuario = $_POST["emailUsuario"];
$nascUsuario = $_POST["nascUsuario"];
$senhaUsuario = $_POST["senhaUsuario"];
$confirmarSenha = $_POST["confirmarSenha"];

$connect = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connect, 'kndoces');

$query_select = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '$emailUsuario'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array["emailUsuario"];

if($nomeUsuario == "" || $nomeUsuario == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";
}

else{
    
    if($logarray == $nomeUsuario){
        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.html';</script>";
        die();
    }

    else{

        $query = "INSERT INTO usuario (nomeUsuario, emailUsuario, nascUsuario, senhaUsuario) VALUES ('$nomeUsuario', '$emailUsuario', '$nascUsuario', '$senhaUsuario')";
        $insert = mysqli_query($connect, $query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='login.html'</script>";

          mysqli_close($connect);

          header('Location: index.php');
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";

          mysqli_close($connect);
        }
    }
}


?>