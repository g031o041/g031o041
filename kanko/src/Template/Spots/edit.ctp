<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Spot $spot
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $spot->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $spot->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Spots'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="spots form large-9 medium-8 columns content">
    <?= $this->Form->create($spot) ?>
    <fieldset>
        <legend><?= __('Edit Spot') ?></legend>
        <?php
            echo $this->Form->control('spot_name');
            echo $this->Form->control('spot_description');
            echo $this->Form->control('spot_address');
            echo $this->Form->control('start_date', ['empty' => true]);
            echo $this->Form->control('end_date', ['empty' => true]);
            echo $this->Form->control('routes._ids', ['options' => $routes]);
            echo $this->Form->control('tags._ids', ['options' => $tags]);
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
