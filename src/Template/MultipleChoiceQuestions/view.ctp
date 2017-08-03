<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\MultipleChoiceQuestion $multipleChoiceQuestion
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Multiple Choice Question'), ['action' => 'edit', $multipleChoiceQuestion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Multiple Choice Question'), ['action' => 'delete', $multipleChoiceQuestion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleChoiceQuestion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Multiple Choice Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Multiple Choice Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['controller' => 'Steps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['controller' => 'Steps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tries'), ['controller' => 'Tries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Try'), ['controller' => 'Tries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="multipleChoiceQuestions view large-9 medium-8 columns content">
    <h3><?= h($multipleChoiceQuestion->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($multipleChoiceQuestion->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($multipleChoiceQuestion->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($multipleChoiceQuestion->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($multipleChoiceQuestion->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($multipleChoiceQuestion->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($multipleChoiceQuestion->questions as $questions): ?>
            <tr>
                <td><?= h($questions->id) ?></td>
                <td><?= h($questions->name) ?></td>
                <td><?= h($questions->note) ?></td>
                <td><?= h($questions->created) ?></td>
                <td><?= h($questions->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Steps') ?></h4>
        <?php if (!empty($multipleChoiceQuestion->steps)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Number') ?></th>
                <th scope="col"><?= __('Path Id') ?></th>
                <th scope="col"><?= __('Lock') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($multipleChoiceQuestion->steps as $steps): ?>
            <tr>
                <td><?= h($steps->id) ?></td>
                <td><?= h($steps->number) ?></td>
                <td><?= h($steps->path_id) ?></td>
                <td><?= h($steps->lock) ?></td>
                <td><?= h($steps->created) ?></td>
                <td><?= h($steps->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Steps', 'action' => 'view', $steps->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Steps', 'action' => 'edit', $steps->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Steps', 'action' => 'delete', $steps->id], ['confirm' => __('Are you sure you want to delete # {0}?', $steps->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tries') ?></h4>
        <?php if (!empty($multipleChoiceQuestion->tries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($multipleChoiceQuestion->tries as $tries): ?>
            <tr>
                <td><?= h($tries->id) ?></td>
                <td><?= h($tries->created) ?></td>
                <td><?= h($tries->updated) ?></td>
                <td><?= h($tries->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tries', 'action' => 'view', $tries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tries', 'action' => 'edit', $tries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tries', 'action' => 'delete', $tries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
