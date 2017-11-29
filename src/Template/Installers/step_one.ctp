<?php
use Cake\Error\Debugger;
use Cake\Cache\Cache;
use Cake\Network\Exception\NotFoundException;
use Cake\Core\Configure;

$cakeDescription = 'Installation : Step one';

$count = 0;
?>

<div class="row">
    <div class="columns large-12">
        <div id="url-rewriting-warning" class="alert url-rewriting">
            <ul>
                <li class="bullet problem">
                    URL rewriting is not properly configured on your server.<br />
                    1) <a target="_blank" href="http://book.cakephp.org/3.0/en/installation.html#url-rewriting">Help me configure it</a><br />
                    2) <a target="_blank" href="http://book.cakephp.org/3.0/en/development/configuration.html#general-configuration">I don't / can't use URL rewriting</a>
                </li>
            </ul>
        </div>
        <?php Debugger::checkSecurityKeys(); ?>
    </div>
</div>

<div class="row">
    <div class="columns large-6">
        <h4>Environment</h4>
        <ul>
        <?php if (version_compare(PHP_VERSION, '5.6.0', '>=')): ?>
        <?php $count++; ?>
            <li class="bullet success">Your version of PHP is 5.6.0 or higher (detected <?= PHP_VERSION ?>).</li>
        <?php else: ?>
            <li class="bullet problem">Your version of PHP is too low. You need PHP 5.6.0 or higher to use CakePHP (detected <?= PHP_VERSION ?>).</li>
        <?php endif; ?>

        <?php if (extension_loaded('mbstring')): ?>
            <li class="bullet success">Your version of PHP has the mbstring extension loaded.</li>
        <?php $count++; ?>
        <?php else: ?>
            <li class="bullet problem">Your version of PHP does NOT have the mbstring extension loaded.</li>
        <?php endif; ?>

        <?php if (extension_loaded('openssl')): ?>
        <?php $count++; ?>
            <li class="bullet success">Your version of PHP has the openssl extension loaded.</li>
        <?php elseif (extension_loaded('mcrypt')): ?>
            <li class="bullet success">Your version of PHP has the mcrypt extension loaded.</li>
        <?php else: ?>
            <li class="bullet problem">Your version of PHP does NOT have the openssl or mcrypt extension loaded.</li>
        <?php endif; ?>

        <?php if (extension_loaded('intl')): ?>
        <?php $count++; ?>
            <li class="bullet success">Your version of PHP has the intl extension loaded.</li>
        <?php else: ?>
            <li class="bullet problem">Your version of PHP does NOT have the intl extension loaded.</li>
        <?php endif; ?>
        </ul>
    </div>
    <div class="columns large-6">
        <h4>Filesystem</h4>
        <ul>
        <?php if (is_writable(TMP)): ?>
        <?php $count++; ?>
            <li class="bullet success">Your tmp directory is writable.</li>
        <?php else: ?>
            <li class="bullet problem">Your tmp directory is NOT writable.</li>
        <?php endif; ?>
        <?php if (is_writable(LOGS)): ?>
        <?php $count++; ?>
            <li class="bullet success">Your logs directory is writable.</li>
        <?php else: ?>
            <li class="bullet problem">Your logs directory is NOT writable.</li>
        <?php endif; ?>

        <?php $settings = Cache::config('_cake_core_'); ?>
        <?php if (!empty($settings)): ?>
        <?php $count++; ?>
            <li class="bullet success">The <em><?= $settings['className'] ?>Engine</em> is being used for core caching. To change the config edit config/app.php</li>
        <?php else: ?>
            <li class="bullet problem">Your cache is NOT working. Please check the settings in config/app.php</li>
        <?php endif; ?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="columns large-12">
        <?php if ($count === 7 ): ?>
        <?php echo $this->Form->postButton('Next Step', array('action'=>'step-two'));?> 
        <?php else: ?>
        <?php echo $this->Form->postButton(__('Actualize'), array('action'=>'step-one'));?> 
        <?php endif; ?>
    </div>
</div>
