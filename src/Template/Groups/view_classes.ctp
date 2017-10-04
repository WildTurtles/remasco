<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Group $group
  */
?>

<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->name) ?></h3>
    <?php echo $this->Html->link(__('Add people, edit the group. '), ['controller' => 'Groups', 'action' =>  'edit',$group->id ]) ?>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($group->topics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
            </tr>
            <?php foreach ($group->users as $user): ?>
            <tr>
                <td><?= h($user->full_name) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
