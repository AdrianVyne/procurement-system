<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $vendorProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vendor Profile'), ['action' => 'edit', $vendorProfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vendor Profile'), ['action' => 'delete', $vendorProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorProfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vendor Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor Profile'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vendorProfiles view large-9 medium-8 columns content">
    <h3><?= h($vendorProfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Company Name') ?></th>
            <td><?= h($vendorProfile->company_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Person') ?></th>
            <td><?= h($vendorProfile->contact_person) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone Number') ?></th>
            <td><?= h($vendorProfile->phone_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vendorProfile->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($vendorProfile->user_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($vendorProfile->address)); ?>
    </div>
</div>
