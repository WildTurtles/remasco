<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExpectedAnswers Controller
 *
 * @property \App\Model\Table\ExpectedAnswersTable $ExpectedAnswers
 *
 * @method \App\Model\Entity\ExpectedAnswer[] paginate($object = null, array $settings = [])
 */
class ExpectedAnswersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $expectedAnswers = $this->paginate($this->ExpectedAnswers);

        $this->set(compact('expectedAnswers'));
        $this->set('_serialize', ['expectedAnswers']);
    }

    /**
     * View method
     *
     * @param string|null $id Expected Answer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expectedAnswer = $this->ExpectedAnswers->get($id, [
            'contain' => ['OpenedQuestions']
        ]);

        $this->set('expectedAnswer', $expectedAnswer);
        $this->set('_serialize', ['expectedAnswer']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expectedAnswer = $this->ExpectedAnswers->newEntity();
        if ($this->request->is('post')) {
            $expectedAnswer = $this->ExpectedAnswers->patchEntity($expectedAnswer, $this->request->getData());
            if ($this->ExpectedAnswers->save($expectedAnswer)) {
                $this->Flash->success(__('The expected answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expected answer could not be saved. Please, try again.'));
        }
        $this->set(compact('expectedAnswer'));
        $this->set('_serialize', ['expectedAnswer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expected Answer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expectedAnswer = $this->ExpectedAnswers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expectedAnswer = $this->ExpectedAnswers->patchEntity($expectedAnswer, $this->request->getData());
            if ($this->ExpectedAnswers->save($expectedAnswer)) {
                $this->Flash->success(__('The expected answer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expected answer could not be saved. Please, try again.'));
        }
        $this->set(compact('expectedAnswer'));
        $this->set('_serialize', ['expectedAnswer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expected Answer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expectedAnswer = $this->ExpectedAnswers->get($id);
        if ($this->ExpectedAnswers->delete($expectedAnswer)) {
            $this->Flash->success(__('The expected answer has been deleted.'));
        } else {
            $this->Flash->error(__('The expected answer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
