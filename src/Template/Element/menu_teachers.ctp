<?php if(!empty($wikiLink)) : ?>
<li><?php echo $this->Html->link(__('Courses wiki'), $wikiLink) ?></li>
<?php endif;?>

<li><?php echo $this->Html->link(__('Classes  list'), ['controller' => 'Groups', 'action' => 'index-classes']) ?></li>
<li><?php echo $this->Html->link(__('Topics list'), ['controller' => 'Topics', 'action' => 'index-teachers']) ?></li>
<li><?php echo $this->Html->link(__('Courses link list'), ['controller' => 'Links', 'action' => 'index-links']) ?></li>
