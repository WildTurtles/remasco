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
                ['action' => 'delete', $question->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tries'), ['controller' => 'Tries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Try'), ['controller' => 'Tries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Multiple Choice Questions'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Multiple Choice Question'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('note');
            echo $this->Form->control('answers._ids', ['options' => $answers]);
            echo $this->Form->control('tries._ids', ['options' => $tries]);
            echo $this->Form->control('multiple_choice_questions._ids', ['options' => $multipleChoiceQuestions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
