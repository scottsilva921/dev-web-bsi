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

    if(($emailUsuario == "" || $emailUsuario == null) || ($nomeUsuario == "" || $nomeUsuario == NULL) || ($nascUsuario == "" || $nascUsuario == NULL)){
        echo "<script language='javascript' type='text/javascript'>alert('Todos os campos devem estar preenchidos!');window.location.href='tela_sua_conta.php';</script>";
    }
    else{
        
        if($senhaAntiga == "" || $senhaAntiga == null){
            $query_update = "UPDATE usuario SET nomeUsuario = '$nomeUsuario', emailUsuario = '$emailUsuario', nascUsuario = '$nascUsuario' WHERE idUsuario = '$idUsuario'";
            $update = mysqli_query($connect, $query_update);

            if($update){
                $_SESSION["emailUsuario"] = $emailUsuario;
                mysqli_close($connect);
                echo "<script language='javascript' type='text/javascript'>
                alert('Dados alterados com sucesso! Senha não alterada!');window.location.href='tela_sua_conta.php';</script>";
            }
            else{
                mysqli_close($connect);
                echo "<script language='javascript' type='text/javascript'>
                alert('Não foi possível alterar os dados do usuário! Erro: " .mysqli_error($connect). "');window.location.href='tela_sua_conta.php';</script>";
            }
        }
        else{
            if ($senhaAntiga != $senhaUsuario){
                mysqli_close($connect);
                echo "<script language='javascript' type='text/javascript'>alert('Senha antiga está incorreta!');window.location.href='tela_sua_conta.php';</script>";
            }
            else{
                $query_update = "UPDATE usuario SET nomeUsuario = '$nomeUsuario', emailUsuario = '$emailUsuario', nascUsuario = '$nascUsuario', senhaUsuario = '$senhaNova' WHERE idUsuario = '$idUsuario'";
                $update = mysqli_query($connect, $query_update);

                if($update){
                    mysqli_close($connect);
                    $_SESSION["emailUsuario"] = $emailUsuario;
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Dados alterados com sucesso! Senha alterada!');window.location.href='tela_sua_conta.php';</script>";
                    
                }
                else{
                    mysqli_close($connect);
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Não foi possível alterar os dados do usuário! Erro: " .mysqli_error($connect). "');window.location.href='tela_sua_conta.php';</script>";
                }
            }
            

        }
    }
    echo "<script language='javascript' type='text/javascript'>window.location.href='tela_sua_conta.php';</script>";
?>