<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Materia'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Carreras'), ['controller' => 'Carreras', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Carrera'), ['controller' => 'Carreras', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Examens'), ['controller' => 'Examens', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Examen'), ['controller' => 'Examens', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('nombre'); ?></th>
            <th><?= $this->Paginator->sort('anio_cursado'); ?></th>
            <th><?= $this->Paginator->sort('carrera_id'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($materias as $materia): ?>
        <tr>
            <td><?= h($materia->id) ?></td>
            <td><?= h($materia->nombre) ?></td>
            <td><?= h($materia->anio_cursado) ?></td>
            <td>
                <?= $materia->has('carrera') ? $this->Html->link($materia->carrera->id, ['controller' => 'Carreras', 'action' => 'view', $materia->carrera->id]) : '' ?>
            </td>
            <td><?= h($materia->created) ?></td>
            <td><?= h($materia->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $materia->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $materia->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $materia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materia->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
