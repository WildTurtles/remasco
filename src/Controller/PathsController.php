<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paths Controller
 *
 * @property \App\Model\Table\PathsTable $Paths
 *
 * @method \App\Model\Entity\Path[] paginate($object = null, array $settings = [])
 */
class PathsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $paths = $this->paginate($this->Paths);

        $this->set(compact('paths'));
        $this->set('_serialize', ['paths']);
    }

    /**
     * View method
     *
     * @param string|null $id Path id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $path = $this->Paths->get($id, [
            'contain' => ['Chapters', 'Tries', 'Users', 'Steps']
        ]);

        $this->set('path', $path);
        $this->set('_serialize', ['path']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $path = $this->Paths->newEntity();
        if ($this->request->is('post')) {
            $path = $this->Paths->patchEntity($path, $this->request->getData());
            if ($this->Paths->save($path)) {
                $this->Flash->success(__('The path has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The path could not be saved. Please, try again.'));
        }
        $chapters = $this->Paths->Chapters->find('list', ['limit' => 200]);
        $tries = $this->Paths->Tries->find('list', ['limit' => 200]);
        $users = $this->Paths->Users->find('list', ['limit' => 200]);
        $this->set(compact('path', 'chapters', 'tries', 'users'));
        $this->set('_serialize', ['path']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Path id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $path = $this->Paths->get($id, [
            'contain' => ['Chapters', 'Tries', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $path = $this->Paths->patchEntity($path, $this->request->getData());
            if ($this->Paths->save($path)) {
                $this->Flash->success(__('The path has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The path could not be saved. Please, try again.'));
        }
        $chapters = $this->Paths->Chapters->find('list', ['limit' => 200]);
        $tries = $this->Paths->Tries->find('list', ['limit' => 200]);
        $users = $this->Paths->Users->find('list', ['limit' => 200]);
        $this->set(compact('path', 'chapters', 'tries', 'users'));
        $this->set('_serialize', ['path']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Path id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $path = $this->Paths->get($id);
        if ($this->Paths->delete($path)) {
            $this->Flash->success(__('The path has been deleted.'));
        } else {
            $this->Flash->error(__('The path could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addFrom($chapterId = null )
    {
        $path = $this->Paths->newEntity();
        if ($this->request->is('post')) {
            $path = $this->Paths->patchEntity($path, $this->request->getData());
            if ($this->Paths->save($path)) {
                $this->Flash->success(__('The path has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The path could not be saved. Please, try again.'));
        }
        //$tries = $this->Paths->Tries->find('list', ['limit' => 200]);

			 	$topics = $this->Paths->Chapters->Topics->find()->matching('Chapters',
 					function ($q) use ($chapterId) {
    				return $q
        		->where(['Chapters.id' => $chapterId]);
					});
				$topicsId = array();
				foreach( $topics as $topic)
				{
					array_push($topicsId, $topic->id);
				}
				$groups = $this->Paths->Chapters->Topics->Groups->find()->matching('Topics',
          function ($q) use ($topicsId) {
            return $q
            ->where(['Topics.id IN' => $topicsId]);
          });
				$names = array('admin', 'teachers', 'students');
				$groups->where(['Groups.name NOT IN' => $names]);
				$groupsId = array();
				foreach($groups as $group)
				{
					array_push($groupsId, $group->id);
				}
				$users = $this->Paths->Users->find('list')->matching('Groups',
          function ($q) use ($groupsId) {
            return $q
            ->where(['Groups.id IN' => $groupsId]);
          });
				$users->where(['Users.id !=' => $this->Auth->user('id') ]);

        $this->set(compact('path', 'tries','users'));
        $this->set('_serialize', ['path']);
    }


}
