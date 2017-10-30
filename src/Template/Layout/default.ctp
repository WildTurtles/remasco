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

$cakeDescription = __('Remasco ');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php //echo $this->Html->css('base.css') ?>
    <?php //echo $this->Html->css('cake.css') ?>
    <?php echo $this->Html->css('vendor/foundation.css') ?>
    <?php echo $this->Html->css('vendor/foundation.min.css') ?>
    <?php echo $this->Html->css('cake.css') ?>
    <?php //echo $this->Html->css('app.css') ?>
    <?php echo $this->Html->css('menu.css') ?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text" ><h1>Remasco</h1></li>
    <?php if(isset($mygrp)) : ?>
         <?php if ($mygrp === 'admin' ): ?>
           <?php  echo $this->element('menu_admin'); ?>
                <?php endif; ?>
                <?php if ($mygrp === 'teachers' || $mygrp === 'admin' ): ?>
                    <?php echo $this->element('menu_teachers'); ?>
                <?php endif; ?>
                <?php if ($mygrp === 'students' || $mygrp === 'admin' ): ?>
                    <?php echo $this->element('menu_students'); ?>
                <?php endif; ?>
                <?php echo $this->element('menu_common'); ?>
       <?php endif; ?>

    <!-- <li>
        <a href="#">One</a>
        <ul class="menu vertical">
          <li><a href="#">One</a></li>
          <li><a href="#">Two</a></li>
          <li><a href="#">Three</a></li>
                <li><a href="index.html">Savoir</a></li>
                <li><a href="media.html">Connexion</a></li>
                <li><a href="news.asp">Inscription</a></li>
                <li><a href="contact.asp">Contact</a></li>
                <li><a href="">About</a></li>
   </ul>
      </li>
      <li><a href="#">Two</a></li>
      <li><a href="#">Three</a></li> -->
    </ul>
  </div>
<?php if ($this->request->session()->read('Auth.User')): ?>
  <div class="top-bar-right">
    <ul class="menu">
      <li><?php echo $this->Html->link( $this->request->session()->read('Auth.User.username'),['controller' => 'Users', 'action' => 'viewProfile'],['class' => 'menubar']) ?></li>
      <li><?php echo $this->Html->image('u5.png', ['alt' => 'user picture', 'id' => 'profil']);?></li>
    </ul>
  </div>
<?php endif; ?>
</div>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
<?= $this->fetch('scriptBottom') ?>
</body>
</html>
