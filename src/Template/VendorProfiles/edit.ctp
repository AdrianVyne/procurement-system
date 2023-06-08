<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $vendorProfile
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vendorProfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vendorProfile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vendor Profiles'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="vendorProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($vendorProfile) ?>
    <fieldset>
        <legend><?= __('Edit Vendor Profile') ?></legend>
        <?php
            echo $this->Form->control('user_id');
            echo $this->Form->control('company_name');
            echo $this->Form->control('contact_person');
            echo $this->Form->control('address');
            echo $this->Form->control('phone_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
