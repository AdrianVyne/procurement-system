<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Exception\UnauthorizedException;
use Cake\ORM\Query;
use Cake\Utility\Text;
use Cake\Datasource\ResultSetInterface;
use Cake\Event\EventInterface;
use App\Model\Table\VendorProfilesTable;
use Cake\Controller\Component\PaginatorComponent;




/**
 * Bids Controller
 *
 *
 * @method \App\Model\Entity\Bid[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BidsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadModel('Procurements');
    }
    public function index()
    {
        $loggedInUserId = $this->Auth->user('id');
        $this->paginate = [
            'limit' => 10,
            'order' => ['Bids.id' => 'DESC'],
            'contain' => ['Procurements'],
            'conditions' => ['Bids.vendor_id' => $loggedInUserId]
        ];
        $bids = $this->paginate($this->Bids)->toArray();
        $this->set('bids', $bids);
    }
    public function history()
    {
        $this->paginate = [
            'limit' => 10,
            'order' => ['Bids.created' => 'DESC'],
        ];
        $query = $this->Bids->find()
            ->contain(['Procurements'])
            ->where(['Bids.vendor_id' => $this->Auth->user('id')]);

        $search = $this->getRequest()->getQuery('search');
        if (!empty($search)) {
            $query->matching('Procurements', function ($q) use ($search) {
                return $q->where(['Procurements.title LIKE' => "%{$search}%"]);
            });
        }
        $bids = $this->paginate($query);
        $this->set(compact('bids', 'search'));
    }
    public function postings()
    {
        $this->loadModel('Bids');
        $userId = $this->Auth->user('id');
        $this->paginate = [
            'limit' => 10,
            'order' => ['Procurements.id' => 'DESC'],
        ];
        $query = $this->Procurements->find()
            ->contain(['Users']);
        $search = $this->getRequest()->getQuery('search');
        if (!empty($search)) {
            $query->where([
                'OR' => [
                    'Procurements.title LIKE' => "%{$search}%",
                    'Procurements.description LIKE' => "%{$search}%",
                    'Procurements.category LIKE' => "%{$search}%",
                    'Users.name LIKE' => "%{$search}%",
                ]
            ]);
        }
        $procurements = $this->paginate($query);
        $bidsTable = TableRegistry::getTableLocator()->get('Bids');
        foreach ($procurements as $procurement) {
            $hasBid = $bidsTable->exists(['listing_id' => $procurement->id, 'vendor_id' => $userId]);
            $procurement->hasBid = $hasBid;
        }
        $this->set(compact('procurements', 'search'));
    }
    public function profile()
    {
        $loggedInUserID = $this->Auth->user('id');
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $bidsTable = TableRegistry::getTableLocator()->get('Bids');
        $procurementsTable = TableRegistry::getTableLocator()->get('Procurements');
        $vendorProfilesTable = TableRegistry::getTableLocator()->get('VendorProfiles');
        $vendorProfile = $vendorProfilesTable->find()
            ->where(['user_id' => $loggedInUserID])
            ->first();

        $user = $usersTable->get($loggedInUserID);
        $totalBids = $bidsTable->find()->where(['vendor_id' => $loggedInUserID])->count();
        $totalProcurements = $procurementsTable->find()->where(['organization_id' => $loggedInUserID])->count();
        $totalBudget = $procurementsTable->find()
            ->where(['organization_id' => $loggedInUserID])
            ->select(['totalBudget' => 'SUM(budget)'])
            ->first()
            ->totalBudget;
        if ($this->request->is(['post', 'put'])) {
            $user = $usersTable->patchEntity($user, $this->request->getData());
            if ($usersTable->save($user)) {
                $this->Flash->success('Profile updated successfully.');
                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error('Unable to update profile. Please try again.');
            }
        }
        $this->set(compact('user', 'totalBids', 'totalProcurements', 'totalBudget', 'vendorProfile'));
    }
    public function add() //add bid
    {
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $bid = $this->Bids->newEntity();
            $bid->listing_id = $data['listing_id'];
            $bid->bid_amount = $data['bid_amount'];
            $loggedInUserId = $this->Auth->user('id');
            $vendorId = $usersTable->find()
                ->select(['id'])
                ->where(['id' => $loggedInUserId])
                ->first()
                ->id;
            $bid->vendor_id = $vendorId;
            if ($this->Bids->save($bid)) {
                $this->Flash->success('Bid placed successfully.');
                return $this->redirect(['controller' => 'Bids', 'action' => 'postings']);
            } else {
                $this->Flash->error('Failed to place bid. Please try again.');
            }
        }
        return $this->redirect(['controller' => 'Bids', 'action' => 'postings']);
    }
}