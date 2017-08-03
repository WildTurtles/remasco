<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MultipleChoiceQuestions Controller
 *
 * @property \App\Model\Table\MultipleChoiceQuestionsTable $MultipleChoiceQuestions
 *
 * @method \App\Model\Entity\MultipleChoiceQuestion[] paginate($object = null, array $settings = [])
 */
class MultipleChoiceQuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $multipleChoiceQuestions = $this->paginate($this->MultipleChoiceQuestions);

        $this->set(compact('multipleChoiceQuestions'));
        $this->set('_serialize', ['multipleChoiceQuestions']);
    }

    /**
     * View method
     *
     * @param string|null $id Multiple Choice Question id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $multipleChoiceQuestion = $this->MultipleChoiceQuestions->get($id, [
            'contain' => ['Questions', 'Steps', 'Tries']
        ]);

        $this->set('multipleChoiceQuestion', $multipleChoiceQuestion);
        $this->set('_serialize', ['multipleChoiceQuestion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $multipleChoiceQuestion = $this->MultipleChoiceQuestions->newEntity();
        if ($this->request->is('post')) {
            $multipleChoiceQuestion = $this->MultipleChoiceQuestions->patchEntity($multipleChoiceQuestion, $this->request->getData());
            if ($this->MultipleChoiceQuestions->save($multipleChoiceQuestion)) {
                $this->Flash->success(__('The multiple choice question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple choice question could not be saved. Please, try again.'));
        }
        $questions = $this->MultipleChoiceQuestions->Questions->find('list', ['limit' => 200]);
        $steps = $this->MultipleChoiceQuestions->Steps->find('list', ['limit' => 200]);
        $tries = $this->MultipleChoiceQuestions->Tries->find('list', ['limit' => 200]);
        $this->set(compact('multipleChoiceQuestion', 'questions', 'steps', 'tries'));
        $this->set('_serialize', ['multipleChoiceQuestion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Multiple Choice Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $multipleChoiceQuestion = $this->MultipleChoiceQuestions->get($id, [
            'contain' => ['Questions', 'Steps', 'Tries']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $multipleChoiceQuestion = $this->MultipleChoiceQuestions->patchEntity($multipleChoiceQuestion, $this->request->getData());
            if ($this->MultipleChoiceQuestions->save($multipleChoiceQuestion)) {
                $this->Flash->success(__('The multiple choice question has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The multiple choice question could not be saved. Please, try again.'));
        }
        $questions = $this->MultipleChoiceQuestions->Questions->find('list', ['limit' => 200]);
        $steps = $this->MultipleChoiceQuestions->Steps->find('list', ['limit' => 200]);
        $tries = $this->MultipleChoiceQuestions->Tries->find('list', ['limit' => 200]);
        $this->set(compact('multipleChoiceQuestion', 'questions', 'steps', 'tries'));
        $this->set('_serialize', ['multipleChoiceQuestion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Multiple Choice Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $multipleChoiceQuestion = $this->MultipleChoiceQuestions->get($id);
        if ($this->MultipleChoiceQuestions->delete($multipleChoiceQuestion)) {
            $this->Flash->success(__('The multiple choice question has been deleted.'));
        } else {
            $this->Flash->error(__('The multiple choice question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
