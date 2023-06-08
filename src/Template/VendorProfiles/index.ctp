<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $procurements
 */
?>
<div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="">
                </div>
            </a>
            <a href="" class="simple-text logo-normal">
                User Name
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Procurements', 'action' => 'index']) ?>">
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Procurements', 'action' => 'post']) ?>">
                        <p>Procurement Post</p>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Procurements', 'action' => 'history']) ?>">
                        <p>Procurement History</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?= $this->Url->build(['controller' => 'Procurements', 'action' => 'profile']) ?>">
                        <p>Organization Profile</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper ">
                    <div class="navbar-toggler">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
        </nav>
        <div class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-user text-center">
                        <div class="card-body">
                            <div class="author mt-5">
                                <h5 class="title display-3 mt-5">
                                    <?= h($vendorProfile->user->name) ?>
                                </h5>
                                <p class="description">
                                    <?= h($vendorProfile->user->email) ?>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Company Name:</strong>
                                        <?= h($vendorProfile->company_name) ?>
                                    </p>
                                    <p><strong>Contact Person:</strong>
                                        <?= h($vendorProfile->contact_person) ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Address:</strong>
                                        <?= h($vendorProfile->address) ?>
                                    </p>
                                    <p><strong>Phone Number:</strong>
                                        <?= h($vendorProfile->phone_number) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>