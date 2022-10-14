<?php
include_once(dirname(__FILE__).'/../../conexao/conectar.php');

class Empresa {
    private $nome = null;
    private $email = null;
    private $senha = null;
    private $cnpj = null;
    private $telefone = null;
    private $cidade = null;
    private $localizacao = null;
    private $ramo = null;
    private $cep = null;
    private $descricao = null;
    private $empresaParceira = null;
    private $logo = null;
    private $deseja = null;
    private $erro = null;

    public function __get($var) {
        return $this->$var;
    }
    public function __set($var, $valor) {
        $this->$var = $valor;
    }

    public function adicionarEmpresa() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM empresa WHERE email = '".$this->email."' OR nome = '".$this->nome."'";
        $comando = $conn->query($sql);
        $linha = $comando->fetch_assoc();

        if ($linha > 0){
            $this->erro = 'E-mail ou nome de empresa já cadastrado.';
            return false;
            $conn->close();
            $comando->close();
        } else {

            $sql = "INSERT INTO empresa (nome, email, senha, cnpj, telefone, cidade, localizacao, ramo, cep, descricao, empresaParceira, logo, deseja) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
            try {
                $comando = $conn->prepare($sql);
                $comando->bind_param('sssssssssssss', $this->nome, $this->email, $this->senha, $this->cnpj, $this->telefone, 
                $this->cidade, $this->localizacao, $this->ramo, $this->cep, $this->descricao, $this->empresaParceira, $this->logo, $this->deseja);
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

    public function listarEmpresa() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM empresa";

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

    public function verEmpresa() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM empresa WHERE idEmpresa = ".$this->idEmpresa;

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

    public function editarEmpresa() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "UPDATE empresa SET nome = ?, email = ?, cnpj = ?, telefone = ?, cidade = ?, localizacao = ?, ramo = ?, 
        cep = ?, descricao = ?, logo = ?, deseja = ? WHERE idEmpresa = ?";

        try {
            $comando = $conn->prepare($sql);
            $comando->bind_param('ssssssssssss', $this->nome, $this->email, $this->cnpj, $this->telefone, 
            $this->cidade, $this->localizacao, $this->ramo, $this->cep, $this->descricao, $this->logo, $this->deseja, $this->idEmpresa);
            $comando->execute();
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function excluirEmpresa() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "DELETE FROM empresa WHERE idEmpresa = ".$this->idEmpresa;

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

        $sql = "SELECT * FROM empresa WHERE email = '".$this->email."' AND senha = '".$this->senha."'";

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
            $comando = $conn->query("UPDATE empresa SET senha = '".$this->senha."' 
            WHERE idEmpresa = ".$this->idEmpresa);
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro;
            return false;
        } finally {
            $conn->close();
        }
    }

    public function virarParceira(){
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT empresaParceira FROM empresa WHERE idEmpresa = ".$this->idEmpresa;

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

    public function listarParceiras(){
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT idEmpresa, logo FROM empresa WHERE empresaParceira = 's'";

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

    public function listarCandidatados() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        //Seleciona todas as vagas postadas pela empresa
        $sql = "SELECT idVaga FROM vaga WHERE idEmpresa = ".$this->idEmpresa;

        try {
            $comando = $conn->query($sql);
            while ($dado = $comando->fetch_assoc()) {
                $vagas[] = $dado;
            }
            
            if (!isset($vagas)) {
                unset($vagas);
                return false;
            } else {
                //Seleciona todos os candidatos dessas vagas
                for ($i = 0; $i < count($vagas); $i++) {
        
                    $sql = "SELECT * FROM candidatar WHERE idVaga = ".$vagas[$i]['idVaga'];
                    $comando = $conn->query($sql);
                    $candidatados[] = $comando->fetch_assoc();
                }
                if (!isset($candidatados)) {
                    unset($candidatados);
                    return false;
                } else {
                    //Seleciona o id, nome e sobrenome do candidato e o titulo da vaga que ele se candidatou
                    for ($i = 0; $i < count($candidatados); $i++) {
                        if (isset($candidatados[$i]['idVaga']) && isset($candidatados[$i]['idCandidato'])) {
                            $sql = "SELECT c.idCandidato, c.nome, c.sobrenome, v.titulo FROM candidato c, vaga v WHERE v.idVaga = ".$candidatados[$i]['idVaga']." AND c.idCandidato = ".$candidatados[$i]['idCandidato']."";
                            $comando = $conn->query($sql);
                        }
                        while ($dado = $comando->fetch_assoc()) {
                            $resultado[] = $dado;
                        }
                    }
                    if (!isset($resultado)) {
                        return false;
                    } else {
                        return $resultado;
                    }
                }
            }
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function esqueciSenha() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM empresa WHERE email = '".$this->email."'";
        $comando = $conn->query($sql);
        $linha = $comando->fetch_assoc();

        if ($linha == 0){
            $this->erro = 'E-mail não encontrado.';
            return false;
            $conn->close();
        } else {
            $novaSenha = substr(md5(time()),0 ,10);
            $this->senha = $novaSenha;

            $sql = "UPDATE empresa SET senha = '".md5($novaSenha)."' WHERE email = '".$this->email."'";
    
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