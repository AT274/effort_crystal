<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Goals Controller
 *
 * @property \App\Model\Table\GoalsTable $Goals
 *
 * @method \App\Model\Entity\Goal[] paginate($object = null, array $settings = [])
 */
 use Cake\ORM\TableRegistry;
class GoalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $query = $this->Goals->find()->order(['id'=>"asc"]);
        $goals = $this->paginate($query);

        $this->set(compact('goals'));
        $this->set('_serialize', ['goals']);
    }

    /**
     * View method
     *
     * @param string|null $id Goal id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $goal = $this->Goals->get($id, [
            'contain' => []
        ]);

        $this->set('goal', $goal);
        $this->set('_serialize', ['goal']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $goal = $this->Goals->newEntity();
        if ($this->request->is('post')) {
            $goal = $this->Goals->patchEntity($goal, $this->request->getData());
            if ($this->Goals->save($goal)) {
                $this->Flash->success(__('The goal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The goal could not be saved. Please, try again.'));
        }
        $this->set(compact('goal'));
        $this->set('_serialize', ['goal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Goal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $goal = $this->Goals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $goal = $this->Goals->patchEntity($goal, $this->request->getData());
            if ($this->Goals->save($goal)) {
                $this->Flash->success(__('The goal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The goal could not be saved. Please, try again.'));
        }
        $this->set(compact('goal'));
        $this->set('_serialize', ['goal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Goal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
        $goal = $this->Goals->get($id);
        if ($this->Goals->delete($goal)) {
            echo json_encode(["status"=>"true"]);
        } else {
            echo json_encode(["status"=>"false"]);
        }

        // return $this->redirect(['action' => 'index']);
    }

    public function addOne($id = null)
    {
        $this->autoRender = false;
        $goal = $this->Goals->get($id);
        $added = $goal->progress+1;
        $target = $goal->target;
        if ($added>=$target){
          $achieve = TableRegistry::get('achievements') -> newEntity();
          $achieve = TableRegistry::get('achievements') -> newEntity([
            'title' => $goal->target,
            'description' => $goal->description,
            'target'=> $goal->target
          ]);
          TableRegistry::get('achievements') -> save($achieve);
          header('Content-type: application/json');
          echo json_encode(["progress"=>"achieve"]);
        }else{
          $goal = $this->Goals->patchEntity($goal, ["progress"=>$added]);
          $this->Goals->save($goal);
          echo json_encode(["progress"=>$added]);
        }
    }
}
