<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Example $example
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Example'), ['action' => 'edit', $example->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Example'), ['action' => 'delete', $example->id], ['confirm' => __('Are you sure you want to delete # {0}?', $example->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Examples'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Example'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="examples view content">
            <h3><?= h($example->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($example->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Topic Type') ?></th>
                    <td><?= h($example->topic_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($example->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($example->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $this->Number->format($example->stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($example->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Create Date') ?></th>
                    <td><?= h($example->create_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Update Time') ?></th>
                    <td><?= h($example->update_time) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Detail') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($example->detail)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
