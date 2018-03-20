<h3>Lista de usuários</h3>
<!--Instalar o packge Emmet no netbenas-->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          foreach($usuarios as $usuario):  //Temos que deixar usuario no singular pq ele herda os dados de varios usuarios 
        ?>
        <tr>           
            <th><?= $usuario->id;?></th>
            <th><?= $usuario->nome;?></th>
            <th><?= $usuario->email;?></th>
            <th>
                <?= $this->Html->link(('Editar'),['action' => 'edit', $usuario->id]);?><!--Estou passando o meu link para o método edit-->
                <?= $this->Form->postLink(('Apagar'),['action' => 'delete', $usuario->id],['confirm' => __('Deseja realmente apagar o usuário? ' .  $usuario->nome)]);?><!--Estou passando meu id pelo método post-->
               
            </th>
            <?php endforeach; ?>
           <!--Fim do meu foreach-->
        </tr>
    </tbody>
</table>
<?php
echo $this->Html->link(__('cadastrar'),['action' => 'add']);//Estamos criando um link e informando o nosso action para o add
//var_dump($usuarios);
