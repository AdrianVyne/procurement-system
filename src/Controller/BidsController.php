<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bids Controller
 *
 *
 * @method \App\Model\Entity\Bid[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BidsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $bids = $this->paginate($this->Bids);

        $this->set(compact('bids'));
    }

    public function history()
    {

    }

    public function postings()
    {

    }

    public function profile()
    {

    }
}