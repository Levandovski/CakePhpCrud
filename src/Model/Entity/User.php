<?php

namespace App\Model\Entity; //Estamos escrendo o nosso caminho do nosso arquivo

use Cake\ORM\Entity; //O ORM é o autoload

class User extends Entity {//Extendemos nossa classe Entity porque já incluimos o nosso autolad ali em cima no use.
   //Montamos nossa model Entity responsavel por trazer os dados do banco de dados
    public $_accessible = [//Estou definindo quais colunas eu vou trazer
        'id' => true,
        'nome' => true,
        'email' => true,
        'created' => true,
        'modified' => true
    ];

}
