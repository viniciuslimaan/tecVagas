<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../..');
$dotenv->load();

// Mostrar erros
ini_set('display_errors', true);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Setar o formato de data/hora
date_default_timezone_set('America/Sao_Paulo');

// Conexão
class Conexao {
    private $host = null;
    private $user = null;
    private $senha = null;
    private $banco = null;

    public function __construct() {
        $this->host = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USER'];
        $this->senha = $_ENV['DB_PASS'];
        $this->banco = $_ENV['DB_NAME'];
    }

    private function conectar() {
        $conn = new mysqli($this->host, $this->user, $this->senha, $this->banco);

        if ($conn->connect_error) {
            die('Erro ao tentar conectar ao banco de dados: '.$conn->connect_error);
        }

        return $conn;
    }

    public function pegarConexao() {
        return $this->conectar();
    }
}