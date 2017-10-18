<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Carrera'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Materias'), ['controller' => 'Materias', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Materia'), ['controller' => 'Materias', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('nombre'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($carreras as $carrera): ?>
        <tr>
            <td><?= h($carrera->id) ?></td>
            <td><?= h($carrera->nombre) ?></td>
            <td><?= h($carrera->created) ?></td>
            <td><?= h($carrera->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $carrera->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $carrera->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $carrera->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carrera->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
