<?php

class AlunoDAO { //"DAO" significa Data Access Object (Objeto de Acesso a Dados)
    private $alunos = []; //ARRAY para armazenamento temporário dos objetos e seus atributos, antes de usar um banco de dados.Foi criado iniciamente vazio[].

    private $arquivo = "alunos.json"; //cria o arquivo de json para que os dados possam ser armazenados

//Construtor AlunoDAO --> carregas os dados do arquivo ao iniciar a aplicação

public function __construct(){
    if (file_exists($this->arquivo)) {
        //lê o conteudo do arquivo caso ele já exista
        $conteudo = file_get_contents($this->arquivo); //atribui as informações do arquivo existente à variável $conteudo
        $dados = json_decode($conteudo, true); //decodifica o conteúdo JSON para um array associativo


        if ($dados){
            foreach ($dados as $id => $info){
                $this->alunos[$id] = new Aluno (
                    $info['id'],
                    $info['nome'],
                    $info['curso']
                );
            }
        }
    }
}

//método auxiliar -> salva o array de alunos no arquivo

private function salvarEmArquivo(){
    $dados = [];

    //transforma os objetos em array convencionais 
    foreach ($this->alunos as $id => $aluno){
        $dados[$id]=[
            'id' => $aluno->getId(),
            'nome' => $aluno->getNome(),
            'curso' => $aluno->getCurso()
        ];
    }

    //Converte para JSON formado e grava o arquivo
    file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));

}

//create
    public function criarAluno(Aluno $aluno) //método create --> para criar novo objeto
    {
        $this->alunos[$aluno->getId()] = $aluno;
        $this->salvarEmArquivo(); //chama o método auxiliar para salvar os dados no arquivo
    }


    //read
    public function lerAluno() //método read --> para ler os objetos criados
    {
        return $this->alunos;
    }




    //update
    public function atualizarAluno($id,$novoNome,$novoCurso) //método update --> para atualizar os objetos criados
    {
        if (isset($this->alunos[$id])){
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);

        }
        $this->salvarEmArquivo(); //chama o método auxiliar para salvar os dados no arquivo
    }

    //delete
    public function excluirAluno() //método delete --> para deletar os objetos criados
    {
        unset($this->alunos[$id]);
        $this->salvarEmArquivo(); //chama o método auxiliar para salvar os dados no arquivo
    }

}