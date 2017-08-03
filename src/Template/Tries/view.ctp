<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Try $try
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Try'), ['action' => 'edit', $try->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Try'), ['action' => 'delete', $try->id], ['confirm' => __('Are you sure you want to delete # {0}?', $try->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Try'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answers Questions'), ['controller' => 'AnswersQuestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answers Question'), ['controller' => 'AnswersQuestions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Multiple Choice Questions'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Multiple Choice Question'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paths'), ['controller' => 'Paths', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Path'), ['controller' => 'Paths', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tries view large-9 medium-8 columns content">
    <h3><?= h($try->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($try->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $try->has('user') ? $this->Html->link($try->user->name, ['controller' => 'Users', 'action' => 'view', $try->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($try->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($try->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Answers Questions') ?></h4>
        <?php if (!empty($try->answers_questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Answer Id') ?></th>
                <th scope="col"><?= __('Question Id') ?></th>
                <th scope="col"><?= __('Position') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($try->answers_questions as $answersQuestions): ?>
            <tr>
                <td><?= h($answersQuestions->answer_id) ?></td>
                <td><?= h($answersQuestions->question_id) ?></td>
                <td><?= h($answersQuestions->position) ?></td>
                <td><?= h($answersQuestions->created) ?></td>
                <td><?= h($answersQuestions->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AnswersQuestions', 'action' => 'view', $answersQuestions->answer_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AnswersQuestions', 'action' => 'edit', $answersQuestions->answer_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AnswersQuestions', 'action' => 'delete', $answersQuestions->answer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $answersQuestions->answer_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Multiple Choice Questions') ?></h4>
        <?php if (!empty($try->multiple_choice_questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($try->multiple_choice_questions as $multipleChoiceQuestions): ?>
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
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($try->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($try->questions as $questions): ?>
            <tr>
                <td><?= h($questions->id) ?></td>
                <td><?= h($questions->name) ?></td>
                <td><?= h($questions->note) ?></td>
                <td><?= h($questions->created) ?></td>
                <td><?= h($questions->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Paths') ?></h4>
        <?php if (!empty($try->paths)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($try->paths as $paths): ?>
            <tr>
                <td><?= h($paths->id) ?></td>
                <td><?= h($paths->name) ?></td>
                <td><?= h($paths->notes) ?></td>
                <td><?= h($paths->created) ?></td>
                <td><?= h($paths->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Paths', 'action' => 'view', $paths->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Paths', 'action' => 'edit', $paths->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Paths', 'action' => 'delete', $paths->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paths->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
