<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OpenedQuestions Controller
 *
 * @property \App\Model\Table\OpenedQuestionsTable $OpenedQuestions
 *
 * @method \App\Model\Entity\OpenedQuestion[] paginate($object = null, array $settings = [])
 */
class OpenedQuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ExpectedAnswers']
        ];
        $openedQuestions = $this->paginate($this->OpenedQuestions);

        $this->set(compact('openedQuestions'));
        $this->set('_serialize', ['openedQuestions']);
    }

    /**
     * View method
     *
     * @param string|null $id Opened Question id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $openedQuestion = $this->OpenedQuestions->get($id, [
            'contain' => ['ExpectedAnswers', 'Steps']
        ]);

        $this->set('openedQuestion', $openedQuestion);
        $this->set('_serialize', ['openedQuestion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $openedQuestion = $this->OpenedQuestions->newEntity();
        if ($this->request->is('post')) {
            $openedQuestion = $this->OpenedQuestions->patchEntity($openedQuestion, $this->request->getData());
            if ($this->OpenedQuestions->save($openedQuestion)) {
                $this->Flash->success(__('The opened question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opened question could not be saved. Please, try again.'));
        }
        $expectedAnswers = $this->OpenedQuestions->ExpectedAnswers->find('list', ['limit' => 200]);
        $steps = $this->OpenedQuestions->Steps->find('list', ['limit' => 200]);
        $this->set(compact('openedQuestion', 'expectedAnswers', 'steps'));
        $this->set('_serialize', ['openedQuestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opened Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $openedQuestion = $this->OpenedQuestions->get($id, [
            'contain' => ['Steps']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $openedQuestion = $this->OpenedQuestions->patchEntity($openedQuestion, $this->request->getData());
            if ($this->OpenedQuestions->save($openedQuestion)) {
                $this->Flash->success(__('The opened question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opened question could not be saved. Please, try again.'));
        }
        $expectedAnswers = $this->OpenedQuestions->ExpectedAnswers->find('list', ['limit' => 200]);
        $steps = $this->OpenedQuestions->Steps->find('list', ['limit' => 200]);
        $this->set(compact('openedQuestion', 'expectedAnswers', 'steps'));
        $this->set('_serialize', ['openedQuestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opened Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $openedQuestion = $this->OpenedQuestions->get($id);
        if ($this->OpenedQuestions->delete($openedQuestion)) {
            $this->Flash->success(__('The opened question has been deleted.'));
        } else {
            $this->Flash->error(__('The opened question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
