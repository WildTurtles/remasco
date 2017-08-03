<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Appreciation $appreciation
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Appreciation'), ['action' => 'edit', $appreciation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Appreciation'), ['action' => 'delete', $appreciation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appreciation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Appreciations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Appreciation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Opened Answers'), ['controller' => 'OpenedAnswers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Opened Answer'), ['controller' => 'OpenedAnswers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="appreciations view large-9 medium-8 columns content">
    <h3><?= h($appreciation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($appreciation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($appreciation->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($appreciation->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($appreciation->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Opened Answers') ?></h4>
        <?php if (!empty($appreciation->opened_answers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Triesid') ?></th>
                <th scope="col"><?= __('Opened Questionsid') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Corrected') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($appreciation->opened_answers as $openedAnswers): ?>
            <tr>
                <td><?= h($openedAnswers->id) ?></td>
                <td><?= h($openedAnswers->created) ?></td>
                <td><?= h($openedAnswers->updated) ?></td>
                <td><?= h($openedAnswers->triesid) ?></td>
                <td><?= h($openedAnswers->opened_questionsid) ?></td>
                <td><?= h($openedAnswers->name) ?></td>
                <td><?= h($openedAnswers->corrected) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OpenedAnswers', 'action' => 'view', $openedAnswers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OpenedAnswers', 'action' => 'edit', $openedAnswers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OpenedAnswers', 'action' => 'delete', $openedAnswers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openedAnswers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
