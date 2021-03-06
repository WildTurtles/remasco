<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Topic $topic
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('My Profile'), ['action' => 'viewProfile']) ?></li>
        <li><?= $this->Html->link(__('My Topics'), ['controller' => 'Topics', 'action' => 'index-group']) ?></li>
    </ul>
</nav>
<div class="topics view large-9 medium-8 columns content">
    <h3><?= h($topic->name) ?></h3>
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
                <td><?=$this->Html->link(h($chapters->name), ['controller' => 'Chapters', 'action' => 'view', $chapters->id]) ?></td>
                <td><?= h($chapters->created) ?></td>
                <td><?= h($chapters->updated) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    <?php //echo $this->Html->link(__('Add a chapter'), ['controller' => 'Chapters', 'action' => 'addfrom', $topic->id]) ?>
		</div>

</div>
