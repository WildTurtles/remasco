<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div class="steps form large-9 medium-8 columns content">
    <?= $this->Form->create($step) ?>
    <fieldset>
        <legend><?= __('Add Step') ?></legend>
        <?php
//           echo $this->Form->control('path_id', ['options' => $paths]);
            echo $this->Form->control('lock');
//            echo $this->Form->control('number');
            echo $this->Form->control('links._ids', ['options' => $links]);
//            echo $this->Form->control('multiple_choice_questions._ids', ['options' => $multipleChoiceQuestions]);
//           echo $this->Form->control('opened_questions._ids', ['options' => $openedQuestions]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
