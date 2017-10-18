<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materia $materia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Materia'), ['action' => 'edit', $materia->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Materia'), ['action' => 'delete', $materia->id], ['confirm' => __('Are you sure you want to delete # {0}?', $materia->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Materia'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Examens'), ['controller' => 'Examens', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Examen'), ['controller' => 'Examens', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materias view large-9 medium-8 columns content">
    <h3><?= h($materia->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($materia->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($materia->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Anio Cursado') ?></th>
            <td><?= h($materia->anio_cursado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($materia->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($materia->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Examens') ?></h4>
        <?php if (!empty($materia->examens)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Calificacion') ?></th>
                <th scope="col"><?= __('Condicion Anterior') ?></th>
                <th scope="col"><?= __('Profesor Evaluador') ?></th>
                <th scope="col"><?= __('Materia Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'Examens', 'action' => 'view', $examens->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Examens', 'action' => 'edit', $examens->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Examens', 'action' => 'delete', $examens->id], ['confirm' => __('Are you sure you want to delete # {0}?', $examens->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
