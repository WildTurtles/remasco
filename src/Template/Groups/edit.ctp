<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php echo $this->element('menu'); ?>

<div class="groups form large-9 medium-8 columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Edit Class') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end()?>

</div>
