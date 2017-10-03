<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Chapters Controller
 *
 * @property \App\Model\Table\ChaptersTable $Chapters
 *
 * @method \App\Model\Entity\Chapter[] paginate($object = null, array $settings = [])
 */
class ChaptersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $chapters = $this->paginate($this->Chapters);

        $this->set(compact('chapters'));
        $this->set('_serialize', ['chapters']);
    }

    /**
     * View method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chapter = $this->Chapters->get($id, [
            'contain' => ['Paths.Steps.Links','Paths.Steps', 'Topics']
        ]);
        $this->set('chapter', $chapter);
        $this->set('_serialize', ['chapter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chapter = $this->Chapters->newEntity();
        if ($this->request->is('post')) {
            $chapter = $this->Chapters->patchEntity($chapter, $this->request->getData());
						if ($this->Chapters->save($chapter)) {
                $this->Flash->success(__('The chapter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
        }
        $paths = $this->Chapters->Paths->find('list', ['limit' => 200]);
        $topics = $this->Chapters->Topics->find('list', ['limit' => 200]);
        $this->set(compact('chapter', 'paths', 'topics'));
        $this->set('_serialize', ['chapter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chapter = $this->Chapters->get($id, [
            'contain' => ['Paths', 'Topics', 'Paths.Steps']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $chapter = $this->Chapters->patchEntity($chapter, $this->request->getData());
            if ($this->Chapters->save($chapter)) {
                $this->Flash->success(__('The chapter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
        }
        $paths = $this->Chapters->Paths->find('list', ['limit' => 200]);
        $topics = $this->Chapters->Topics->find('list', ['limit' => 200]);
        $this->set(compact('chapter', 'paths', 'topics'));
        $this->set('_serialize', ['chapter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chapter = $this->Chapters->get($id);
        if ($this->Chapters->delete($chapter)) {
            $this->Flash->success(__('The chapter has been deleted.'));
        } else {
            $this->Flash->error(__('The chapter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addFrom($topicId = null)
    {
        $chapter = $this->Chapters->newEntity();
        if ($this->request->is('post')) {
						$this->loadModel('Topics');
						$topic = $this->Topics->get($topicId);
            $chapter = $this->Chapters->patchEntity($chapter, $this->request->getData());
						$chapter->topics = [$topic];

/*            $users = TableRegistry::get('Users');
            $user = $users->get($this->Auth->user('id'));
            $this->Chapters->Users->link($chapter, [$user]);
*/
            if ($this->Chapters->save($chapter)) {
                $this->Flash->success(__('The chapter has been saved.'));

                return $this->redirect(['controller' => 'Topics','action' => 'view', $topicId ]);
            }
            $this->Flash->error(__('The chapter could not be saved. Please, try again.'));
        }
//        $paths = $this->Chapters->Paths->find('list', ['limit' => 200]);
//        $topics = $this->Chapters->Topics->find('list', ['limit' => 200]);
//        $this->set(compact('chapter', 'paths', 'topics'));
        $this->set(compact('chapter'));
        $this->set('_serialize', ['chapter']);
    }


    /**
     * View method
     *
     * @param string|null $id Chapter id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewUsers($id = null)
    {
        $userId = $this->Auth->user('id');
	    $chapter = $this->Chapters->get($id, [
            'contain' => ['Paths', 'Paths.Steps','Paths.Steps.links', 'Paths.Users',]
        ]);

       /*$chapter =  $this->Chapters->get($id,[
                                    'contain' => ['Paths']
                                    ]);*/
                                           /*->contain([
                                                'Paths.Steps' => ['sort' => ['Steps.number' => 'ASC'] ],
                                                'Paths.Steps.Links'
                                            ])
                                            ->matching('Paths.Users',
                                                function ($q) use ($userId) {
                                                    return $q->where(['Users.id' => $userId]);
                                            });*/

            //debug($chapter);

        //$chaptersId = array();
        foreach($chapter->paths as $path)
        {
            //debug($path);
            $chaptersId[] = $path->id;
        }

//        $paths = $chapter->Paths->find('all')
        if(!empty($chaptersId)){
        $paths = $this->Chapters->Paths->find('all')
                        ->where(['Paths.id IN' => $chaptersId])
						->contain(['Steps' => ['sort' => ['Steps.number' => 'ASC'] ],
                                  'Steps.Links',
                                  'Chapters'])
						->matching('Users',
                            function ($q) use ($userId) {
                                return $q->where(['Users.id' => $userId]);
                            });
       }
    /*    $paths->matching('Chapters',
                           function ($q) use ($id) {
                                return $q->where(['Chapters.id' => $id]);
                            });*/

//exit();
        $linksStepsUsers = TableRegistry::get('LinksStepsUsers');
        $linkslocks = $linksStepsUsers->find()->where(['user_id' => $userId]);

        $lockLk = array();
//        debug($linkslocks);
        foreach($linkslocks as $lk)
        {
            $lockLk[] = $lk;
//            debug($lk);
        }
//        debug($lockLk); exit;
        $this->set('linkslocks',$lockLk);
        $this->set(compact('chapter','topics','paths'));
        $this->set('_serialize', ['chapter']);
        $this->set('_serialize', ['$linkslocks']);
	}
}
