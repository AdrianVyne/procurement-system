<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $procurements
 */

use Cake\ORM\TableRegistry;

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
                    <a href="<?= $this->Url->build(['controller' => 'Bids', 'action' => 'index']) ?>">
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Bids', 'action' => 'history']) ?>">
                        <p>Bids History</p>
                    </a>
                </li>
                <li>
                    <a href="<?= $this->Url->build(['controller' => 'Bids', 'action' => 'postings']) ?>">
                        <p>Find Procurement Posts</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?= $this->Url->build(['controller' => 'Bids', 'action' => 'profile']) ?>">
                        <p>Vendor Profile</p>
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
                    <div class="card card-user">
                        <div class="card-body">
                            <div class="author mt-5">
                                <h5 class="title display-3 mt-5">
                                    <?= h($user->name); ?>
                                </h5>
                                <p class="description">
                                    <?= h($user->email); ?>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Company Name:</strong>
                                        <?= h($vendorProfile->company_name); ?>
                                    </p>
                                    <p><strong>Contact Person:</strong>
                                        <?= h($vendorProfile->contact_person); ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Address:</strong>
                                        <?= h($vendorProfile->address); ?>
                                    </p>
                                    <p><strong>Phone Number:</strong>
                                        <?= h($vendorProfile->phone_number); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <div class="button-container">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                        <?= $totalBids; ?><br><small>Total Bids</small>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                        <h5>
                                            <?= '₱' . number_format($totalBudget); ?>
                                            <br><small>Total Budget</small>
                                        </h5>
                                    </div>
                                    <div class="col-lg-4 mr-auto">
                                        <h5>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-user">
                        <div class="card-header">
                            <h5 class="card-title">Edit Profile</h5>
                        </div>
                        <div class="card-body">
                            <?= $this->Form->create($user); ?>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Username']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php if ($user->getErrors()): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $this->Form->error('confirm_password', ['wrap' => false]); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <?= $this->Form->control('new_password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'New Password']); ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $vendorProfile = TableRegistry::getTableLocator()->get('VendorProfiles')->find()
                                ->where(['user_id' => $user->id])
                                ->first();
                            ?>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <?= $this->Form->control('vendor_profile.company_name', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Company Name',
                                            'value' => $vendorProfile ? $vendorProfile->company_name : ''
                                        ]); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <?= $this->Form->control('vendor_profile.contact_person', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Contact Person',
                                            'value' => $vendorProfile ? $vendorProfile->contact_person : ''
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <?= $this->Form->control('vendor_profile.address', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Address',
                                            'value' => $vendorProfile ? $vendorProfile->address : ''
                                        ]); ?>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <?= $this->Form->control('vendor_profile.phone_number', [
                                            'class' => 'form-control',
                                            'placeholder' => 'Phone Number',
                                            'value' => $vendorProfile ? $vendorProfile->phone_number : ''
                                        ]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <?= $this->Form->button('Update Profile', ['class' => 'btn btn-primary btn-round']); ?>
                                </div>
                            </div>
                            <?= $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>