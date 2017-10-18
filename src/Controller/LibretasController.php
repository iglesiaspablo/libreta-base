<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Libretas Controller
 *
 * @property \App\Model\Table\LibretasTable $Libretas
 *
 * @method \App\Model\Entity\Libreta[] paginate($object = null, array $settings = [])
 */
class LibretasController extends AppController
{


    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Carreras', 'Users']
        ];
        $libretas = $this->paginate($this->Libretas);

        $this->set(compact('libretas'));
        $this->set('_serialize', ['libretas']);
    }
   
    /**
     * View method
     *
     * @param string|null $id Libreta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $libreta = $this->Libretas->get($id, [
            'contain' => ['Carreras', 'Users']
        ]);

        $this->set('libreta', $libreta);
        $this->set('_serialize', ['libreta']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $libreta = $this->Libretas->newEntity();
        if ($this->request->is('post')) {
            $libreta = $this->Libretas->patchEntity($libreta, $this->request->getData());
            if (!($this->Auth->user('role') === "admin"))
                $libreta->user_id = $this->Auth->user("id");
            if ($this->Libretas->save($libreta)) {
                $this->Flash->success(__('The libreta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libreta could not be saved. Please, try again.'));
        }
        $carreras = $this->Libretas->Carreras->find('list', ['limit' => 200]);
        $users = $this->Libretas->Users->find('list', ['limit' => 200]);
        $this->set(compact('libreta', 'carreras', 'users'));
        $this->set('_serialize', ['libreta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Libreta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $libreta = $this->Libretas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $libreta = $this->Libretas->patchEntity($libreta, $this->request->getData());
            if ($this->Libretas->save($libreta)) {
                $this->Flash->success(__('The libreta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The libreta could not be saved. Please, try again.'));
        }
        $carreras = $this->Libretas->Carreras->find('list', ['limit' => 200]);
        $users = $this->Libretas->Users->find('list', ['limit' => 200]);
        $this->set(compact('libreta', 'carreras', 'users'));
        $this->set('_serialize', ['libreta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Libreta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $libreta = $this->Libretas->get($id);
        if ($this->Libretas->delete($libreta)) {
            $this->Flash->success(__('The libreta has been deleted.'));
        } else {
            $this->Flash->error(__('The libreta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
