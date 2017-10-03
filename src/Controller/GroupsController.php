<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 *
 * @method \App\Model\Entity\Group[] paginate($object = null, array $settings = [])
 */
class GroupsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $groups = $this->paginate($this->Groups);

        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Topics', 'Users']
        ]);

        $this->set('group', $group);
        $this->set('_serialize', ['group']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity();
        if ($this->request->is('post')) {

            $group = $this->Groups->patchEntity($group, $this->request->getData());
						$user = $this->Groups->Users->find('all')->where(['id =' => $this->Auth->user('id')])->first();
						$group->users[] = $user;
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index-classes']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $topics = $this->Groups->Topics->find('list', ['limit' => 200]);
        $users = $this->Groups->Users->find('list', ['limit' => 200])->where(['id !=' => $this->Auth->user('id')]);
        $this->set(compact('group', 'topics', 'users'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => ['Topics', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->getData());
						$user = $this->Groups->Users->find('all')->where(['id =' => $this->Auth->user('id')])->first();
						$group->users[] = $user;
            if ($this->Groups->save($group)) {
                $this->Flash->success(__('The group has been saved.'));

                return $this->redirect(['action' => 'index-classes']);
            }
            $this->Flash->error(__('The group could not be saved. Please, try again.'));
        }
        $topics = $this->Groups->Topics->find('list', ['limit' => 200]);
        $users = $this->Groups->Users->find('list', ['limit' => 200])->where(['id !=' => $this->Auth->user('id')]);
        $this->set(compact('group', 'topics', 'users'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success(__('The group has been deleted.'));
        } else {
            $this->Flash->error(__('The group could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index-classes']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function indexClasses()
    {

        $names = array('admin', 'teachers', 'students');
        $grps = $this->Groups->find('all', ['limit' => 200])->contain(['Users'])->where(['name NOT IN' => $names]);
				$userId = $this->Auth->user('id');
				$grps->matching('Users', function ($q) use ($userId) {
    				return $q->where(['Users.id' => $userId]);
				});
				$groups = $this->paginate($grps);
        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewClasses($id = null)
    {

        $group = $this->Groups->get($id, [
            'contain' => ['Topics', 'Users']
        ]);

        $this->set('group', $group);
        $this->set('_serialize', ['group']);
    }

    public function indexTeachers()
    {
				$groups = $this->paginate($this->groupUsers('teachers'));

        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
    }

		private function groupUsers($groupName)
		{
        $grp = $this->Groups->find('all', [
            'contain' => ['Users']
        ])->where(['name IN' => $groupName]);

			return $grp;
		}

    public function indexStudents()
    {
				$groups = $this->paginate($this->groupUsers('students'));

        $this->set(compact('groups'));
        $this->set('_serialize', ['groups']);
    }
}
