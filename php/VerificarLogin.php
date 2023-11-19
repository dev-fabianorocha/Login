<?php

//SE NÃO TIVER SESSÃO DE LOGIN, VOLTARÁ PARA TELA DE LOGIN
if(!$_SESSION) {
    header('Location: index.php'); 
}else {
    $userName = $_SESSION['login'];
    echo ucfirst($userName);
}

?>