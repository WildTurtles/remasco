<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tries Controller
 *
 * @property \App\Model\Table\TriesTable $Tries
 *
 * @method \App\Model\Entity\Try[] paginate($object = null, array $settings = [])
 */
class TriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $tries = $this->paginate($this->Tries);

        $this->set(compact('tries'));
        $this->set('_serialize', ['tries']);
    }

    /**
     * View method
     *
     * @param string|null $id Try id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $try = $this->Tries->get($id, [
            'contain' => ['Users', 'AnswersQuestions', 'MultipleChoiceQuestions', 'Questions', 'Paths']
        ]);

        $this->set('try', $try);
        $this->set('_serialize', ['try']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $try = $this->Tries->newEntity();
        if ($this->request->is('post')) {
            $try = $this->Tries->patchEntity($try, $this->request->getData());
            if ($this->Tries->save($try)) {
                $this->Flash->success(__('The try has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The try could not be saved. Please, try again.'));
        }
        $users = $this->Tries->Users->find('list', ['limit' => 200]);
        $answersQuestions = $this->Tries->AnswersQuestions->find('list', ['limit' => 200]);
        $multipleChoiceQuestions = $this->Tries->MultipleChoiceQuestions->find('list', ['limit' => 200]);
        $questions = $this->Tries->Questions->find('list', ['limit' => 200]);
        $paths = $this->Tries->Paths->find('list', ['limit' => 200]);
        $this->set(compact('try', 'users', 'answersQuestions', 'multipleChoiceQuestions', 'questions', 'paths'));
        $this->set('_serialize', ['try']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Try id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $try = $this->Tries->get($id, [
            'contain' => ['AnswersQuestions', 'MultipleChoiceQuestions', 'Questions', 'Paths']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $try = $this->Tries->patchEntity($try, $this->request->getData());
            if ($this->Tries->save($try)) {
                $this->Flash->success(__('The try has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The try could not be saved. Please, try again.'));
        }
        $users = $this->Tries->Users->find('list', ['limit' => 200]);
        $answersQuestions = $this->Tries->AnswersQuestions->find('list', ['limit' => 200]);
        $multipleChoiceQuestions = $this->Tries->MultipleChoiceQuestions->find('list', ['limit' => 200]);
        $questions = $this->Tries->Questions->find('list', ['limit' => 200]);
        $paths = $this->Tries->Paths->find('list', ['limit' => 200]);
        $this->set(compact('try', 'users', 'answersQuestions', 'multipleChoiceQuestions', 'questions', 'paths'));
        $this->set('_serialize', ['try']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Try id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $try = $this->Tries->get($id);
        if ($this->Tries->delete($try)) {
            $this->Flash->success(__('The try has been deleted.'));
        } else {
            $this->Flash->error(__('The try could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
