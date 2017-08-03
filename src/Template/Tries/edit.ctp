<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $try->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $try->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Answers Questions'), ['controller' => 'AnswersQuestions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Answers Question'), ['controller' => 'AnswersQuestions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Multiple Choice Questions'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Multiple Choice Question'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Paths'), ['controller' => 'Paths', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Path'), ['controller' => 'Paths', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tries form large-9 medium-8 columns content">
    <?= $this->Form->create($try) ?>
    <fieldset>
        <legend><?= __('Edit Try') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('answers_questions._ids', ['options' => $answersQuestions]);
            echo $this->Form->control('multiple_choice_questions._ids', ['options' => $multipleChoiceQuestions]);
            echo $this->Form->control('questions._ids', ['options' => $questions]);
            echo $this->Form->control('paths._ids', ['options' => $paths]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
