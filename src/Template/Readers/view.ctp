<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Reader'), ['action' => 'edit', $reader->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Reader'), ['action' => 'delete', $reader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reader->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Readers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reader'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="readers view large-9 medium-8 columns content">
    <h3><?= h($reader->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($reader->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($reader->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($reader->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($reader->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($reader->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($reader->modified) ?></td>
        </tr>
    </table>
</div>
