<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Path $path
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Path'), ['action' => 'edit', $path->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Path'), ['action' => 'delete', $path->id], ['confirm' => __('Are you sure you want to delete # {0}?', $path->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Paths'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Path'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chapters'), ['controller' => 'Chapters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chapter'), ['controller' => 'Chapters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tries'), ['controller' => 'Tries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Try'), ['controller' => 'Tries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paths view large-9 medium-8 columns content">
    <h3><?= h($path->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($path->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($path->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($path->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($path->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($path->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($path->steps)): ?>
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
            <?php foreach ($path->steps as $steps): ?>
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
        <h4><?= __('Related Chapters') ?></h4>
        <?php if (!empty($path->chapters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($path->chapters as $chapters): ?>
            <tr>
                <td><?= h($chapters->id) ?></td>
                <td><?= h($chapters->name) ?></td>
                <td><?= h($chapters->created) ?></td>
                <td><?= h($chapters->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Chapters', 'action' => 'view', $chapters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Chapters', 'action' => 'edit', $chapters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Chapters', 'action' => 'delete', $chapters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $chapters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tries') ?></h4>
        <?php if (!empty($path->tries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($path->tries as $tries): ?>
            <tr>
                <td><?= h($tries->id) ?></td>
                <td><?= h($tries->created) ?></td>
                <td><?= h($tries->updated) ?></td>
                <td><?= h($tries->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tries', 'action' => 'view', $tries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tries', 'action' => 'edit', $tries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tries', 'action' => 'delete', $tries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($path->users)): ?>
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
            <?php foreach ($path->users as $users): ?>
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
