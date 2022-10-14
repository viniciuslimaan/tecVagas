<?php
include_once('../../conexao/conectar.php');

class Candidatar {
    private $idCandidatar = null;
    private $idVaga = null;
    private $idCandidato = null;
    private $data = null;
    private $erro = null;

    public function __get($var) {
        return $this->$var;
    }
    public function __set($var, $value) {
        $this->$var = $value;
    }

    public function candidatarCandidato() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM candidatar WHERE idVaga = ".$this->idVaga." AND idCandidato = ".$this->idCandidato;
        $comando = $conn->query($sql);
        $linha = $comando->fetch_assoc();

        if ($linha > 0){
            $this->erro = 'Você já se candidatou a essa vaga.';
            return false;
            $conn->close();
        } else {

            $sql = "INSERT INTO candidatar (idVaga, idCandidato, data) VALUES (?, ?, ?)";

            try {
                $comando = $conn->prepare($sql);
                $comando->bind_param('iis', $this->idVaga, $this->idCandidato, $this->data);
                $comando->execute();
                return true;
            } catch (Exception $erro) {
                $this->erro = $erro->getMessage();
                return false;
            } finally {
                $conn->close();
            }
        }
    }

    public function enviarEmail() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT titulo, idEmpresa FROM vaga WHERE idVaga = ".$this->idVaga;

        try {
            $comando = $conn->query($sql);
            $resultado[] = $comando->fetch_assoc();
            // $resultado[] = $dadosVaga['titulo'];

            $sql = "SELECT nome, email FROM empresa WHERE idEmpresa = ".$resultado[0]['idEmpresa'];
            $comando = $conn->query($sql);
            $resultado[] = $comando->fetch_assoc();
            return $resultado;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        } 
    }

    public function deixarVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "DELETE FROM candidatar WHERE idVaga = ".$this->idVaga." AND idCandidato = ".$this->idCandidato;

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