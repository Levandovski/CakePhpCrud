<h1>Cadastrar Usuário</h1>

<?php 
//Trabalhando com os Helpers do Cake
//Vamos criar nossos formularios

//O user que esta sendo passado ali no nosso create esta sendo setado no controller add, onde ele retorna os campos do banco de dados por meio da classe model da Entity
echo $this->Form->create($user);//Estamos iniciando nosso formulário e setando nossso variavel para adicionar o valor da controller
echo $this->Form->input('nome');//Estamos setando nossos comapos para colocar no form, os nomes dos campos devem ser igual os campos que estão no banco de dados.
echo $this->Form->input('email');
echo $this->Form->button('Cadastrar');
echo $this->Form->end();//Estamos finalizando nosso formulário

?>