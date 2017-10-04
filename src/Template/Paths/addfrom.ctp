<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="paths form large-9 medium-8 columns content">
    <?= $this->Form->create($path) ?>
    <fieldset>
        <legend><?= __('Add Path') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('notes');
            //echo $this->Form->control('chapters._ids', ['options' => $chapters]);
            //echo $this->Form->control('tries._ids', ['options' => $tries]);
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
