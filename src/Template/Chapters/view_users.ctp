<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Chapter $chapter
  */
?>

<?php //debug($chapter); exit; ?> 
<?php //debug($linkslocks); exit; ?> 

<?php echo $this->element('menu'); ?>

<div class="chapters view large-9 medium-8 columns content">

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
    <?php if ($mygrp === 'teachers' || $mygrp === 'admin' ): ?>
         <?php echo $this->Html->link(__('Add a path'), ['controller' => 'Paths', 'action' => 'addfrom', $chapter->id]) ?>
    <?php endif; ?>

    <?php if (!empty($paths)): ?>
        <div class="row small-up-2 medium-up-3 chapters view content related">
        <?php foreach ($paths as $path): ?>
            <div class="column ">
                <div class="card">
                <div class="card-section">
                    <h4><?= h($path->name) ?> </h4>
                    <?php
                        if ($mygrp === 'teachers' || $mygrp === 'admin' )
                        {
                           echo $this->Html->link(__('Edit Path'), ['controller' => 'Paths', 'action' =>  'edit',  $path->id, $chapter->id ]);
                        }
                    ?>
                    <p><?= h($path->notes) ?></p>
		    <?php
                        if ($mygrp === 'teachers' || $mygrp === 'admin' )
                        {
                            echo $this->Html->link(__('Add Step'), ['controller' => 'Steps', 'action' =>  'addFrom',  $path->id, $chapter->id ]);
                        }
                        $previousCompleted = true;
                        if (!empty($path->steps))
                        {
                            foreach ($path->steps as $step)
                            {
                    ?>
                    <p><?= h($step->number) ?></p>
                    <?php
                                if ( $previousCompleted )
                                {
                                    //$count = 0;
                                    $count_lock = 0;
                                    foreach ($step->links as $link)
                                    {
                                        //$count++;
                                        foreach($linkslocks as $lck)
                                        {
                                            /*debug($step->id);
                                            debug($link->id);
                                            debug($lck);*/
                                            if($lck->step_id == $step->id
                                                && $lck->link_id == $link->id
                                                && $lck->lock == false)
                                            {
                    ?>
                    <p>
                        <?php echo $this->Html->link( h($link->name.' : is unlock' ) , $link->url , array('target' => '_blank')) ?>
                    </p>
                    <?php
                                            }
                                            elseif($lck->step_id == $step->id
                                                    && $lck->link_id == $link->id
                                                    && $lck->lock == true)
                                            {
                                                $count_lock++;
                    ?>
                    <p>
                        <?php echo $this->Html->link(
                            h($link->name.' is lock' ) ,
                        ['controller' => 'Steps',
                         'action' =>  'unlock',
                         $step->id, $link->id  ,$chapter->id ],
                        array('target' => '_blank')); ?>
                    </p>
                    <?php
                                            }
                                        }
//                                        debug('cout '.$count );
//                                        debug('cout lock '.$count_lock );
                                    }
//                                    debug('cout '.$count );
//                                    debug('cout lock '.$count_lock );
                                    if(/*$step->lock &&*/ $count_lock > 0)
                                    {
                                        //debug('not finish next should not dispay');
                                        $previousCompleted = false;
                                    }
                                }
                            }
                        }
                    ?>
                </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

