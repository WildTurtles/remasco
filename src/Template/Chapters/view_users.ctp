<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Chapter $chapter
  */
?>

<?php echo $this->element('menu'); ?>
<?php 

	debug($chapter);
/*debug($topics);
debug($paths);*/

foreach($paths as $path)
{
debug($path);
}
foreach($topics as $topic)
{
debug($topic);
}
exit;

 ?>




<div class="chapters view large-9 medium-8 columns content">

<?php foreach ($chapters as $chapter): ?>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($chapter->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($chapter->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($chapter->updated) ?></td>
        </tr>
    </table>
  <div class="related">
    <h4><?= __('Related Paths') ?></h4>
    <?php if (!empty($chapter->paths)): ?>
      <div class="row small-up-2 medium-up-3 chapters view content related">
        <?php foreach ($chapter->paths as $paths): ?>
          <div class="column ">
            <div class="card">
              <div class="card-section">
                <?php if (!empty($paths->steps)): ?>
                  <?php foreach ($paths->steps as $steps): ?>
                    <p><?= h($steps->number) ?></p>
                    <?php if (!empty($steps->links)): ?>
                      <?php foreach ($steps->links as $links): ?>
                        <p>
                          <?= h($links->name) ?> ->
                          <?= h($links->url) ?>
                        </p>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
                <h4><?= h($paths->name) ?></h4>
                <p><?= h($paths->notes) ?></p>
                <?php //echo $this->Html->link(__('Add Step'), ['controller' => 'Steps', 'action' =>  'addFrom',  $paths->id ]) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
				 <?php if ($mygrp === 'teachers' || $mygrp === 'admin' ): ?>
          <?php echo $this->Html->link(__('Add a chapter'), ['controller' => 'Chapters', 'action' => 'addfrom', $topic->id]) ?>
        <?php endif; ?>

      </div>
    <?php endif; ?>
  </div>
<?php endforeach; ?>
</div>