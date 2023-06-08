<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Model\Table\VendorProfilesTable;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Posts']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if ($user['roles'] == 'vendor') {
                    return $this->redirect(['controller' => 'Bids', 'action' => 'index']);
                } elseif ($user['roles'] == 'user') {
                    return $this->redirect(['controller' => 'Procurements', 'action' => 'index']);
                }
            }
            $this->Flash->error('Incorrect Login');
        }
    }
    public function logout()
    {
        $this->Flash->success('You are logged out');
        return $this->redirect($this->Auth->logout());
    }
    public function register()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $userId = $user->id;
                if ($this->request->getData('roles') === 'vendor') {
                    $vendorProfilesTable = TableRegistry::getTableLocator()->get('VendorProfiles');
                    $vendorProfile = $vendorProfilesTable->newEntity();
                    $vendorProfile->user_id = $userId;
                    if ($vendorProfilesTable->save($vendorProfile)) {
                        $this->Flash->success('You are registered as a vendor and can login');
                        return $this->redirect(['action' => 'login']);
                    } else {
                        $this->Flash->error('Failed to create vendor profile');
                    }
                } else {
                    $this->Flash->success('You are registered and can login');
                    return $this->redirect(['action' => 'login']);
                }
            } else {
                $this->Flash->error('You are not registered');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['register']);
    }
}