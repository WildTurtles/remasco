<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $paths = $this->Users->Paths->find('list', ['limit' => 200]);
        $topics = $this->Users->Topics->find('list', ['limit' => 200]);
        $links = $this->Users->Links->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'paths', 'topics','links'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Groups', 'Paths', 'Topics', 'Links']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $paths = $this->Users->Paths->find('list', ['limit' => 200]);
        $topics = $this->Users->Topics->find('list', ['limit' => 200]);
        $links = $this->Users->Links->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'paths', 'topics', 'links'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    /**
     * viewProfile method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewProfile()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
					'contain' => ['Groups' => function ($q) {
   						return $q->where(['Groups.is_deletable' => true]);
							}
				]]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }


		public function changePassword()
    {
        $user = $this->Users->get($this->Auth->user('id'));

        if(!empty($this->request->data))
        {
            $user = $this->Users->patchEntity($user, [
                    'old_password'      => $this->request->data['old_password'],
                    'password'          => $this->request->data['new_password'],
                    'new_password'      => $this->request->data['new_password'],
                    'confirm_password'  => $this->request->data['confirm_password']
                ],
                    ['validate' => 'password']

            );

            if($this->Users->save($user))
            {
							$this->Flash->success('Your password has been changed successfully');
            	//Email code
							return $this->redirect(['action' => 'viewProfile']);
            }
            else
            {
                $this->Flash->error('Error changing password. Please try again!');
            }

        }

        $this->set('user',$user);
    }

    /**
     * EditProfile method
     *
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editProfile()
    {
        $user = $this->Users->get($this->Auth->user('id'), [
            'contain' => ['Groups', 'Paths', 'Topics', 'Links']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your profile has been saved.'));

                return $this->redirect(['action' => 'viewProfile']);
            }
            $this->Flash->error(__('Your profile could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $paths = $this->Users->Paths->find('list', ['limit' => 200]);
        $topics = $this->Users->Topics->find('list', ['limit' => 200]);
        $links = $this->Users->Links->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'paths', 'topics','links'));
        $this->set('_serialize', ['user']);
    }


    public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }else{
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user){
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        }

    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addAdmin()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $this->Users->save($user, ['associated' => ['Groups']]);
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $group = $this->Users->Groups->find('all')
                        ->where(['Groups.name' => 'admin' ])
                        ->first();

            $this->Users->Groups->link($user, [$group]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['Controller' => 'Groups' ,'action' => 'indexAdmin']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $paths = $this->Users->Paths->find('list', ['limit' => 200]);
        $topics = $this->Users->Topics->find('list', ['limit' => 200]);
        $links = $this->Users->Links->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'paths', 'topics','links'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addTeacher()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->Users->save($user, ['associated' => ['Groups']]);
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $group = $this->Users->Groups->find('all')
                        ->where(['Groups.name' => 'teachers' ])
                        ->first();

            $this->Users->Groups->link($user, [$group]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'Groups','action' => 'indexTeachers']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $paths = $this->Users->Paths->find('list', ['limit' => 200]);
        $topics = $this->Users->Topics->find('list', ['limit' => 200]);
        $links = $this->Users->Links->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'paths', 'topics','links'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addStudent()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->Users->save($user, ['associated' => ['Groups']]);
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $group = $this->Users->Groups->find('all')
                        ->where(['Groups.name' => 'students' ])
                        ->first();

            $this->Users->Groups->link($user, [$group]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'Groups' ,'action' => 'indexStudents']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $paths = $this->Users->Paths->find('list', ['limit' => 200]);
        $topics = $this->Users->Topics->find('list', ['limit' => 200]);
        $links = $this->Users->Links->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups', 'paths', 'topics','links'));
        $this->set('_serialize', ['user']);
    }

}
