<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Topic[]|\Cake\Collection\CollectionInterface $topics
  */
?>

<?php echo $this->element('menu'); ?>

<div class="topics index large-9 medium-8 columns content">
    <h3><?= __('Topics') ?></h3>
		<?php if ($mygrp === 'teachers'): ?>
			<?php echo $this->Html->link(__('Add a Topic'), ['action' => 'addTopic']) ?>
		<?php endif; ?>


    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($topics as $topic): ?>
            <tr>
                <td><?= $this->Html->link($topic->name, ['action' => 'view', $topic->id]) ?></td>
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
