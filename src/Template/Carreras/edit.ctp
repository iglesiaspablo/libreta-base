<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carrera $carrera
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $carrera->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $carrera->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Carreras'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="carreras form large-9 medium-8 columns content">
    <?= $this->Form->create($carrera) ?>
    <fieldset>
        <legend><?= __('Edit Carrera') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
