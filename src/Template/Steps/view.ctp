<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Step $step
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Step'), ['action' => 'edit', $step->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Step'), ['action' => 'delete', $step->id], ['confirm' => __('Are you sure you want to delete # {0}?', $step->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Steps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Step'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paths'), ['controller' => 'Paths', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Path'), ['controller' => 'Paths', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Links'), ['controller' => 'Links', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Link'), ['controller' => 'Links', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Multiple Choice Questions'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Multiple Choice Question'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Opened Questions'), ['controller' => 'OpenedQuestions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Opened Question'), ['controller' => 'OpenedQuestions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="steps view large-9 medium-8 columns content">
    <h3><?= h($step->Number) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($step->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Path') ?></th>
            <td><?= $step->has('path') ? $this->Html->link($step->path->name, ['controller' => 'Paths', 'action' => 'view', $step->path->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= $this->Number->format($step->number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($step->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($step->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lock') ?></th>
            <td><?= $step->lock ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Links') ?></h4>
        <?php if (!empty($step->links)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($step->links as $links): ?>
            <tr>
                <td><?= h($links->id) ?></td>
                <td><?= h($links->name) ?></td>
                <td><?= h($links->url) ?></td>
                <td><?= h($links->created) ?></td>
                <td><?= h($links->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Links', 'action' => 'view', $links->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Links', 'action' => 'edit', $links->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Links', 'action' => 'delete', $links->id], ['confirm' => __('Are you sure you want to delete # {0}?', $links->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Multiple Choice Questions') ?></h4>
        <?php if (!empty($step->multiple_choice_questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($step->multiple_choice_questions as $multipleChoiceQuestions): ?>
            <tr>
                <td><?= h($multipleChoiceQuestions->id) ?></td>
                <td><?= h($multipleChoiceQuestions->name) ?></td>
                <td><?= h($multipleChoiceQuestions->created) ?></td>
                <td><?= h($multipleChoiceQuestions->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'view', $multipleChoiceQuestions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'edit', $multipleChoiceQuestions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MultipleChoiceQuestions', 'action' => 'delete', $multipleChoiceQuestions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $multipleChoiceQuestions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Opened Questions') ?></h4>
        <?php if (!empty($step->opened_questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Expected Answer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($step->opened_questions as $openedQuestions): ?>
            <tr>
                <td><?= h($openedQuestions->id) ?></td>
                <td><?= h($openedQuestions->name) ?></td>
                <td><?= h($openedQuestions->notes) ?></td>
                <td><?= h($openedQuestions->created) ?></td>
                <td><?= h($openedQuestions->updated) ?></td>
                <td><?= h($openedQuestions->expected_answer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OpenedQuestions', 'action' => 'view', $openedQuestions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OpenedQuestions', 'action' => 'edit', $openedQuestions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OpenedQuestions', 'action' => 'delete', $openedQuestions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $openedQuestions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
