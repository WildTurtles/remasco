<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Topic $topic
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Topic'), ['action' => 'edit', $topic->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Topic'), ['action' => 'delete', $topic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $topic->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Topics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Topic'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Chapters'), ['controller' => 'Chapters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Chapter'), ['controller' => 'Chapters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="topics view large-9 medium-8 columns content">
    <h3><?= h($topic->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($topic->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usersid') ?></th>
            <td><?= h($topic->usersid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= $this->Number->format($topic->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($topic->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($topic->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Groups') ?></h4>
        <?php if (!empty($topic->groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Is Deletable') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($topic->groups as $groups): ?>
            <tr>
                <td><?= h($groups->id) ?></td>
                <td><?= h($groups->name) ?></td>
                <td><?= h($groups->is_deletable) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $groups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $groups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $groups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Chapters') ?></h4>
        <?php if (!empty($topic->chapters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($topic->chapters as $chapters): ?>
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
</div>
