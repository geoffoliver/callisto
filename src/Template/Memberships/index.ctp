<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Membership'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subscription'), ['controller' => 'Subscriptions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Readers'), ['controller' => 'Readers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reader'), ['controller' => 'Readers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memberships index large-9 medium-8 columns content">
    <h3><?= __('Memberships') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('subscription_id') ?></th>
                <th><?= $this->Paginator->sort('reader_id') ?></th>
                <th><?= $this->Paginator->sort('deleted') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($memberships as $membership): ?>
            <tr>
                <td><?= h($membership->id) ?></td>
                <td><?= $membership->has('subscription') ? $this->Html->link($membership->subscription->name, ['controller' => 'Subscriptions', 'action' => 'view', $membership->subscription->id]) : '' ?></td>
                <td><?= $membership->has('reader') ? $this->Html->link($membership->reader->name, ['controller' => 'Readers', 'action' => 'view', $membership->reader->id]) : '' ?></td>
                <td><?= h($membership->deleted) ?></td>
                <td><?= h($membership->created) ?></td>
                <td><?= h($membership->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $membership->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $membership->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
