<?php 
include_once(dirname(__FILE__).'/../../conexao/conectar.php');

class Vaga {
    private $idVaga = null;
    private $titulo = null;
    private $descricao = null;
    private $preRequisitos = null;
    private $tipoContrato = null;
    private $jornada = null;
    private $ativo = null;
    private $idEmpresa = null;
    private $erro = null;

    public function __get($var) {
        return $this->$var;
    }
    public function __set($var, $value) {
        $this->$var = $value;
    }

    public function vagaDados() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();
    
        $sql = "SELECT * FROM vaga WHERE idVaga = ".$this->idVaga;
    
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
        } $conn->close();
    }

    public function mostrarVagas() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();
    
        $sql = "SELECT * FROM vaga WHERE ativo = 's'";
    
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
        } $conn->close();
    }

    public function adicionarVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "INSERT INTO vaga (titulo, descricao, preRequisitos, tipoContrato, jornada, ativo, idEmpresa) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $sql2 = "UPDATE empresa SET vagasAnunciadas = vagasAnunciadas + 1, vagasAberto = vagasAberto + 1 WHERE idEmpresa = ".$this->idEmpresa;
        $sql3 = "SELECT empresaParceira, vagasAnunciadas FROM empresa WHERE idEmpresa = ".$this->idEmpresa;
        $sql4 = "UPDATE empresa SET empresaParceira = 's' WHERE idEmpresa = ".$this->idEmpresa;
        
        try {
            $comando = $conn->prepare($sql);
            $comando->bind_param('sssssss', $this->titulo, $this->descricao, $this->preRequisitos, 
            $this->tipoContrato, $this->jornada, $this->ativo, $this->idEmpresa);
            $comando->execute();
            $comando = $conn->query($sql2);
            $comando = $conn->query($sql3);
            $dados = $comando->fetch_assoc();
            if ($dados['empresaParceira'] == 'n' && $dados['vagasAnunciadas'] == '3') {
                $comando = $conn->query($sql4);
            }
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function empresaVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM vaga WHERE idEmpresa = ".$this->idEmpresa;

        try {
            $comando = $conn->query($sql);
            while ($dado = $comando->fetch_assoc()) {
                $resultado[] = $dado;
            }
            if (!isset($resultado)) {
                unset($resultado);
                return null;
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

    public function listarVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM vaga";

        try {
            $comando = $conn->query($sql);
            while ($dado = $comando->fetch_assoc()) {
                $resultado[] = $dado;
            }
            if (!isset($resultado)) {
                unset($resultado);
                return null;
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

    public function verVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT * FROM vaga WHERE idVaga = ".$this->idVaga." and idEmpresa = ".$this->idEmpresa;

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
        } $conn->close();
    }

    public function editarVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "UPDATE vaga SET titulo = ?, descricao = ?, preRequisitos = ?, tipoContrato = ?, 
        jornada = ? WHERE idVaga = ?";

        try {
            $comando = $conn->prepare($sql);
            $comando->bind_param('ssssss', $this->titulo, $this->descricao, $this->preRequisitos, 
            $this->tipoContrato, $this->jornada, $this->idVaga);
            $comando->execute();
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function excluirVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "DELETE FROM candidatar WHERE idVaga = ".$this->idVaga;
        $sql2 = "DELETE FROM vaga WHERE idVaga = ".$this->idVaga." AND idEmpresa = ".$this->idEmpresa;

        try {
            $comando = $conn->query($sql);
            $comando = $conn->query($sql2);
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function ativarVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "UPDATE vaga SET ativo = 's' WHERE idVaga = ".$this->idVaga." AND idEmpresa = ".$this->idEmpresa;
        $sql2 = "UPDATE empresa SET vagasAberto = vagasAberto + 1 WHERE idEmpresa = ".$this->idEmpresa;

        try {
            $comando = $conn->query($sql);
            $comando2 = $conn->query($sql2);
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function desativarVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "UPDATE vaga SET ativo = 'n' WHERE idVaga = ".$this->idVaga." AND idEmpresa = ".$this->idEmpresa;
        $sql2 = "UPDATE empresa SET vagasAberto = vagasAberto - 1 WHERE idEmpresa = ".$this->idEmpresa;

        try {
            $comando = $conn->query($sql);
            $comando2 = $conn->query($sql2);
            return true;
        } catch (Exception $erro) {
            $this->erro = $erro->getMessage();
            return false;
        } finally {
            $conn->close();
        }
    }

    public function receberVaga() {
        $conexao = new Conexao();
        $conn = $conexao->pegarConexao();

        $sql = "SELECT nome, sobrenome, email FROM candidato WHERE deseja = 's'";

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
}