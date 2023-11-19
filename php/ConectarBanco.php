<?php
    
    define('DB_HOST'            , ".\SQLEXPRESS");
    define('DB_USER'            , "sa");
    define('DB_PASSOWRD'        , "inter#system");
    define('DB_NAME'            , "LOGIN");
    define('DB_DRIVER'          , "sqlsrv");  

class conexao 
{
    private static $conn;
    
    private function __construct(){}

    public static function getConnection() {

        $pdoConfig = DB_DRIVER . ":". "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database =" .DB_NAME.";";

        try {
            if(!isset($conn)){
                $conn = new PDO($pdoConfig, DB_USER, DB_PASSOWRD);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $conn;
        } catch (PDOException $e) {
            $mensagem = "Drivers disponíveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
            exit;
        }
    }
}

?>