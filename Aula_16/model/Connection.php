<?php 
namespace Aula_16;

use PDO;
use PDOException;

class Connection {
    private static $instance = null;
    
    public static function getInstance() {
        if (!self::$instance) {
            try {
                // Ajuste de usuário e senha aqui
                $host = 'localhost';
                $dbname = 'projeto_bebidas';
                $user = 'root';
                $pass = 'senaisp';

                // Conecta ao MySQL
                self::$instance = new PDO(
                    "mysql:host=$host;charset=utf8mb4", 
                    $user, 
                    $pass
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Cria o banco de dados se não existir
                self::$instance->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
                self::$instance->exec("USE $dbname");

            } catch (PDOException $e) {
                die("Erro ao conectar ao MySQL: " . $e->getMessage());
            }   
        }
        return self::$instance;
    }
}
?>