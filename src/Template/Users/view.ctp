<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Libretas'), ['controller' => 'Libretas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Libreta'), ['controller' => 'Libretas', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($user->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($user->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Username') ?></td>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <td><?= __('Password') ?></td>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <td><?= __('Role') ?></td>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Libretas') ?></h3>
    </div>
    <?php if (!empty($user->libretas)): ?>
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
            <?php foreach ($user->libretas as $libretas): ?>
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
