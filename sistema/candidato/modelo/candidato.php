<?php
require_once('../../conexao/conectar.php');

class Candidato {
    private $idCandidato = null;
    private $nome = null;
    private $sobrenome = null;
    private $email = null;
    private $senha = null;
    private $telefone = null;
    private $cidade = null;
    private $cep = null;
    private $sexo = null;
    private $relacaoEtec = null;
    private $curriculo = null;
    private $deseja = null;
    private $erro = null;

    public function __get($var) {
        return $this->$var;
    }
    public function __set($var, $valor) {
        $this->$var = $valor;
    }

    public function adicionarCandidato() {
        // Chamar a conexão
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        // Verificar se o email já foi cadastrado
        $sql = "SELECT * FROM candidato WHERE email = '".$this->email."'";
        $comando = $conn->query($sql);
        $linha = $comando->fetch_assoc();

        if ($linha > 0){
            $this->erro = 'E-mail já cadastrado!';
            return false;
            $conn->close();
            $comando->close();
        } else {

            // Cadastra o candidato
            $sql = "INSERT INTO candidato (nome, sobrenome, email, senha, telefone, cidade, cep, sexo, relacaoEtec, curriculo, deseja) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            try {
                $comando = $conn->prepare($sql);
                $comando->bind_param('sssssssssss', $this->nome, $this->sobrenome, $this->email, $this->senha, $this->telefone, 
                $this->cidade, $this->cep, $this->sexo, $this->relacaoEtec, $this->curriculo, $this->deseja);
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

    public function listarCandidato() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM candidato";

        try {
            $comando = $conn->query($sql);
            while ($dado = $comando->fetch_assoc()) {
                $resultado[] = $dado;
            }
            if (!isset($resultado)) {
                unset($resultado);
                return false;
            } else {
                return $resultado;
            }
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function verCandidato() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM candidato WHERE idCandidato = ".$this->idCandidato;

        try {
            $comando = $conn->query($sql);
            while ($dado = $comando->fetch_assoc()) {
                $resultado[] = $dado;
            }
            if (!isset($resultado)) {
                unset($resultado);
                return false;
            } else {
                return $resultado;
            }
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function editarCandidato() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "UPDATE candidato SET nome = ?, sobrenome = ?, email = ?, telefone = ?, cidade = ?, cep = ?, sexo = ?, 
        relacaoEtec = ?, deseja = ? WHERE idCandidato = ?";

        try {
            $comando = $conn->prepare($sql);
            $comando->bind_param('ssssssssss', $this->nome, $this->sobrenome, $this->email, $this->telefone, 
            $this->cidade, $this->cep, $this->sexo, $this->relacaoEtec, $this->deseja, $this->idCandidato);
            $comando->execute();
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function excluirCandidato() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "DELETE FROM candidato WHERE idCandidato = ".$this->idCandidato;

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

    public function logar(){
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM candidato WHERE email = '".$this->email."' AND senha = '".$this->senha."'";

        try {
            $comando = $conn->query($sql);
            while ($dado = $comando->fetch_assoc()) {
                $resultado[] = $dado;
            }
            return $resultado;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function alterarSenha() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        try {
            $comando = $conn->query("UPDATE candidato SET senha = '".$this->senha."' 
            WHERE idCandidato = ".$this->idCandidato);
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro;
            return false;
        } finally {
            $conn->close();
        }
    }

    public function adicionarCurriculo() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        try {
            $comando = $conn->query("UPDATE candidato SET curriculo = '".$this->curriculo."' 
            WHERE idCandidato = ".$this->idCandidato);
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro;
            return false;
        } finally {
            $conn->close();
        }
    }

    public function verificarCurriculo() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        try {
            $comando = $conn->query("SELECT curriculo FROM candidato WHERE idCandidato = ".$this->idCandidato);
            $resultado = $comando->fetch_assoc();
            return $resultado;
        } catch (Exception $erro) {
            $this->erro = $erro;
            return false;
        } finally {
            $conn->close();
        }
    }

    public function listarVagasCandidatas() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        //Seleciona todas as vagas que ele se candidatou
        $sql = "SELECT idVaga FROM candidatar WHERE idCandidato = ".$this->idCandidato;
        
        try {
            $comando = $conn->query($sql);
            while ($dado = $comando->fetch_assoc()) {
                $vagas[] = $dado;
            }
    
            if (!isset($vagas)) {
                unset($vagas);
                return false;
            } else {
                //Seleciona o id e o titulo das vagas que ele se candidatou
                for ($i = 0; $i < count($vagas); $i++) {
    
                    $sql = "SELECT idVaga, titulo FROM vaga WHERE idVaga = ".$vagas[$i]['idVaga'];
                    $comando = $conn->query($sql);
                    $resultado[] = $comando->fetch_assoc();
                }
                return $resultado;
            }
        } catch (Exception $erro) {
            $this->erro = $erro;
            return false;
        } finally {
            $conn->close();
        }
    }

    public function esqueciSenha() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM candidato WHERE email = '".$this->email."'";
        $comando = $conn->query($sql);
        $linha = $comando->fetch_assoc();

        if ($linha == 0){
            $this->erro = 'E-mail não encontrado.';
            return false;
            $conn->close();
        } else {
            $novaSenha = substr(md5(time()),0 ,10);
            $this->senha = $novaSenha;

            $sql = "UPDATE candidato SET senha = '".md5($novaSenha)."' WHERE email = '".$this->email."'";
    
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
}