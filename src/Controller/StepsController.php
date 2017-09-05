<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Steps Controller
 *
 * @property \App\Model\Table\StepsTable $Steps
 *
 * @method \App\Model\Entity\Step[] paginate($object = null, array $settings = [])
 */
class StepsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Paths']
        ];
        $steps = $this->paginate($this->Steps);

        $this->set(compact('steps'));
        $this->set('_serialize', ['steps']);
    }

    /**
     * View method
     *
     * @param string|null $id Step id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $step = $this->Steps->get($id, [
            'contain' => ['Paths', 'Links', 'MultipleChoiceQuestions', 'OpenedQuestions']
        ]);

        $this->set('step', $step);
        $this->set('_serialize', ['step']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $step = $this->Steps->newEntity();
        if ($this->request->is('post')) {
            $step = $this->Steps->patchEntity($step, $this->request->getData());
            if ($this->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The step could not be saved. Please, try again.'));
        }
        $paths = $this->Steps->Paths->find('list', ['limit' => 200]);
        $links = $this->Steps->Links->find('list', ['limit' => 200]);
        $multipleChoiceQuestions = $this->Steps->MultipleChoiceQuestions->find('list', ['limit' => 200]);
        $openedQuestions = $this->Steps->OpenedQuestions->find('list', ['limit' => 200]);
        $this->set(compact('step', 'paths', 'links', 'multipleChoiceQuestions', 'openedQuestions'));
        $this->set('_serialize', ['step']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Step id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $step = $this->Steps->get($id, [
            'contain' => ['Links', 'MultipleChoiceQuestions', 'OpenedQuestions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $step = $this->Steps->patchEntity($step, $this->request->getData());
            if ($this->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The step could not be saved. Please, try again.'));
        }
        $paths = $this->Steps->Paths->find('list', ['limit' => 200]);
        $links = $this->Steps->Links->find('list', ['limit' => 200]);
        $multipleChoiceQuestions = $this->Steps->MultipleChoiceQuestions->find('list', ['limit' => 200]);
        $openedQuestions = $this->Steps->OpenedQuestions->find('list', ['limit' => 200]);
        $this->set(compact('step', 'paths', 'links', 'multipleChoiceQuestions', 'openedQuestions'));
        $this->set('_serialize', ['step']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Step id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $step = $this->Steps->get($id);
        if ($this->Steps->delete($step)) {
            $this->Flash->success(__('The step has been deleted.'));
        } else {
            $this->Flash->error(__('The step could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * AddFrom method
     * @param string|null $id Path id.
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addFrom($pathId = null)
    {
        $step = $this->Steps->newEntity();

        if ($this->request->is('post')) {


            $step = $this->Steps->patchEntity($step, $this->request->getData());

						//set the path
						$this->loadModel('Paths');
  	   	 		//$path = $this->Paths->get($pathId);

						//set the number
						$query = $this->Steps->find()
												->order(['number' => 'DESC']);
						$query->matching('Paths', function ($q) use ($pathId) {
    						return $q->where(['Paths.id' => $pathId ])->order(['number' => 'DESC']);
						});


						$laststep = $query->first();


						//$step->paths = [$path];
						$step->number = $laststep->get('number') + 1;
						$step->path_id = $pathId;
						//debug($step);
						//debug($laststep);
						//debug($path);
						//exit();

						if ($this->Steps->save($step)) {
                $this->Flash->success(__('The step has been saved.'));

                return $this->redirect(['controller' => 'Paths', 'action' => 'view', $pathId]);
            }
            $this->Flash->error(__('The step could not be saved. Please, try again.'));
        }
//      $paths = $this->Steps->Paths->find('list', ['limit' => 200]);
        $links = $this->Steps->Links->find('list', ['limit' => 200]);
        $multipleChoiceQuestions = $this->Steps->MultipleChoiceQuestions->find('list', ['limit' => 200]);
        $openedQuestions = $this->Steps->OpenedQuestions->find('list', ['limit' => 200]);
//        $this->set(compact('step', 'paths', 'links', 'multipleChoiceQuestions', 'openedQuestions'));
        $this->set(compact('step', 'links', 'multipleChoiceQuestions', 'openedQuestions'));
        $this->set('_serialize', ['step']);
    }

}
