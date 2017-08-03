<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ExpectedAnswer[]|\Cake\Collection\CollectionInterface $expectedAnswers
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Expected Answer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Opened Questions'), ['controller' => 'OpenedQuestions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Opened Question'), ['controller' => 'OpenedQuestions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="expectedAnswers index large-9 medium-8 columns content">
    <h3><?= __('Expected Answers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($expectedAnswers as $expectedAnswer): ?>
            <tr>
                <td><?= h($expectedAnswer->id) ?></td>
                <td><?= h($expectedAnswer->created) ?></td>
                <td><?= h($expectedAnswer->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $expectedAnswer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $expectedAnswer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $expectedAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expectedAnswer->id)]) ?>
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
