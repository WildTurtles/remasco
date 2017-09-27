<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Link $link
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Link'), ['action' => 'edit', $link->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Link'), ['action' => 'delete', $link->id], ['confirm' => __('Are you sure you want to delete # {0}?', $link->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Links'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Link'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="links view large-9 medium-8 columns content">
    <h3><?= h($link->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($link->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($link->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($link->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($link->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($link->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($link->steps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Path Id') ?></th>
                <th scope="col"><?= __('Lock') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($link->steps as $steps): ?>
            <tr>
                <td><?= h($steps->id) ?></td>
                <td><?= h($steps->path_id) ?></td>
                <td><?= h($steps->lock) ?></td>
                <td><?= h($steps->created) ?></td>
                <td><?= h($steps->updated) ?></td>
                <td><?= h($steps->number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Steps', 'action' => 'view', $steps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Steps', 'action' => 'edit', $steps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Steps', 'action' => 'delete', $steps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $steps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($link->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Lastname') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Avatar') ?></th>
                <th scope="col"><?= __('Display Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($link->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->lastname) ?></td>
                <td><?= h($users->firstname) ?></td>
                <td><?= h($users->avatar) ?></td>
                <td><?= h($users->display_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
