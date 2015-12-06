<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Publisher'), ['action' => 'edit', $publisher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Publisher'), ['action' => 'delete', $publisher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publisher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Publishers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publisher'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="publishers view large-9 medium-8 columns content">
    <h3><?= h($publisher->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($publisher->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($publisher->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($publisher->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($publisher->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($publisher->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($publisher->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sites') ?></h4>
        <?php if (!empty($publisher->sites)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Domain') ?></th>
                <th><?= __('Publisher Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($publisher->sites as $sites): ?>
            <tr>
                <td><?= h($sites->id) ?></td>
                <td><?= h($sites->name) ?></td>
                <td><?= h($sites->domain) ?></td>
                <td><?= h($sites->publisher_id) ?></td>
                <td><?= h($sites->created) ?></td>
                <td><?= h($sites->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sites', 'action' => 'view', $sites->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sites', 'action' => 'edit', $sites->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sites', 'action' => 'delete', $sites->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sites->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
