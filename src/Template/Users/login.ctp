<?php
/**
  * @var \App\View\AppView $this
  */
 $this->Html->css('login', ['block' => true]);
?>

    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="row align-middle align-center login large-6 columns">
          <div class="remasco">
            <h1><?= __('Login')?></h1>
          </div>
          <?= $this->Flash->render('auth') ?>
          <?= $this->Form->create() ?>
          <fieldset class="show-password log">
            <legend><?= __('Please enter your username and password to access to your private space') ?></legend>
            <?= $this->Form->control('username') ?>
            <div class="password-wrapper">
                <?= $this->Form->control('password', ['class' => 'password']) ?>
            </div>
          </fieldset>
          <div class="large-6 large-centered text-center columns">
            <p>
                <?= $this->Form->button(__('Login'), ['class'=> 'button round']); ?>
            </p>
          </div>
    <?= $this->Form->end() ?>



            <!-- <div class="accueil">
              <p>Merci de vous identifier pour accéder à votre espace étudiant ou enseignant.</p>
              <p><?php //echo __('Please identifie yourself to access to your private space') ?></p>
            </div>
               <form class="show-password log">
                <label for="username">Votre identifiant</label>
                <input type="text" value="" placeholder="Identifiant" id="username">
            <div class="password-wrapper">
                <label for="password">Votre mot de passe</label>
                <input type="password" value="" placeholder="Mot de passe" id="password" class="password">
               </form>
            </div>
                  <fieldset class="row large-6 columns log">
                    <input id="checkbox1" type="checkbox"><label for="checkbox1">Se souvenir de moi</label>
                  </fieldset>
              <div class="large-6 large-centered text-center columns">
                <p><a href="#" class="button round">Valider</a><br/></p>
              </div>
              <div class="accueil">
                <p>Mot de passe oublié ?</p>
              </div>-->
        </div>
      </div>


<!--<div class="users form">
<?php //echo $this->Flash->render('auth') ?>
    <?php //echo $this->Form->create() ?>
    <fieldset>
        <legend><?php //echo __('Please enter your username and password to access to your private space') ?></legend>
        <?php //echo $this->Form->control('username') ?>
        <?php //echo $this->Form->control('password') ?>
    </fieldset>
    <?php //echo $this->Form->button(__('Login')); ?>
    <?php //echo $this->Form->end() ?>
</div>-->
