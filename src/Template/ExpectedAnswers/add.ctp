<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Expected Answers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Opened Questions'), ['controller' => 'OpenedQuestions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Opened Question'), ['controller' => 'OpenedQuestions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="expectedAnswers form large-9 medium-8 columns content">
    <?= $this->Form->create($expectedAnswer) ?>
    <fieldset>
        <legend><?= __('Add Expected Answer') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
