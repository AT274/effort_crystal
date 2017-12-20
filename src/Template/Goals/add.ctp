<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Goal $goal
 */
?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<?= $this->Html->css('jquery.datetimepicker') ?>
<?= $this->Html->script("jquery.datetimepicker.full.min") ?>
<script>

  $(function(){
    $('#datetimepicker').datetimepicker({
      format: 'Y-m-d H:i',
      minDate:'-1970/01/01',
      step:5,
      inline : true,
    });
  });
</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Goals'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="goals form large-9 medium-8 columns content">
    <?= $this->Form->create($goal) ?>
    <fieldset>
        <legend><?= __('Add Goal') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('target');
            echo $this->Form->control('progress');
            echo $this->Form->control('description');
            echo $this->Form->hidden('due_date', ['id' => 'datetimepicker']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
