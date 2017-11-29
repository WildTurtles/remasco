<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;


$cakeDescription = 'Installation : Step Four';

if(!isset($count))
{
    $count = 0;
}
?>

<div class="row">
    <div class="columns large-12">
        <?php// echo $count ?>
        <?php// if ($count === 1 ): ?>
        <?php //echo $this->Form->postButton('Next Step', array('action'=>'step-four'));?> 
        <?php //else: ?>
            <div class="users form large-9 medium-8 columns content">
                <?= $this->Form->create($course) ?>
                    <fieldset>
                    <legend><?= __('Add Link to courses.') ?></legend>
                    <?php
                        echo $this->Form->control('link');
                    ?>
                    </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
        </div>
        <?php //endif; ?>
    </div>
</div>
