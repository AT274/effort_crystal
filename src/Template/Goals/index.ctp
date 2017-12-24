<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Goal[]|\Cake\Collection\CollectionInterface $goals
 */
?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="css/jquery.yycountdown.css">
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.yycountdown.min.js"></script>
</head>
<script>
  obj = {};
</script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Goal'), ['action' => 'add']) ?></li>
        <li><a href="/myapp/achievements">Achievements</a></li>
    </ul>
</nav>
<div class="goals index large-9 medium-8 columns content">
    <h3><?= __('Goals') ?></h3>

    <?=$this->Html->script("raphael-2.1.4.min")?>
    <?=$this->Html->script("justgage")?>

    <div class="row">
    <?php foreach ($goals as $goal): ?>
      <div class="col-md-4 delete-target-<?= $goal->id ?>">
        <div class="row">
          <div class="col-md-2 add" id="add<?=$goal->id?>" data-triangle="<?= $goal->id ?>" style="text-align:center">
            <img src = "img/addButton.png" width="500px" height="500px"/>
            <div id="description<?=$goal->id?>" class="box" data-tooltip="<?=$goal->description?>">
              <img src = "img/reader.png" width="500px" height="500px"/>
              <script>
                $(function(){
                  $('#description<?=$goal->id?>').darkTooltip({
                  });
                });
              </script>
            </div>

            <div id="delete<?=$goal->id?>" class="box" data-tooltip="delete?">
              <img src = "img/bathu.png" width="500px" height="500px"/>
              <script>
                $(function(){
                  $('#delete<?=$goal->id?>').darkTooltip({
                    confirm:true,
                    trigger:"click",
                    onYes : function(){
                      $.ajax('http://192.168.33.10/myapp/goals/delete/<?=$goal->id?>', {
                          type: 'post'
                        })
                        .done(function(data) {
                          data = JSON.parse(data);
                          deletable = data.status;
                          console.log("deletable:" + deletable);
                          if (deletable == "true") {
                            $('.delete-target-<?=$goal->id?>').hide();
                          } else {
                            console.log("done消去に失敗しました");
                          }
                        })
                        .fail(function() {
                          console.log("消去に失敗しました");
                        });
                    }
                  });
                });
              </script>
            </div>
          </div>
          <div id="gauge<?=$goal->id?>" class="col-md-10 box" style="text-align:center">
            <span class="progress-<?=$goal->id?>" style="display: none"><?=$goal->progress?></span>
            <script>
                g<?=$goal->id?> = new JustGage({
                id: "gauge<?=$goal->id?>",
                value: <?=$goal->progress?>,
                min: 0,
                max: <?=$goal->target?>,
                title: "<?=$goal->title?>",
                label:"achieved",
                relativeGaugeSize:true,
                counter:true,
              });

              obj[<?=$goal->id?>] =   g<?=$goal->id?>;
            </script>
              <div id="slidevalue<?=$goal->id?>"></div>
              <div id="slider<?=$goal->id?>"></div>
            <div id="countdown<?=$goal->id?>" class="timer">
              <script>
                var element<?=$goal->id?> = document.getElementById("slider<?=$goal->id?>");
                $(function(){
                  noUiSlider.create(element<?=$goal->id?>, {
                  	start: [1],
                    step:1,
                    connect: [true,false],
                  	range: {
                  		'min': [0],
                  		'max': [<?= $goal->target?>],
                  	}
                  });
                  var slidevalue<?=$goal->id?> = document.getElementById('slidevalue<?=$goal->id?>');
                  element<?=$goal->id?>.noUiSlider.on('update', function( values, handle ) {
                              $('#slidevalue<?=$goal->id?>').text(parseInt(values[handle]))
                });
                })


              </script>
              <script>
                $('#countdown<?=$goal->id?>').yycountdown({
                  endDateTime   : '<?=$goal->due_date?>',  //カウントダウン終了日時
                  complete      : function(_this){  //カウントダウン完了時のコールバック
                    $.ajax('http://192.168.33.10/myapp/goals/delete/<?=$goal->id?>', {
                        type: 'post'
                      })
                      .done(function(data) {
                        data = JSON.parse(data);
                        deletable = data.status;
                        console.log("deletable:" + deletable);
                        if (deletable == "true") {
                          $('.delete-target-<?=$goal->id?>').hide();
                        } else {
                          console.log("done消去に失敗しました");
                        }
                      })
                      .fail(function() {
                        console.log("消去に失敗しました");
                      });
                  }
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>

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
<?= $this->Html->script("addOne") ?>
<?= $this->Html->script("deleteGoal") ?>
<?= $this->Html->script("jquery.darktooltip") ?>
<?= $this->Html->css('darktooltip') ?>
<?= $this->Html->script("justgage")?>
<?= $this->Html->script('nouislider') ?>
<?= $this->Html->css('nouislider') ?>
