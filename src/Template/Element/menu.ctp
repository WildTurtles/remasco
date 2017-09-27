<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
    </ul>
</nav>

<?php if ($this->request->session()->read('Auth.User')): ?>
   Logged in as <?= $this->request->session()->read('Auth.User.username') ?>
<?php endif; ?>
