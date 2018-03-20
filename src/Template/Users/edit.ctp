<h1>Editar Usuário</h1>

<?php

echo $this->Form->create($user);
echo $this->Form->input('id');
echo $this->Form->input('nome');
echo $this->Form->input('email');
echo $this->Form->button('Editar');
echo $this->Form->end();
?>