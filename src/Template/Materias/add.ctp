<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Materia $materia
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Materias'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Carreras'), ['controller' => 'Carreras', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Carrera'), ['controller' => 'Carreras', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Examens'), ['controller' => 'Examens', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Examen'), ['controller' => 'Examens', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Materias'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Carreras'), ['controller' => 'Carreras', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Carrera'), ['controller' => 'Carreras', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Examens'), ['controller' => 'Examens', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Examen'), ['controller' => 'Examens', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($materia); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Materia']) ?></legend>
    <?php
    echo $this->Form->control('nombre');
    echo $this->Form->control('anio_cursado');
    echo $this->Form->control('carrera_id', ['options' => $carreras]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
