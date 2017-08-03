<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\OpenedQuestion $openedQuestion
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Opened Question'), ['action' => 'edit', $openedQuestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Opened Question'), ['action' => 'delete', $openedQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openedQuestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Opened Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Opened Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Expected Answers'), ['controller' => 'ExpectedAnswers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expected Answer'), ['controller' => 'ExpectedAnswers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="openedQuestions view large-9 medium-8 columns content">
    <h3><?= h($openedQuestion->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($openedQuestion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expected Answer') ?></th>
            <td><?= $openedQuestion->has('expected_answer') ? $this->Html->link($openedQuestion->expected_answer->name, ['controller' => 'ExpectedAnswers', 'action' => 'view', $openedQuestion->expected_answer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($openedQuestion->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($openedQuestion->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($openedQuestion->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($openedQuestion->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($openedQuestion->steps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Number') ?></th>
                <th scope="col"><?= __('Path Id') ?></th>
                <th scope="col"><?= __('Lock') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($openedQuestion->steps as $steps): ?>
            <tr>
                <td><?= h($steps->id) ?></td>
                <td><?= h($steps->number) ?></td>
                <td><?= h($steps->path_id) ?></td>
                <td><?= h($steps->lock) ?></td>
                <td><?= h($steps->created) ?></td>
                <td><?= h($steps->updated) ?></td>
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
</div>
