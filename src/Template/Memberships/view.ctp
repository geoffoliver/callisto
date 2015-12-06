<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Membership'), ['action' => 'edit', $membership->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Membership'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Memberships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subscription'), ['controller' => 'Subscriptions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Readers'), ['controller' => 'Readers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reader'), ['controller' => 'Readers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="memberships view large-9 medium-8 columns content">
    <h3><?= h($membership->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($membership->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Subscription') ?></th>
            <td><?= $membership->has('subscription') ? $this->Html->link($membership->subscription->name, ['controller' => 'Subscriptions', 'action' => 'view', $membership->subscription->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Reader') ?></th>
            <td><?= $membership->has('reader') ? $this->Html->link($membership->reader->name, ['controller' => 'Readers', 'action' => 'view', $membership->reader->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Deleted') ?></th>
            <td><?= h($membership->deleted) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($membership->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($membership->modified) ?></td>
        </tr>
    </table>
</div>
