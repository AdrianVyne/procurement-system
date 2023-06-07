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
                <li class="active">
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
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
        </nav>
        <div class="content">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Procurement</h5>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($procurement, ['url' => ['controller' => 'Procurements', 'action' => 'historyEdit', $procurement->id]]) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->label('title', 'Title') ?>
                                <?= $this->Form->text('title', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->label('category', 'Category') ?>
                                <?= $this->Form->text('category', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->label('deadline', 'Deadline') ?>
                                <?= $this->Form->date('deadline', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?= $this->Form->label('budget', 'Budget') ?>
                                <?= $this->Form->text('budget', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <?= $this->Form->label('description', 'Description') ?>
                                <?= $this->Form->textarea('description', ['class' => 'form-control']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <?= $this->Form->button('Update Procurement', ['class' => 'btn btn-primary btn-round']) ?>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>