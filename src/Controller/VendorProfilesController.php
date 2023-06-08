<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function index()
    {
        $vendorProfiles = $this->paginate($this->VendorProfiles);

        $this->set(compact('vendorProfiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Vendor Profile id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vendorProfile = $this->VendorProfiles->get($id, [
            'contain' => [],
        ]);

        $this->set('vendorProfile', $vendorProfile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vendorProfile = $this->VendorProfiles->newEntity();
        if ($this->request->is('post')) {
            $vendorProfile = $this->VendorProfiles->patchEntity($vendorProfile, $this->request->getData());
            if ($this->VendorProfiles->save($vendorProfile)) {
                $this->Flash->success(__('The vendor profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor profile could not be saved. Please, try again.'));
        }
        $this->set(compact('vendorProfile'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vendor Profile id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vendorProfile = $this->VendorProfiles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vendorProfile = $this->VendorProfiles->patchEntity($vendorProfile, $this->request->getData());
            if ($this->VendorProfiles->save($vendorProfile)) {
                $this->Flash->success(__('The vendor profile has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor profile could not be saved. Please, try again.'));
        }
        $this->set(compact('vendorProfile'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vendor Profile id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vendorProfile = $this->VendorProfiles->get($id);
        if ($this->VendorProfiles->delete($vendorProfile)) {
            $this->Flash->success(__('The vendor profile has been deleted.'));
        } else {
            $this->Flash->error(__('The vendor profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}