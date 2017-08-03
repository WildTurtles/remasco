<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\ExpectedAnswer $expectedAnswer
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Expected Answer'), ['action' => 'edit', $expectedAnswer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Expected Answer'), ['action' => 'delete', $expectedAnswer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $expectedAnswer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Expected Answers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Expected Answer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Opened Questions'), ['controller' => 'OpenedQuestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Opened Question'), ['controller' => 'OpenedQuestions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="expectedAnswers view large-9 medium-8 columns content">
    <h3><?= h($expectedAnswer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($expectedAnswer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($expectedAnswer->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($expectedAnswer->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($expectedAnswer->name)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Opened Questions') ?></h4>
        <?php if (!empty($expectedAnswer->opened_questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Expected Answer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($expectedAnswer->opened_questions as $openedQuestions): ?>
            <tr>
                <td><?= h($openedQuestions->id) ?></td>
                <td><?= h($openedQuestions->name) ?></td>
                <td><?= h($openedQuestions->notes) ?></td>
                <td><?= h($openedQuestions->created) ?></td>
                <td><?= h($openedQuestions->updated) ?></td>
                <td><?= h($openedQuestions->expected_answer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OpenedQuestions', 'action' => 'view', $openedQuestions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OpenedQuestions', 'action' => 'edit', $openedQuestions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OpenedQuestions', 'action' => 'delete', $openedQuestions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openedQuestions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
