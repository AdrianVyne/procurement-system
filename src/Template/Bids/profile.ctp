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
                                    <?php echo h($user->name); ?>
                                </h5>
                                <p class="description">
                                    <?php echo h($user->email); ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <div class="button-container">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                        <h5>
                                            <?php echo $totalProcurements; ?><br><small>Total Posts</small>
                                        </h5>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                        <h5>
                                            <?php echo $totalBids; ?><br><small>Total Bids</small>
                                        </h5>
                                    </div>
                                    <div class="col-lg-4 mr-auto">
                                        <h5>
                                            <?php echo '₱' . number_format($totalBudget); ?>
                                            <br><small>Total Budget</small>
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
                            <?php echo $this->Form->create($user); ?>
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Username']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Email']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php if ($user->getErrors()): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->Form->error('confirm_password', ['wrap' => false]); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <?php echo $this->Form->control('new_password', ['type' => 'password', 'class' => 'form-control', 'placeholder' => 'New Password']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <?php echo $this->Form->button('Update Profile', ['class' => 'btn btn-primary btn-round']); ?>
                                </div>
                            </div>
                            <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>