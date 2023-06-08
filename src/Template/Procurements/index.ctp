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
                <li class="active">
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
                <li>
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
                    <a class="navbar-brand" href="#">Bids Updates</a>
                </div>
        </nav>
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if (empty($latestBids)): ?>
                                <p>There are no bids made.</p>
                            <?php else: ?>
                                <?php foreach ($latestBids as $bid): ?>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?= h($bid->procurement->title) ?>
                                            </h5>
                                            <h6 class="card-subtitle mb-2 text-muted">Deadline:
                                                <?= h($bid->procurement->deadline) ?>
                                            </h6>
                                            <p class="card-text">
                                                <?= $this->Text->truncate(h($bid->procurement->description), 50, ['ellipsis' => '...']) ?>
                                            </p>
                                            <p class="card-text">Category:
                                                <?= h($bid->procurement->category) ?>
                                            </p>
                                            <hr>
                                            <p class="card-text">Bids:</p>
                                            <ul class="list-group list-group-flush">
                                                <?php foreach ($latestBids as $latestBid): ?>
                                                    <li class="list-group-item">
                                                        <?= h($latestBid->user->name) ?> - ₱
                                                        <?= h($latestBid->bid_amount) ?> -
                                                        <a
                                                            href="<?= $this->Url->build(['controller' => 'VendorProfiles', 'action' => 'index', $bid->vendor_id]) ?>">
                                                            View Vendor Profile
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>