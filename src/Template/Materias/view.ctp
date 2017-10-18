<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Materia'), ['action' => 'edit', $materia->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Materia'), ['action' => 'delete', $materia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materia->id)]) ?> </li>
<li><?= $this->Html->link(__('List Materias'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Materia'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Carreras'), ['controller' => 'Carreras', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Carrera'), ['controller' => 'Carreras', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Examens'), ['controller' => 'Examens', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Examen'), ['controller' => 'Examens', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Materia'), ['action' => 'edit', $materia->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Materia'), ['action' => 'delete', $materia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materia->id)]) ?> </li>
<li><?= $this->Html->link(__('List Materias'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Materia'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Carreras'), ['controller' => 'Carreras', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Carrera'), ['controller' => 'Carreras', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Examens'), ['controller' => 'Examens', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Examen'), ['controller' => 'Examens', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($materia->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($materia->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Nombre') ?></td>
            <td><?= h($materia->nombre) ?></td>
        </tr>
        <tr>
            <td><?= __('Anio Cursado') ?></td>
            <td><?= h($materia->anio_cursado) ?></td>
        </tr>
        <tr>
            <td><?= __('Carrera') ?></td>
            <td><?= $materia->has('carrera') ? $this->Html->link($materia->carrera->id, ['controller' => 'Carreras', 'action' => 'view', $materia->carrera->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($materia->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($materia->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Examens') ?></h3>
    </div>
    <?php if (!empty($materia->examens)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Fecha') ?></th>
                <th><?= __('Calificacion') ?></th>
                <th><?= __('Condicion Anterior') ?></th>
                <th><?= __('Profesor Evaluador') ?></th>
                <th><?= __('Materia Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($materia->examens as $examens): ?>
                <tr>
                    <td><?= h($examens->id) ?></td>
                    <td><?= h($examens->fecha) ?></td>
                    <td><?= h($examens->calificacion) ?></td>
                    <td><?= h($examens->condicion_anterior) ?></td>
                    <td><?= h($examens->profesor_evaluador) ?></td>
                    <td><?= h($examens->materia_id) ?></td>
                    <td><?= h($examens->created) ?></td>
                    <td><?= h($examens->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Examens', 'action' => 'view', $examens->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Examens', 'action' => 'edit', $examens->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Examens', 'action' => 'delete', $examens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examens->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Examens</p>
    <?php endif; ?>
</div>
