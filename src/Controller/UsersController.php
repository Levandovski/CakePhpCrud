<?php

namespace App\Controller; //Aqui fica o caminho do meu arquivo

use App\Controller\AppController; //Estamos carregando nosso arquivo AppControler

class UsersController extends AppController {//estamos estendendo nossa Classe controller para a classe principal AppController

    public function index() {//Criando uma função para página index
        //Para configurar meu banco de dados devo entrar na pasta config e no arquivo app.
        //$usuarios="Jesse";
        //Estamos passando os dados da variavel usuarios para usuario dentro do vetor.
        //$this->set(['usuario' => $usuarios]);//Passando dados para viu, estou setando esses dados para view
        //Agora vamos buscar as informações no banco de dados.
        //Na model nossa Entity é responsavel por buscar as informações no banco
        //Na model a nossa Table é responsavel por fazer a validação
        //Vamos criar um arquivo dentro do Entity chamado User.php no singular
        //Vamos agora configurar o controller que é responsavel por trazer as informações para os usuarios
        //Após desenvolvermos as mensagens flash e a tela de add, para corrigirmos o erro de o usuário inserir dados vazios na hora do cadastro, vamos criar dentro da model na table um novo arquivo php com o nome de users para poder fazer validações
        $usuarios = $this->Users->find()->all(); //estou acessando meu model  e estou acessando meu método para buscar os dadso, e o all trz todos os dados.
        //$this->set(['usuarios' => $usuarios]); //estou setando os dados da minha variavel usuariso que esta com os dados da minha busca e estou passando ela para minha view
        $this->set(compact('usuarios')); //Estamos compactando nossos dados e pegando o mesmo nome da variavei usuarios para usar dentro compact
        //O comando acima é o recomendavel
    }

    public function add() {
        $user = $this->Users->newEntity(); //Estamos instanciando nossa entity para poder utiliza=la
        if ($this->request->is('post')) {//Estamos recuperando os dados da nossa tela de add, através od método post
            //debug($this->request->data);//Para recuperar os dados da tela vindo do post eu tenho que utilizar os método data
            //Acima estamos fazendo um pequeno teste com o debug para testar a função
            //exit;//Exit finaliza o debug
            $user = $this->Users->patchEntity($user, $this->request->data); //Estou mandando os meus dados para o patchEntity, ou seja estou passando meus dados apra entidade user, passando meus dados que foram pegados no post, por meio do request
            if ($this->Users->save($user)) { //Estou passando meus dados para serem salvaos na tabela user
                $this->Flash->success('Usuário cadastrado com sucesso'); //O flash é utilizado para enviarmos uma mensagem de sucesso para o usuário, quando o cadastro for realizado com sucesso
                return $this->redirect(['action' => 'index']); //Estou redirecionando o meu link para a tela index quando o cadastro for realizado com sucesso
            } else {
                return $this->Flash->error('Erro ao cadastrar usuário');
            }
        }
        $this->set(compact('user')); //Estamos compactando nossa setagem para a view add, para poder enviar mais de um valor
        //No comando acima estamos sentando nosso dados e informando os campos que serão salvos no banco de dados
    }

    public function edit($id = null) {//Estou criando meu método editar pegando o id do usuario para poder fazer a alteração, caso ele não passe o id eu atribuo null.
        $user = $this->Users->get($id); //Vamos pegar o id do usuário
        if ($this->request->is(['post', 'put'])) {//estamos verificando se os nossos dados foram passados como post e utilizamos o put do php para poder estar editando
            $user = $this->Users->patchEntity($user, $this->request->data); //Estamos injetando na nossa entidade user os nossos dados 
            if ($this->Users->save($user)) {//Estou passando os meus dados do formulário para serem salvos no banco com a atualização.
                $this->Flash->success('Dados editados com sucesso');
                return $this->redirect(['action' => 'index']); //Estamos retornando para o inicio
            } else {
                $this->Flash->error('Usuario não foi atualizado com sucesso!!!');
            }
        }
        $this->set(compact('user')); //Estamos setando o id para o nosso formulario
    }
    
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);//Obrigo ele aceitar somente os métodos que estsão dentro do meu array
        $user=$this->Users->get($id);
            
        if($this->Users->delete($user)){
            $this->Flash->success('Usuário excluido com sucesso!');
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error('Erro ao excluir usuário');
        }
        
    }    

}
