<?php
//use Cake\Cache\Cache;
//use Cake\Core\Configure;
//use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
//use Cake\Error\Debugger;
//use Cake\Network\Exception\NotFoundException;

$cakeDescription = 'Installation : Step two';

$count = 0;
?>

<div class="row">
    <div class="columns large-6">
        <h4>Database</h4>
        <?php
        try {
            $connection = ConnectionManager::get('default');
            $connected = $connection->connect();
        } catch (Exception $connectionError) {
            $connected = false;
            $errorMsg = $connectionError->getMessage();
            if (method_exists($connectionError, 'getAttributes')):
                $attributes = $connectionError->getAttributes();
                if (isset($errorMsg['message'])):
                    $errorMsg .= '<br />' . $attributes['message'];
                endif;
            endif;
        }
        ?>
        <ul>
        <?php if ($connected): ?>
        <?php $count++; ?>
            <li class="bullet success">CakePHP is able to connect to the database.</li>
        <?php else: ?>
            <li class="bullet problem">CakePHP is NOT able to connect to the database.<br /> You must configure the database in config/app.php<?= $errorMsg ?></li>
        <?php endif; ?>
        </ul>
    </div>
  <hr />
<div class="row">
    <div class="columns large-12">
        <?php if ($count === 1 ): ?>
        <?php echo $this->Form->postButton('Next Step', array('action'=>'step-three'));?> 
        <?php else: ?>
        <?php echo $this->Form->postButton(__('Actualize'), array('action'=>'step-two'));?> 
        <?php endif; ?>
    </div>
</div>

