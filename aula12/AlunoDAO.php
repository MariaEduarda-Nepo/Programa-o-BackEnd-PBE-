<?php

class AlunoDAO { //"DAO" significa Data Access Object (Objeto de Acesso a Dados)
    private $alunos = []; //ARRAY para armazenamento temporário dos objetos e seus atributos, antes de usar um banco de dados.Foi criado iniciamente vazio[].

    public function criarAluno(Aluno $aluno) //método create --> para criar novo objeto
    {
        $this->alunos[$aluno->getId()] = $aluno;
    }

    public function lerAluno() //método read --> para ler os objetos criados
    {
        return $this->alunos;
    }

    public function atualizarAluno($id,$novoNome,$novoCurso) //método update --> para atualizar os objetos criados
    {
        if (isset($this->alunos[$id])){
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);

        }
    }
    public function excluirAluno() //método delete --> para deletar os objetos criados
    {
        unset($this->alunos[$id]);
    }

}