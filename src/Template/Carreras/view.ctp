<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Carrera'), ['action' => 'edit', $carrera->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Carrera'), ['action' => 'delete', $carrera->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carrera->id)]) ?> </li>
<li><?= $this->Html->link(__('List Carreras'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Carrera'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Materias'), ['controller' => 'Materias', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Materia'), ['controller' => 'Materias', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Carrera'), ['action' => 'edit', $carrera->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Carrera'), ['action' => 'delete', $carrera->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carrera->id)]) ?> </li>
<li><?= $this->Html->link(__('List Carreras'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Carrera'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Materias'), ['controller' => 'Materias', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Materia'), ['controller' => 'Materias', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($carrera->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($carrera->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Nombre') ?></td>
            <td><?= h($carrera->nombre) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($carrera->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($carrera->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Libretas') ?></h3>
    </div>
    <?php if (!empty($carrera->libretas)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Carrera Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($carrera->libretas as $libretas): ?>
                <tr>
                    <td><?= h($libretas->id) ?></td>
                    <td><?= h($libretas->nombre) ?></td>
                    <td><?= h($libretas->carrera_id) ?></td>
                    <td><?= h($libretas->user_id) ?></td>
                    <td><?= h($libretas->created) ?></td>
                    <td><?= h($libretas->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Libretas', 'action' => 'view', $libretas->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Libretas', 'action' => 'edit', $libretas->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Libretas', 'action' => 'delete', $libretas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libretas->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Libretas</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Materias') ?></h3>
    </div>
    <?php if (!empty($carrera->materias)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Anio Cursado') ?></th>
                <th><?= __('Carrera Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($carrera->materias as $materias): ?>
                <tr>
                    <td><?= h($materias->id) ?></td>
                    <td><?= h($materias->nombre) ?></td>
                    <td><?= h($materias->anio_cursado) ?></td>
                    <td><?= h($materias->carrera_id) ?></td>
                    <td><?= h($materias->created) ?></td>
                    <td><?= h($materias->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Materias', 'action' => 'view', $materias->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Materias', 'action' => 'edit', $materias->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Materias', 'action' => 'delete', $materias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materias->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Materias</p>
    <?php endif; ?>
</div>
