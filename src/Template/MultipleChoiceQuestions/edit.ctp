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
                ['action' => 'delete', $multipleChoiceQuestion->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $multipleChoiceQuestion->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Multiple Choice Questions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tries'), ['controller' => 'Tries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Try'), ['controller' => 'Tries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="multipleChoiceQuestions form large-9 medium-8 columns content">
    <?= $this->Form->create($multipleChoiceQuestion) ?>
    <fieldset>
        <legend><?= __('Edit Multiple Choice Question') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('questions._ids', ['options' => $questions]);
            echo $this->Form->control('steps._ids', ['options' => $steps]);
            echo $this->Form->control('tries._ids', ['options' => $tries]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
