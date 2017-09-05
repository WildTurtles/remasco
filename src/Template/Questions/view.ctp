<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Question $question
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tries'), ['controller' => 'Tries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Try'), ['controller' => 'Tries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Multiple Choice Questions'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Multiple Choice Question'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questions view large-9 medium-8 columns content">
    <h3><?= h($question->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($question->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($question->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($question->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Name') ?></h4>
        <?= $this->Text->autoParagraph(h($question->name)); ?>
    </div>
    <div class="row">
        <h4><?= __('Note') ?></h4>
        <?= $this->Text->autoParagraph(h($question->note)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Answers') ?></h4>
        <?php if (!empty($question->answers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Is Right') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->answers as $answers): ?>
            <tr>
                <td><?= h($answers->id) ?></td>
                <td><?= h($answers->name) ?></td>
                <td><?= h($answers->is_right) ?></td>
                <td><?= h($answers->created) ?></td>
                <td><?= h($answers->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Answers', 'action' => 'view', $answers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Answers', 'action' => 'edit', $answers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Answers', 'action' => 'delete', $answers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $answers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tries') ?></h4>
        <?php if (!empty($question->tries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->tries as $tries): ?>
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
        <h4><?= __('Related Multiple Choice Questions') ?></h4>
        <?php if (!empty($question->multiple_choice_questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->multiple_choice_questions as $multipleChoiceQuestions): ?>
            <tr>
                <td><?= h($multipleChoiceQuestions->id) ?></td>
                <td><?= h($multipleChoiceQuestions->name) ?></td>
                <td><?= h($multipleChoiceQuestions->created) ?></td>
                <td><?= h($multipleChoiceQuestions->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'view', $multipleChoiceQuestions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'edit', $multipleChoiceQuestions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'delete', $multipleChoiceQuestions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleChoiceQuestions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
