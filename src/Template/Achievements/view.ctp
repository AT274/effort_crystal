<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Achievement $achievement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Achievement'), ['action' => 'edit', $achievement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Achievement'), ['action' => 'delete', $achievement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $achievement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Achievements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Achievement'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="achievements view large-9 medium-8 columns content">
    <h3><?= h($achievement->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($achievement->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($achievement->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($achievement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Target') ?></th>
            <td><?= $this->Number->format($achievement->target) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($achievement->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($achievement->modified) ?></td>
        </tr>
    </table>
</div>
