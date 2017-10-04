<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Group[]|\Cake\Collection\CollectionInterface $groups
  */
?>

<div class="groups index large-9 medium-8 columns content">
    <h3><?= __('Classes') ?></h3>
		<?php echo $this->Html->link(__('Add Class (group in physical class)'), ['controller' => 'Groups', 'action' =>  'add' ]) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groups as $group): ?>
            <tr>
                <td><?= $this->Html->link( h($group->name), ['action' => 'viewClasses', $group->id]) ?></td>
                <td class="actions">
                    <?php // echo  $this->Html->link(__('Edit'), ['action' => 'edit', $group->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
