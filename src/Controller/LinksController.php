<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Links Controller
 *
 * @property \App\Model\Table\LinksTable $Links
 *
 * @method \App\Model\Entity\Link[] paginate($object = null, array $settings = [])
 */
class LinksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $links = $this->paginate($this->Links);

        $this->set(compact('links'));
        $this->set('_serialize', ['links']);
    }

    /**
     * View method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $link = $this->Links->get($id, [
            'contain' => ['Steps', 'Users']
        ]);

        $this->set('link', $link);
        $this->set('_serialize', ['link']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $link = $this->Links->newEntity();
        if ($this->request->is('post')) {
            $link = $this->Links->patchEntity($link, $this->request->getData());
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The link could not be saved. Please, try again.'));
        }
        $steps = $this->Links->Steps->find('list', ['limit' => 200]);
        $users = $this->Links->Users->find('list', ['limit' => 200]);
        $this->set(compact('link', 'steps', 'users'));
        $this->set('_serialize', ['link']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $link = $this->Links->get($id, [
            'contain' => ['Steps', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $link = $this->Links->patchEntity($link, $this->request->getData());
            if ($this->Links->save($link)) {
                $this->Flash->success(__('The link has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The link could not be saved. Please, try again.'));
        }
        $steps = $this->Links->Steps->find('list', ['limit' => 200]);
        $users = $this->Links->Users->find('list', ['limit' => 200]);
        $this->set(compact('link', 'steps', 'users'));
        $this->set('_serialize', ['link']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Link id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $link = $this->Links->get($id);
        if ($this->Links->delete($link)) {
            $this->Flash->success(__('The link has been deleted.'));
        } else {
            $this->Flash->error(__('The link could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
