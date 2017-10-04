<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group) ?>


    <fieldset>
        <legend><?= __('Add Group') ?></legend>
        <?php
            echo $this->Form->control('name');
            //echo $this->Form->control('is_deletable');
            //echo $this->Form->control('topics._ids', ['options' => $topics]);
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
