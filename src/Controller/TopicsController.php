<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\ORM\TableRegistry;

/**
 * Topics Controller
 *
 * @property \App\Model\Table\TopicsTable $Topics
 *
 * @method \App\Model\Entity\Topic[] paginate($object = null, array $settings = [])
 */
class TopicsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $topics = $this->paginate($this->Topics);

        $this->set(compact('topics'));
        $this->set('_serialize', ['topics']);
    }

    /**
     * View method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $topic = $this->Topics->get($id, [
            'contain' => ['Groups', 'Chapters']
        ]);

        $this->set('topic', $topic);
        $this->set('_serialize', ['topic']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $topic = $this->Topics->newEntity();
        if ($this->request->is('post')) {
            $topic = $this->Topics->patchEntity($topic, $this->request->getData());
            if ($this->Topics->save($topic)) {
                $this->Flash->success(__('The topic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The topic could not be saved. Please, try again.'));
        }
        $groups = $this->Topics->Groups->find('list', ['limit' => 200]);
        $chapters = $this->Topics->Chapters->find('list', ['limit' => 200]);
        $this->set(compact('topic', 'groups', 'chapters'));
        $this->set('_serialize', ['topic']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $topic = $this->Topics->get($id, [
            'contain' => ['Groups', 'Chapters']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $topic = $this->Topics->patchEntity($topic, $this->request->getData());
            if ($this->Topics->save($topic)) {
                $this->Flash->success(__('The topic has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The topic could not be saved. Please, try again.'));
        }
        $groups = $this->Topics->Groups->find('list', ['limit' => 200]);
        $chapters = $this->Topics->Chapters->find('list', ['limit' => 200]);
        $this->set(compact('topic', 'groups', 'chapters'));
        $this->set('_serialize', ['topic']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Topic id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $topic = $this->Topics->get($id);
        if ($this->Topics->delete($topic)) {
            $this->Flash->success(__('The topic has been deleted.'));
        } else {
            $this->Flash->error(__('The topic could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function indexGroup()
    {

//    $topics =  $this->Topics->find()
		  $query = $this->Topics->find()
									->innerJoinWith('Groups.Users')
									->distinct()
									->where(['Users.id' => $this->Auth->user('id')])
									->ANDwhere(['Groups.is_deletable' => '1']);

	    $topics = $this->paginate($query);
  	  $this->set(compact('topics'));
    	$this->set('_serialize', ['topics']);
    }
}
