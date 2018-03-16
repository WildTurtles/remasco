<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\WikiForm;
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Event\Event;
use Migrations\Migrations;

/**
 * Installers Controller
 *
 * @property \App\Model\Table\AnswersTable $Answers
 *
 * @method \App\Model\Entity\Answer[] paginate($object = null, array $settings = [])
 */
class InstallersController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->modelClass = false;
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->viewBuilder()->layout('installer'); // New in 3.1
    }

    public function stepOne(){
    }

    public function stepTwo(){

    }

    public function stepThree(){
 if($this->request->is('post') &&
            ($this->referer() ==  Router::url(array('controller' => 'installers',
                     'action' => 'stepTwo'), true)))
{
        $migrations = new Migrations();
        if($migrations->migrate()){
            $this->Flash->success(__('The database schema is now create.'));
            if($migrations->seed()){
               $this->Flash->success(__('The database is now populated.')); 
            }else{
               $this->Flash->success(__('The database couldn’t be populated.')); 
            }

        }else{
            $this->Flash->success(__('The database schema can’t be created.')); 
        }
}
        $this->loadModel('Users');
        $user = $this->Users->newEntity();

        if($this->request->is('post') &&
            ($this->referer() ==  Router::url(array('controller' => 'installers',
                     'action' => 'stepThree'), true)))
        {
            $this->Users->save($user, ['associated' => ['Groups']]);
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $group = $this->Users->Groups->find('all')
                        ->where(['Groups.name' => 'admin' ])
                        ->first();
            //TODO check if group is null
            $this->Users->Groups->link($user, [$group]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->set('count', 1 );
                $user = $this->Users->newEntity();
               return $this->redirect(['action' => 'stepFour']); 
            }else{
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    $this->set('user', $user);
    }

    public function stepFour()
    {
        $course = new WikiForm();
        $wiki = $this->request->getData();
        if($this->request->is('post') &&
            ($this->referer() ==  Router::url(array('controller' => 'installers',
                     'action' => 'stepFour'), true)))
        {
            Configure::write('Wiki.link', ($wiki['link']));
            Configure::dump('wiki', 'default', ['Wiki']);
            return $this->redirect(['action' => 'stepFive']);
        }else{
            if($this->referer() ==  Router::url(array('controller' => 'installers',
                     'action' => 'stepFour'), true))
            {
                $this->Flash->error(__('The Link could not be saved. Please, try again.'));
            }
        }
        $this->set('course', $course);
    }

    public function stepFive()
    {
        Configure::write('Install.done',true);
        Configure::dump('install', 'default', ['Install']);
        //connect

        //redirect to page help
        $this->Flash->success(__('The install is now finish.'));
        return $this->redirect(['controller' => 'Users' ,'action' => 'login']);
    }



}
