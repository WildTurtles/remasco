<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="topics form large-9 medium-8 columns content">
    <?= $this->Form->create($topic) ?>
    <fieldset>
        <legend><?= __('Edit Topic') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('groups._ids', ['options' => $groups]);
            //echo $this->Form->control('chapters._ids', ['options' => $chapters]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end(); ?>
</div>
