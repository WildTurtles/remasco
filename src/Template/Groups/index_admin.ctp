<?php if (empty($groups)): ?>
<?php else: ?>
<?php foreach ($groups as $group): ?>
<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->name) ?></h3>
    <?php if ($mygrp === 'admin'): ?>
      <?php echo $this->Html->link(__('Add an Administrator'), ['controller' => 'Users', 'action' => 'addTeacher']) ?>
    <?php endif; ?>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($group->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->users as $user): ?>
            <tr>
                <td><?= h($user->username) ?></td>
                <td> <?= $this->Html->link( h($user->lastname), ['controller' => 'Users', 'action' => 'view', $user->id]) ?> <?php //echo h($topics->name) ?></td>
                <td><?= h($user->firstname) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->updated) ?></td>
                <td class="actions">
					<?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0} {1}?', $user->lastname, $user->firstname)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
