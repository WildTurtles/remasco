<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\OpenedQuestion[]|\Cake\Collection\CollectionInterface $openedQuestions
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Opened Question'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Expected Answers'), ['controller' => 'ExpectedAnswers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expected Answer'), ['controller' => 'ExpectedAnswers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="openedQuestions index large-9 medium-8 columns content">
    <h3><?= __('Opened Questions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expected_answer_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($openedQuestions as $openedQuestion): ?>
            <tr>
                <td><?= h($openedQuestion->id) ?></td>
                <td><?= h($openedQuestion->created) ?></td>
                <td><?= h($openedQuestion->updated) ?></td>
                <td><?= $openedQuestion->has('expected_answer') ? $this->Html->link($openedQuestion->expected_answer->name, ['controller' => 'ExpectedAnswers', 'action' => 'view', $openedQuestion->expected_answer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $openedQuestion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $openedQuestion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $openedQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openedQuestion->id)]) ?>
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
