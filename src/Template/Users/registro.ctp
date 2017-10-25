<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($user, ['url' => ['action' => 'registro']]); ?>
<fieldset>
    <legend><?= __('Registro de Usuario') ?></legend>
    <?php
    echo $this->Form->control('username', 
        ['label' => 'Nombre de Usuario']);
    echo $this->Form->control('password',
['label' => 'Contraseña']);
    echo $this->Form->control('nombre');
    ?>
</fieldset>
<?= $this->Form->button(__('Aceptar')); ?>
<?= $this->Form->end() ?>