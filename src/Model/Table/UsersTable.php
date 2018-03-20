<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {//Estamos extendendo nossa classe para Table

    public function initialize(array $config) {//Estamos criando um método de configurações, passando um array config
        parent::initialize($config);
        $this->table('users'); //Estamos setando nossa tabela users
        $this->displayField('nome'); //Este comando define qual coluna que eu quero q de um display, por exemplo se eu tenho uma coluna de outra tabela e quero que ela apareça no meu combobox
        $this->addBehavior('Timestamp'); //Esta função do cake faz o cake pegar a hora automatica do sistema
    }

    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create'); //Estamos dizendo que o id pode ser vazio pq ele é cadastrado automaticante

        $validator
                ->requirePresence('nome', 'create')//Estou dizendo que este campo deve ser obrigatório
                ->notEmpty('nome'); //Estou dizendo que o nome deve ser não vazio
    
        $validator
                ->requirePresence('email', 'create')//Estou dizendo que este campo deve ser obrigatório
                ->notEmpty('email'); //Estou dizendo que o nome deve ser não vazio
        
        return $validator;//estamos retornando o nosso validator para poder validar nossos formulários
    }

}
