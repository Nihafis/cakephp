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
            <?= $this->Html->link(__('List Examples'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="examples form content">
            <?= $this->Form->create($example) ?>
            <fieldset>
                <legend><?= __('Add Example') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('detail');
                    echo $this->Form->control('price');
                    echo $this->Form->control('stock');
                    echo $this->Form->control('status');
                    echo $this->Form->control('create_date');
                    echo $this->Form->control('topic_type');
                    echo $this->Form->control('update_time', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
