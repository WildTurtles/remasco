<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add Teacher') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('display_name');
            echo $this->Form->control('email');
            echo $this->Form->control('lastname');
            echo $this->Form->control('firstname');
//            echo $this->Form->control('avatar');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
