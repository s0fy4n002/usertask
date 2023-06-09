<?php
declare(strict_types=1);
namespace App\Controller;

use App\Model\Table\TasksTable;
use App\Services\TaskService;
use Cake\Error\Debugger;



class TaskController extends AppController
{
    private TasksTable $Task;
    
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('admin');
        $this->Task = new TasksTable();

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        
        $task = $this->getTableLocator()->get('Tasks')->find();
        // dd($task->first()->expired);
        
        $this->paginate = [
            'contain' => ['User'],
        ];
        $task = $this->paginate($task);
        $users = $this->fetchTable('User')->find('all')->where('status = 1');
        $this->set(compact('task','users'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Task->get($id, [
            'contain' => ['User'],
        ]);

        $this->set(compact('task'));
        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $task = $this->Task->newEmptyEntity();
        if ($this->request->is('post')) {
            $task = $this->Task->patchEntity($task, $this->request->getData());
            // Debugger::dump($task);
            // exit();
            if($this->Task->save($task)){
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }

        $user = $this->Task->User->find('list', ['limit' => 200])->all();
    
        $this->set(compact('task', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Task->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Task->patchEntity($task, $this->request->getData());
            
            if ($this->Task->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $user = $this->Task->User->find('list', ['limit' => 200])->all();
        $this->set(compact('task', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Task->get($id);
        if ($this->Task->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function assignUser(string $task_id){
        $user_id = $this->request->getData('user_id');
        $userquery = $this->fetchTable('user')->query();
        $user = $userquery->where(["id" => $this->request->getData('user_id')])->first();
        if($user->status != 1){
            $this->Flash->error(__('User tidak aktip'));
            return $this->redirect(['action' => 'index']);
        }

        $taskTable = $this->getTableLocator()->get('Tasks');
        $query = $taskTable->query();
        $task_aktif = $taskTable->find('all')->where("expired > CURDATE()")->where("id = $task_id");
        if($task_aktif->first() == null){
            $this->Flash->error(__('Task sudah expired'));
            return $this->redirect(['action' => 'index']);
            exit;
        }
        $query->update()->set(['user_id' => $user_id])->where(['id' => $task_id])->execute();
        $this->Flash->success(__('Berhasil assign user'));
        return $this->redirect(['action' => 'index']);
        
    }
}
