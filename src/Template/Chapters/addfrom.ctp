<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Chapters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Paths'), ['controller' => 'Paths', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Path'), ['controller' => 'Paths', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Topics'), ['controller' => 'Topics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Topic'), ['controller' => 'Topics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="chapters form large-9 medium-8 columns content">
    <?= $this->Form->create($chapter) ?>
    <fieldset>
        <legend><?= __('Add Chapter') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
