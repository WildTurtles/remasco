<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Appreciations Controller
 *
 * @property \App\Model\Table\AppreciationsTable $Appreciations
 *
 * @method \App\Model\Entity\Appreciation[] paginate($object = null, array $settings = [])
 */
class AppreciationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $appreciations = $this->paginate($this->Appreciations);

        $this->set(compact('appreciations'));
        $this->set('_serialize', ['appreciations']);
    }

    /**
     * View method
     *
     * @param string|null $id Appreciation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appreciation = $this->Appreciations->get($id, [
            'contain' => ['OpenedAnswers']
        ]);

        $this->set('appreciation', $appreciation);
        $this->set('_serialize', ['appreciation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appreciation = $this->Appreciations->newEntity();
        if ($this->request->is('post')) {
            $appreciation = $this->Appreciations->patchEntity($appreciation, $this->request->getData());
            if ($this->Appreciations->save($appreciation)) {
                $this->Flash->success(__('The appreciation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appreciation could not be saved. Please, try again.'));
        }
        $openedAnswers = $this->Appreciations->OpenedAnswers->find('list', ['limit' => 200]);
        $this->set(compact('appreciation', 'openedAnswers'));
        $this->set('_serialize', ['appreciation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Appreciation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appreciation = $this->Appreciations->get($id, [
            'contain' => ['OpenedAnswers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appreciation = $this->Appreciations->patchEntity($appreciation, $this->request->getData());
            if ($this->Appreciations->save($appreciation)) {
                $this->Flash->success(__('The appreciation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appreciation could not be saved. Please, try again.'));
        }
        $openedAnswers = $this->Appreciations->OpenedAnswers->find('list', ['limit' => 200]);
        $this->set(compact('appreciation', 'openedAnswers'));
        $this->set('_serialize', ['appreciation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Appreciation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appreciation = $this->Appreciations->get($id);
        if ($this->Appreciations->delete($appreciation)) {
            $this->Flash->success(__('The appreciation has been deleted.'));
        } else {
            $this->Flash->error(__('The appreciation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
