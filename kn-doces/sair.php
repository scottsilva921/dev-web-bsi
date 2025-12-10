<?php
    session_start();
    
    $_SESSION['idUsuario'] = '';
    $_SESSION['emailUsuario'] = '';

    header('Location: index.php');
?>