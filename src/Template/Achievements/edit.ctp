<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Achievement $achievement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $achievement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $achievement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Achievements'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="achievements form large-9 medium-8 columns content">
    <?= $this->Form->create($achievement) ?>
    <fieldset>
        <legend><?= __('Edit Achievement') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('target');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
