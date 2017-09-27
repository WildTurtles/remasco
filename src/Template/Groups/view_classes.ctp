<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Group $group
  */
?>


<?php echo $this->element('menu'); ?>

<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->name) ?></h3>
    <div class="related">
        <h4><?= __('Related Topics') ?></h4>
        <?php if (!empty($group->topics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->topics as $topics): ?>
            <tr>
                <td> <?= $this->Html->link( h($topics->name), ['controller' => 'Topics', 'action' => 'view', $topics->id]) ?> <?php //echo h($topics->name) ?></td>
                <td><?= h($topics->created) ?></td>
                <td><?= h($topics->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Topics', 'action' => 'edit', $topics->id]) ?>
										<?= $this->Form->postLink(__('Delete'), ['controller' => 'Topics', 'action' => 'delete', $topics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $topics->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
