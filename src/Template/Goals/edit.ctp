<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Goal $goal
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $goal->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $goal->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Goals'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="goals form large-9 medium-8 columns content">
    <?= $this->Form->create($goal) ?>
    <fieldset>
        <legend><?= __('Edit Goal') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('target');
            echo $this->Form->control('description');
            echo $this->Form->control('progress');
            echo $this->Form->control('due_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
