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
                <li class="active">
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Bids History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?= $this->Form->create(null, ['type' => 'get']) ?>
                            <?= $this->Form->input('search', ['label' => 'Search Title']) ?>
                            <?= $this->Form->submit('Search') ?>
                            <?= $this->Form->end() ?>
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th>
                                            <?= $this->Paginator->sort('title', 'Title') ?>
                                        </th>
                                        <th>
                                            <?= $this->Paginator->sort('bid_amount', 'Bid Amount') ?>
                                        </th>
                                        <th>
                                            <?= $this->Paginator->sort('status', 'Status') ?>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bids as $bid): ?>
                                        <tr>
                                            <td>
                                                <?= h($bid->procurement->title) ?>
                                            </td>
                                            <td>
                                                <?php if ($bid->editMode): ?>
                                                    <?= $this->Form->create($bid, ['url' => ['action' => 'updateBid', $bid->id]]) ?>
                                                    <?= $this->Form->control('bid_amount', ['value' => $bid->bid_amount, 'class' => 'form-control', 'style' => 'max-width: 150px;']) ?>
                                                    <?= $this->Form->button('Update', ['class' => 'btn btn-primary']) ?>
                                                    <?= $this->Form->end() ?>
                                                <?php else: ?>
                                                    <?= h($bid->bid_amount) ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?= h($bid->status) ?>
                                            </td>
                                            <td>
                                                <div class="my-4">
                                                    <?php if ($bid->editMode): ?>
                                                        <?= $this->Html->link('Cancel', ['action' => 'cancelEdit', $bid->id], ['class' => 'btn btn-secondary']) ?>
                                                    <?php else: ?>
                                                        <?= $this->Html->link('Edit', ['action' => 'editBid', $bid->id], ['class' => 'btn btn-primary']) ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="my-4">
                                                    <?= $this->Html->link('Delete', ['action' => 'deleteBid', $bid->id], ['class' => 'btn btn-danger', 'confirm' => 'Are you sure you want to delete this bid?']) ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?= $this->Paginator->numbers() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>