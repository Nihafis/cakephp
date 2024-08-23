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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $catergory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $catergory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Catergories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="catergories form content">
            <?= $this->Form->create($catergory) ?>
            <fieldset>
                <legend><?= __('Edit Catergory') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
