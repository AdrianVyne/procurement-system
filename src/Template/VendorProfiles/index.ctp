<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $vendorProfiles
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vendor Profile'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vendorProfiles index large-9 medium-8 columns content">
    <h3><?= __('Vendor Profiles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_person') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone_number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendorProfiles as $vendorProfile): ?>
            <tr>
                <td><?= $this->Number->format($vendorProfile->id) ?></td>
                <td><?= $this->Number->format($vendorProfile->user_id) ?></td>
                <td><?= h($vendorProfile->company_name) ?></td>
                <td><?= h($vendorProfile->contact_person) ?></td>
                <td><?= h($vendorProfile->phone_number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vendorProfile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vendorProfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vendorProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendorProfile->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
