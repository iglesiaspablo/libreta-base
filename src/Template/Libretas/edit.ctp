<?php
/**
 * @var \App\View\AppView $this
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $libreta->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $libreta->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Libretas'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $libreta->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $libreta->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Libretas'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($libreta); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Libreta']) ?></legend>
    <?php
    echo $this->Form->control('nombre');
    echo $this->Form->control('carrera_id');
    echo $this->Form->control('user_id');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
