<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Chapter $chapter
  */
?>

<?php echo $this->element('menu'); ?>

<div class="chapters view large-9 medium-8 columns content">

<?php// foreach ($chapters as $chapter): ?>
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
    <?php if (!empty($paths)): ?>
      <div class="row small-up-2 medium-up-3 chapters view content related">
        <?php foreach ($paths as $path): ?>
          <div class="column ">
            <div class="card">
              <div class="card-section">
                <?php if (!empty($path->steps)): ?>
                  <?php foreach ($path->steps as $steps): ?>
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
                <h4><?= h($path->name) ?></h4>
                <p><?= h($path->notes) ?></p>
                <?php //echo $this->Html->link(__('Add Step'), ['controller' => 'Steps', 'action' =>  'addFrom',  $paths->id ]) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
				 <?php if ($mygrp === 'teachers' || $mygrp === 'admin' ): ?>
          <?php echo $this->Html->link(__('Add a path'), ['controller' => 'Paths', 'action' => 'addfrom', $chapter->id]) ?>
        <?php endif; ?>

      </div>
    <?php endif; ?>
  </div>
<?php //endforeach; ?>
</div>
