<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?php echo $this->element('menu'); ?>


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
