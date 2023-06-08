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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
        </nav>
        <div class="content">
            <?php if (empty($bids)): ?>
                <p>No updates found.</p>
            <?php else: ?>
                <div class="row">
                    <?php foreach ($bids as $bid): ?>
                        <div class="col-md-12 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= h($bid->procurement->title) ?>
                                    </h5>
                                    <p class="card-text">
                                        <?= nl2br(h(mb_strimwidth($bid->procurement->description, 0, 50, '...'))) ?>
                                    </p>
                                    <p class="card-text">Category:
                                        <?= h($bid->procurement->category) ?>
                                    </p>
                                    <p class="card-text">Deadline:
                                        <?= h($bid->procurement->deadline->format('Y-m-d H:i:s')) ?>
                                    </p>
                                    <p class="card-text">Status:
                                        <?= h($bid->status) ?>
                                    </p>
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