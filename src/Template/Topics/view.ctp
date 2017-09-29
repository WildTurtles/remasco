<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Topic $topic
  */
?>

<?php echo $this->element('menu'); ?>

<div class="topics view large-9 medium-8 columns content">
    <h3><?= h($topic->name) ?></h3>
		<?php if ($mygrp === 'teachers' || $mygrp === 'admin' ): ?>
			<?php echo $this->Html->link(__('Edit, change groups (classes) assign'), ['controller' => 'Topics', 'action' => 'edit', $topic->id]) ?>
		<?php endif; ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($topic->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($topic->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($topic->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Chapters') ?></h4>
        <?php if (!empty($topic->chapters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
            </tr>
            <?php foreach ($topic->chapters as $chapters): ?>
            <tr>
                <td><?=$this->Html->link(h($chapters->name), ['controller' => 'Chapters', 'action' => 'viewUsers', $chapters->id]) ?></td>
                <td><?= h($chapters->created) ?></td>
                <td><?= h($chapters->updated) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>

			<?php if ($mygrp === 'teachers' || $mygrp === 'admin' ): ?>
			    <?php echo $this->Html->link(__('Add a chapter'), ['controller' => 'Chapters', 'action' => 'addfrom', $topic->id]) ?>
        <?php endif; ?>
		</div>
    <div class="related">
        <h4><?= __('Classes assign') ?></h4>
        <?php if (!empty($topic->groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
            </tr>
            <?php foreach ($topic->groups as $groups): ?>
            <tr>
		<?php if ($mygrp === 'teachers' || $mygrp === 'admin' ): ?>
                <td><?= $this->Html->link(h($groups->name), ['controller' => 'Groups', 'action' => 'view-classes', $groups->id]) ?></td>
		<?php else: ?>
                <td><?= h($groups->name) ?></td>
		<?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    <?php //echo $this->Html->link(__('Add a class, a group'), ['controller' => 'Topics', 'action' => 'editCla', $topic->id]) ?>
		</div>

</div>
