<?php

    include "ConectarBanco.php"; 
    session_start();

    class valida {        

        public static function getValida($login, $password){      

            try {
                $conexao    = conexao::getConnection();
                $query      = "select * from USUARIOS where US_NOME = '{$login}' and US_SENHA = '{$password}'";
                $stmt       = $conexao->prepare( $query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));  
                $stmt       -> execute();  
                $row        = $stmt->rowCount(); 
        
                if(($row) AND ($row != 0)){
                    $_SESSION['login'] = $login;
                    header('Location: home.php');
                    exit();
                } 
                else {
                    $_SESSION['naoautenticado'] = true;
                    header('Location: ../index.php');
                    exit();
            }
            }catch(Exception $e){
                echo $e->getMessage();
                exit;
            }
           
        }

    }

    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if(empty($_POST['login']) || empty($_POST['password'])) {
        header('Location: index.php');
        exit();
    }

    $acesso = new valida;
    $acesso->getValida($login, $password);

?>
