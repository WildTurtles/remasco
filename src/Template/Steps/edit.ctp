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
                ['action' => 'delete', $step->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $step->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Steps'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Paths'), ['controller' => 'Paths', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Path'), ['controller' => 'Paths', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Links'), ['controller' => 'Links', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Link'), ['controller' => 'Links', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Multiple Choice Questions'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Multiple Choice Question'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Opened Questions'), ['controller' => 'OpenedQuestions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Opened Question'), ['controller' => 'OpenedQuestions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="steps form large-9 medium-8 columns content">
    <?= $this->Form->create($step) ?>
    <fieldset>
        <legend><?= __('Edit Step') ?></legend>
        <?php
            echo $this->Form->control('number');
            echo $this->Form->control('path_id', ['options' => $paths]);
            echo $this->Form->control('lock');
            echo $this->Form->control('links._ids', ['options' => $links]);
            echo $this->Form->control('multiple_choice_questions._ids', ['options' => $multipleChoiceQuestions]);
            echo $this->Form->control('opened_questions._ids', ['options' => $openedQuestions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
