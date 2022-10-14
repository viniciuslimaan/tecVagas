<?php
include_once('../../conexao/conectar.php');

class Admin {
    private $idAdmin = null;
    private $login = null;
    private $senha = null;
    private $erro = null;

    public function __get($var) {
        return $var;
    }
    public function __set($var, $valor) {
        $this->$var = $valor;
    }

    public function logar() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM `admin` WHERE login = '".$this->login."' AND senha = '".$this->senha."'";

        try {
            $comando = $conn->query($sql);
            $resultado = $comando->fetch_assoc();
            return $resultado;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function dadosConta() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM `admin` WHERE idAdmin = ".$this->idAdmin;

        try {
            $comando = $conn->query($sql);
            $resultado = $comando->fetch_assoc();
            return $resultado;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function editarConta() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "UPDATE `admin` SET login = '".$this->login."', senha = '".$this->senha."' WHERE idAdmin = ".$this->idAdmin;

        try {
            $comando = $conn->query($sql);
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }
}