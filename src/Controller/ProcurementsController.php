<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Exception\UnauthorizedException;
use App\Model\Entity\VendorProfile;
use Cake\I18n\Time;
use DateTime;

/**
 * Procurements Controller
 *
 *
 * @method \App\Model\Entity\Procurement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProcurementsController extends AppController
{
    public function index()
    {
        $userId = $this->Auth->user('id');
        $procurementsTable = TableRegistry::getTableLocator()->get('Procurements');
        $procurementIds = $procurementsTable->find()
            ->select(['id'])
            ->where(['organization_id' => $userId])
            ->toArray();
        $procurementIds = array_column($procurementIds, 'id');
        $bidsTable = TableRegistry::getTableLocator()->get('Bids');
        $latestBids = $bidsTable->find()
            ->contain([
                'Procurements',
                'Procurements.Bids' => function ($q) use ($procurementIds) {
                    return $q->where(['Bids.listing_id IN' => $procurementIds]);
                },
                'Users' => function ($q) {
                    return $q->select(['id', 'name']);
                }
            ])
            ->orderDesc('Bids.id')
            ->limit(10)
            ->toArray();
        $this->set('latestBids', $latestBids);
    }
    public function post()
    {
        if ($this->request->is('post') && !empty($this->request->getData())) {
            $requestData = $this->request->getData();

            $deadline = new DateTime($requestData['deadline']['year'] . '-' . $requestData['deadline']['month'] . '-' . $requestData['deadline']['day']);
            $requestData['deadline'] = $deadline->format('Y-m-d');

            $procurement = $this->Procurements->newEntity($requestData);
            $procurement->organization_id = $this->Auth->user('id');

            if ($this->Procurements->save($procurement)) {
                $this->Flash->success('Procurement added successfully.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('Failed to add procurement. Please check the form for errors.');
                $errors = $procurement->getErrors();
                debug($errors); // Print validation errors to debug
            }
        }
        $this->set(compact('procurement'));
    }
    public function history()
    {
        $this->paginate = [
            'limit' => 10,
            'order' => ['deadline' => 'ASC'],
        ];
        $query = $this->Procurements->find()->where(['organization_id' => $this->Auth->user('id')]);
        $search = $this->request->getQuery('search');
        if ($search) {
            $query->where(['title LIKE' => "%$search%"]);
        }
        $procurements = $this->paginate($query);
        $this->set(compact('procurements', 'search'));
    }
    public function historyEdit($id)
    {
        $procurement = $this->Procurements->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $procurement = $this->Procurements->patchEntity($procurement, $this->request->getData());
            if ($this->Procurements->save($procurement)) {
                $this->Flash->success('Procurement has been updated successfully.');
                return $this->redirect(['action' => 'history']);
            } else {
                $this->Flash->error('Unable to update procurement. Please, try again.');
            }
        }
        $this->set(compact('procurement'));
    }
    public function profile()
    {
        $loggedInUserID = $this->Auth->user('id');
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $bidsTable = TableRegistry::getTableLocator()->get('Bids');
        $procurementsTable = TableRegistry::getTableLocator()->get('Procurements');
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
        $this->set(compact('user', 'totalBids', 'totalProcurements', 'totalBudget'));
    }
    public function viewBids()
    {

    }
}