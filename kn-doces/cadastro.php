<?php
session_start();
$_SESSION['idUsuario'] = '';
$_SESSION['emailUsuario'] = '';
$nomeUsuario = $_POST["nomeUsuario"];
$emailUsuario = $_POST["emailUsuario"];
$nascUsuario = $_POST["nascUsuario"];
$senhaUsuario = $_POST["senhaUsuario"];
$confirmarSenha = $_POST["confirmarSenha"];

if(($nomeUsuario == "" || $nomeUsuario == null) || ($emailUsuario == "" || $emailUsuario == null) || ($nascUsuario == "" || $nascUsuario == null) || ($senhaUsuario == "" || $senhaUsuario == null) || ($confirmarSenha == "" || $confirmarSenha == null)){
    echo"<script language='javascript' type='text/javascript'>
    alert('Todos os campos devem ser prenchidos');window.location.href='tela_cadastro.php';</script>";
}

else{

  if($senhaUsuario != $confirmarSenha){
    echo"<script language='javascript' type='text/javascript'>
    alert('Os campos Senha e Confirme Sua Senha devem ser iguais');window.location.href='tela_cadastro.php';</script>";
  }
  
  else{
    $connect = mysqli_connect('localhost', 'root', '');
    $db = mysqli_select_db($connect, 'kndoces');

    $query_select = "SELECT emailUsuario FROM usuario WHERE emailUsuario = '$emailUsuario'";
    $select = mysqli_query($connect, $query_select);
    $array = mysqli_fetch_array($select);
    $logarray = $array["emailUsuario"];
    
    if ($nomeUsuario)
      if($logarray == $emailUsuario){
          echo"<script language='javascript' type='text/javascript'>
          alert('Esse login já existe');window.location.href='tela_cadastro.php';</script>";
          die();
      }

      else{

          $query = "INSERT INTO usuario (nomeUsuario, emailUsuario, nascUsuario, senhaUsuario) VALUES ('$nomeUsuario', '$emailUsuario', '$nascUsuario', '$senhaUsuario')";
          $insert = mysqli_query($connect, $query);

          if($insert){
            mysqli_close($connect);
            $_SESSION["emailUsuario"] = $emailUsuario;

            echo"<script language='javascript' type='text/javascript'>
            alert('Usuário cadastrado com sucesso!');window.location.href='tela_inicial.php'</script>";

          }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Não foi possível cadastrar esse usuário');window.location.href='tela_cadastro.php'</script>";

            mysqli_close($connect);
          }
      }
      
    }

  }

?>