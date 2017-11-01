<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="users form">
<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-success']); ?>
    <?= $this->Html->link(
    	__('Registrarse'), 
    	['controller' => 'Users', 'action' => 'registro'], 
    	['class' => 'btn btn-default']
    	) ?>
    <?= $this->Form->end() ?>
</div>
