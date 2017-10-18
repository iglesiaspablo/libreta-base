<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Libreta'), ['action' => 'edit', $libreta->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Libreta'), ['action' => 'delete', $libreta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libreta->id)]) ?> </li>
<li><?= $this->Html->link(__('List Libretas'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Libreta'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Libreta'), ['action' => 'edit', $libreta->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Libreta'), ['action' => 'delete', $libreta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libreta->id)]) ?> </li>
<li><?= $this->Html->link(__('List Libretas'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Libreta'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($libreta->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($libreta->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Nombre') ?></td>
            <td><?= h($libreta->nombre) ?></td>
        </tr>
        <tr>
            <td><?= __('Carrera Id') ?></td>
            <td><?= h($libreta->carrera_id) ?></td>
        </tr>
        <tr>
            <td><?= __('User Id') ?></td>
            <td><?= h($libreta->user_id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($libreta->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($libreta->modified) ?></td>
        </tr>
    </table>
</div>

