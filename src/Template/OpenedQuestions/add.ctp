<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Opened Questions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Expected Answers'), ['controller' => 'ExpectedAnswers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Expected Answer'), ['controller' => 'ExpectedAnswers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="openedQuestions form large-9 medium-8 columns content">
    <?= $this->Form->create($openedQuestion) ?>
    <fieldset>
        <legend><?= __('Add Opened Question') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('notes');
            echo $this->Form->control('expected_answer_id', ['options' => $expectedAnswers]);
            echo $this->Form->control('steps._ids', ['options' => $steps]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
