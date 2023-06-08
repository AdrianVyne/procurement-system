<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * VendorProfiles Controller
 *
 *
 * @method \App\Model\Entity\VendorProfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorProfilesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($userId)
    {
        try {
            $vendorProfilesTable = TableRegistry::getTableLocator()->get('VendorProfiles');
            $bidsTable = TableRegistry::getTableLocator()->get('Bids');
            $procurementsTable = TableRegistry::getTableLocator()->get('Procurements');
            $usersTable = TableRegistry::getTableLocator()->get('Users');
            $vendorProfile = $vendorProfilesTable->find()
                ->where(['user_id' => $userId])
                ->contain(['Users'])
                ->firstOrFail();
            $latestBids = $bidsTable->find()
                ->where(['vendor_id' => $vendorProfile->id])
                ->contain(['Procurements.Users']);
            $totalBids = $bidsTable->find()
                ->where(['vendor_id' => $vendorProfile->id])
                ->count();
            $this->set(compact('vendorProfile', 'latestBids', 'totalBids'));
        } catch (RecordNotFoundException $exception) {
            $this->Flash->error('Vendor profile not found.');
            return $this->redirect(['action' => 'index']);
        }
        // debug($latestBids);
    }

}