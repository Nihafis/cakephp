<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Catergory $catergory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Catergory'), ['action' => 'edit', $catergory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Catergory'), ['action' => 'delete', $catergory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catergory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Catergories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Catergory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="catergories view content">
            <h3><?= h($catergory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($catergory->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($catergory->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
