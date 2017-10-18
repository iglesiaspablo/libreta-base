<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carrera $carrera
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Carrera'), ['action' => 'edit', $carrera->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Carrera'), ['action' => 'delete', $carrera->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carrera->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Carreras'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Carrera'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="carreras view large-9 medium-8 columns content">
    <h3><?= h($carrera->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($carrera->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($carrera->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($carrera->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($carrera->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Libretas') ?></h4>
        <?php if (!empty($carrera->libretas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Carrera Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($carrera->libretas as $libretas): ?>
            <tr>
                <td><?= h($libretas->id) ?></td>
                <td><?= h($libretas->nombre) ?></td>
                <td><?= h($libretas->carrera_id) ?></td>
                <td><?= h($libretas->user_id) ?></td>
                <td><?= h($libretas->created) ?></td>
                <td><?= h($libretas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Libretas', 'action' => 'view', $libretas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Libretas', 'action' => 'edit', $libretas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Libretas', 'action' => 'delete', $libretas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $libretas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
