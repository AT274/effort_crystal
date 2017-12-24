<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Achievement[]|\Cake\Collection\CollectionInterface $achievements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><a href="/myapp/goals">Goals</a></li>
    </ul>
</nav>
<div class="achievements index large-9 medium-8 columns content">
    <h3><?= __('Achievements') ?></h3>
    <?=$this->Html->script("raphael-2.1.4.min")?>
    <?=$this->Html->script("justgage")?>

    <div class="row">
      <?php foreach ($achievements as $achievement):?>
        <div class="col-md-4 delete-target-achievement-<?=$achievement->id?>">
          <div class="col-md-2">
            <div class="row">
              <div id="description<?=$achievement->id?>" class="box" data-tooltip="<?=$achievement->description?>">
                <img src = "img/reader.png" width="200px" height="200px"/>
                <script>
                  $(function(){
                    $('#description<?=$achievement->id?>').darkTooltip({
                    });
                  });
                </script>
              </div>
              <div id="delete<?=$achievement->id?>" class="box" data-tooltip="delete?">
                <img src = "img/bathu.png" width="200px" height="200px"/>
              </div>
            </div>
          </div>
          <div id="gauge<?=$achievement->id?>" class="col-md-10" style="text-align:center">
            <script>
                g<?=$achievement->id?> = new JustGage({
                id: "gauge<?=$achievement->id?>",
                value: <?=$achievement->target?>,
                min: 0,
                max: <?=$achievement->target?>,
                title: "<?=$achievement->title?>",
                label:"achieved",
                relativeGaugeSize:true,
                counter:true,
              });
            </script>
          </div>
        </div>
      <?php endforeach?>
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

<?= $this->Html->script("deleteAchievement") ?>
<?= $this->Html->script("jquery.darktooltip") ?>
<?= $this->Html->css('darktooltip') ?>
