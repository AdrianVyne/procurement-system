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
                <li class="active">
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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
        </nav>
        <div class="content">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Procurement History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?= $this->Form->create(null, ['type' => 'get']) ?>
                            <?= $this->Form->input('search', ['label' => 'Search Title']) ?>
                            <?= $this->Form->submit('Search') ?>
                            <?= $this->Form->end() ?>
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            <?= $this->Paginator->sort('title', 'Title') ?>
                                        </th>
                                        <th>
                                            <?= $this->Paginator->sort('description', 'Description') ?>
                                        </th>
                                        <th>
                                            <?= $this->Paginator->sort('category', 'Category') ?>
                                        </th>
                                        <th>
                                            <?= $this->Paginator->sort('deadline', 'Deadline') ?>
                                        </th>
                                        <th>
                                            <?= $this->Paginator->sort('budget', 'Budget') ?>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($procurements as $procurement): ?>
                                        <tr>
                                            <td>
                                                <?= h($procurement->title) ?>
                                            </td>
                                            <td>
                                                <?= nl2br(h($procurement->description)) ?>
                                            </td>
                                            <td>
                                                <?= h($procurement->category) ?>
                                            </td>
                                            <td>
                                                <?= h($procurement->deadline) ?>
                                            </td>
                                            <td>
                                                <?= h($procurement->budget) ?>
                                            </td>
                                            <td>
                                                <div class="my-4">
                                                    <?= $this->Html->link('Edit', ['action' => 'historyEdit', $procurement->id]) ?>
                                                </div>
                                                <div class="my-4">
                                                    <?= $this->Html->link('View Bids', ['action' => 'viewBids', $procurement->id]) ?>
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