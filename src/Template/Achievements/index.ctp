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

        <div class="row">
        <?php foreach ($achievements as $achievement): ?>
          <div class="col-md-3 delete-target-achievement-<?= $achievement->id ?>" style="background-color: violet">

            <div class="row">
              <div class="col-md-2 delete_achievement" data-x="<?= $achievement->id ?>">✖</div>
              <div class="col-md-8" style="text-align:center"><?php echo h($achievement -> target) ?></div>
              <div class="col-md-2" data-triangle="<?= $achievement->id ?>">◎</div>
            </div>

            <div class="row">
              <div class="col-md-8 col-md-offset-2" style="text-align:center"><?php echo h($achievement -> title) ?></div>
              <div class "col-md-2"></div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
        <?php /*
        <tbody>
            <?php foreach ($achievements as $achievement): ?>
            <tr>
                <td><?= $this->Number->format($achievement->id) ?></td>
                <td><?= h($achievement->title) ?></td>
                <td><?= $this->Number->format($achievement->target) ?></td>
                <td><?= h($achievement->description) ?></td>
                <td><?= h($achievement->created) ?></td>
                <td><?= h($achievement->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $achievement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $achievement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $achievement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $achievement->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    */?>
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
