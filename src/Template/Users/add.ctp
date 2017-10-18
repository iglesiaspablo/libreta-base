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
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('Add {0}', ['User']) ?></legend>
    <?php
    echo $this->Form->control('username');
    echo $this->Form->control('password');
    if (isset($userRole) && $userRole === "admin")
        echo $this->Form->control('role');
    echo $this->Form->control('nombre');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
