<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Chapter $chapter
  */

debug($chapter);
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('My Profile'), ['action' => 'viewProfile']) ?></li>
        <li><?= $this->Html->link(__('My Topics'), ['controller' => 'Topics', 'action' => 'index-group']) ?></li>
    </ul>
</nav>

<div class="chapters edit large-9 medium-8 columns content">
	<?= $this->Html->link(__('Add a path'), ['action' => 'addfrom', $chapter->paths->chapters->id]) ?>
</div>

<div class="chapters view large-9 medium-8 columns content">
  <h3><?= h($chapter->paths->chapters->name) ?></h3>
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
								<?= $this->Html->link(__('Add Step'), ['controller' => 'Steps', 'action' =>  'addFrom',  $paths->id ]) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
