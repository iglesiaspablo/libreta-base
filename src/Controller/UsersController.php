<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    
    public function isAuthorized($user)
    {   
        if (isset($user['role']) && $user['role'] === 'alumno')
        {
            if(in_array($this->request->action, ['home','logout', 'libreta', 'user']))
            {
                return true;
            }
        } elseif (!isset($user['role'])) {
           if(in_array($this->request->action, ['registro', 'logout', 'login']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['logout', 'registro']);
    }

    public function login()
    {   
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user && $user['activo']) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } elseif ($user && ($user['activo'] == false)) {
                $this->Flash->error(__('El Usuario aun no está activado.'));   
            } else {
                $this->Flash->error(__('Nombre de usuario o contraseña incorrectos'));
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * Activar method
     *
     * @return \Cake\Http\Response|void
     */
    public function activar($id = null)
    {
        $this->set('titulo', 'Activar Usuarios');

        if ($this->request->is('post') && isset($id)) {
            $usersTable = TableRegistry::get('Users');
            $user = $usersTable->get($id);
            $user->activo = 1;
            if ($usersTable->save($user)) {
                $this->Flash->success(__('El usuario ha sido activado correctamente.'));
            } else {
                $this->Flash->error(__('No se pudo activar el usuario.'));
            }
            return $this->redirect(['action' => 'activar']);
        }

        $this->paginate = ['finder' => 'desactivados'];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        //$this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Libretas']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Registro method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function registro()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());    
            $user->role = "alumno";
            if ($this->Users->save($user)) {
                $this->Flash->success(__('El usuario ha sido registrado correctamente. Está pendiente de activación.'));

                return $this->redirect(['action' => 'registro']);
            }
            $this->Flash->error(__('El usuario no pudo ser registrado. Intente nuevamente'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if (!($this->Auth->user('role') === "admin"))
                $user->role = "alumno";
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
