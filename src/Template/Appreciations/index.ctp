<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Appreciation[]|\Cake\Collection\CollectionInterface $appreciations
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Appreciation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Opened Answers'), ['controller' => 'OpenedAnswers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Opened Answer'), ['controller' => 'OpenedAnswers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appreciations index large-9 medium-8 columns content">
    <h3><?= __('Appreciations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appreciations as $appreciation): ?>
            <tr>
                <td><?= h($appreciation->id) ?></td>
                <td><?= h($appreciation->created) ?></td>
                <td><?= h($appreciation->updated) ?></td>
                <td><?= h($appreciation->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $appreciation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appreciation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appreciation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appreciation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
