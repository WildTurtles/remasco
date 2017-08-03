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
                ['action' => 'delete', $appreciation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appreciation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Appreciations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Opened Answers'), ['controller' => 'OpenedAnswers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Opened Answer'), ['controller' => 'OpenedAnswers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="appreciations form large-9 medium-8 columns content">
    <?= $this->Form->create($appreciation) ?>
    <fieldset>
        <legend><?= __('Edit Appreciation') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('opened_answers._ids', ['options' => $openedAnswers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
