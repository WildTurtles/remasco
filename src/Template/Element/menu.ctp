<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('My Profile'), ['controller' => 'Users', 'action' => 'viewProfile']) ?></li>
        <li><?= $this->Html->link(__('My Topics'), ['controller' => 'Topics', 'action' => 'index-group']) ?></li>
    </ul>
</nav>
<?php if ($this->request->session()->read('Auth.User')): ?>
   Logged in as <?= $this->request->session()->read('Auth.User.username') ?>
<?php endif; ?>
