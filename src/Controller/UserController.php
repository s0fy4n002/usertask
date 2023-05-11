<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Task;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;

/**
 * User Controller
 *
 * @property \App\Model\Table\UserTable $User
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserController extends AppController
{
    
     public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
   
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $user = $this->paginate($this->User);
        $tasks = $this->fetchTable('Tasks')->find('all',['conditions' => [
            'Tasks.user_id IS NULL',
            'Tasks.expired > CURDATE()',
            'Tasks.status = 1'
        ]]);
        $this->set(compact('user','tasks'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->User->find('all')->where(['id' => $id])->contain("Tasks")->first();
        
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $user = $this->User->newEmptyEntity();
        
        if ($this->request->is('post')) {
            $user = $this->User->patchEntity($user, $this->request->getData());
            if ($this->User->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->User->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->User->patchEntity($user, $this->request->getData());
            if ($this->User->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->User->get($id);
        if ($this->User->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        
      
    }

    public function addTask(string $id){
        $task_id = $this->request->getData('task');
        
        $userquery = $this->fetchTable('user')->query();
        $user = $userquery->where(["id" => $id])->first();
        // Debugger::dump($user->status);
        // exit;
        if($user->status != 1){
            $this->Flash->error(__('User tidak aktip'));
            return $this->redirect(['action' => 'index']);
        }

        $taskTable = $this->getTableLocator()->get('Tasks');
        $query = $taskTable->query();
        $query->update()->set(['user_id' => $id])->where(['id' => $task_id])->execute();
        return $this->redirect(['action' => 'index']);
        
    }
}
