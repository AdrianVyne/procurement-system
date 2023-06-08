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
                <li>
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
                    <a class="navbar-brand" href="#">Procurement Listings</a>
                </div>
        </nav>
        <div class="content">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['controller' => 'Bids', 'action' => 'postings'], 'class' => 'mb-3']) ?>
            <div class="input-group">
                <div class="pt-3 px-3">
                    <?= $this->Form->control('search', ['label' => false, 'class' => '', 'placeholder' => 'Enter search term']) ?>
                </div>
                <div class="input-group-append">
                    <?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>

            <?php if ($procurements->isEmpty()): ?>
                <p>No listings found.</p>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($procurements as $procurement): ?>
                        <div class="col-md-12 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= h($procurement->title) ?>
                                    </h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Posted by:
                                        <?= h($procurement->user->name) ?>
                                    </h6>
                                    <p class="card-text">
                                        <?= nl2br(h($procurement->description)) ?>
                                    </p>
                                    <p class="card-text">Category:
                                        <?= h($procurement->category) ?>
                                    </p>
                                    <div>
                                        <hr>
                                        <?php if ($procurement->hasBid): ?>
                                            <p class="text-danger">An existing bid already exists.</p>
                                        <?php else: ?>
                                            <div class="bid-form">
                                                <p>Place a Bid</p>
                                                <?= $this->Form->create(null, ['url' => ['controller' => 'Bids', 'action' => 'add']]) ?>
                                                <?= $this->Form->hidden('listing_id', ['value' => $procurement->id]) ?>
                                                <div class="form-group">
                                                    <?= $this->Form->label('Bid Amount') ?>
                                                    <?= $this->Form->text('bid_amount', ['class' => 'form-control', 'style' => 'max-width: 150px;']) ?>
                                                </div>
                                                <?= $this->Form->button('Place Bid', ['class' => 'btn btn-primary']) ?>
                                                <?= $this->Form->end() ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>