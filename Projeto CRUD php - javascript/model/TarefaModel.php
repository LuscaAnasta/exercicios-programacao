<?php
class TarefaModel {
    public $db = null; //conexao com banco
    public $id_tarefa = 0;
    public $tacao = null;
    public $desc = null;
    public $datain = null;
    public $datate = null;
    public $nuem = null;

    public function __construct($conexaoBanco) {
        $this->db = $conexaoBanco;
    }


    public function cadastrar() {
        $retorno = ['status' => 0, 'dados' => null];
        try {
            $stmt = $this->db->prepare("
                INSERT INTO tb_tarefas
                (titulo, descricao, dt_inicio, dt_termino, id_usuario)
                VALUES
                (:titulo,:descricao, :dataInicio, :dataTermino, :usuario)
            ");
            $stmt->bindValue(':titulo', $this->tacao);
            $stmt->bindValue(':descricao', $this->desc);
            $stmt->bindValue(':dataInicio', $this->datain);
            $stmt->bindValue(':dataTermino', $this->datate);
            $stmt->bindValue(':usuario', $this->nuem);
            $stmt->execute();
            $retorno['status'] = 1;
        }
        catch(PDOException $e) {
            echo 'Erro ao cadastrar usuario: '.$e->getMessage();
        }
        return $retorno;
    }
    public function lerTodas(){
		$retorno=['status' => 0, 'dados' => null];
			try{
				$query=$this->db->query('SELECT * FROM tb_tarefas');
				$dados=$query->fetchAll();
				$retorno['status']=1;
				$retorno['dados']=$dados;
			}
			catch (PDOException $e){
				echo 'Erro ao listar dados'.$e->getMessage();
			}
		return $retorno;
	}
	public function carregarEditarID() {
        $retorno = ['status' => 0, 'dados' => null];
        try {
            $stmt = $this->db->prepare('SELECT * FROM tb_tarefas WHERE id_tarefa = :id');
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            $dados = $stmt->fetchAll();
            $retorno['status'] = 1;
            $retorno['dados'] = $dados;
        }
        catch(PDOException $e) {
            echo 'Erro ao listar tarefa pelo ID: '.$e->getMessage();
        }
        return $retorno;
    }
	public function atualizar(){
        $retorno = ['status' => 0, 'dados' => null];
        try{
            $stmt = $this->db->prepare('UPDATE tb_tarefas set titulo = :tarefa, descricao = :desc, dt_inicio = :datain, dt_termino = :datate, id_usuario = :usuario WHERE id_tarefa = :id');
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':tarefa', $this->tarefa);
            $stmt->bindValue(':usuario', $this->usuario);
            $stmt->bindValue(':desc', $this->desc);
            $stmt->bindValue(':datain', $this->datain);
            $stmt->bindValue(':datate', $this->datate);
            $stmt->execute();
            $retorno['status'] = 1;
        }
        catch(PDOException $e) {
            echo 'Erro ao atualizar tarefa: '.$e->getMessage();
        }
        return $retorno;
    }
	public function deletar() {
        $retorno = ['status' => 0, 'dados' => null];
        try {
            $stmt = $this->db->prepare("DELETE FROM tb_tarefas WHERE id_tarefa = :id");
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            $retorno['status'] = 1;
        }
        catch(PDOException $e) {
            echo 'Erro ao deletar usuario: '.$e->getMessage();
        }
        return $retorno;
    }
}
