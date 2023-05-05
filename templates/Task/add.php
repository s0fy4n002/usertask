<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var \Cake\Collection\CollectionInterface|string[] $user
 */
?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <?= $this->Form->create($task) ?>
            <fieldset>
                <legend><?= __('Add Task') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $user, 'empty' => true,'class' => 'form-control']);
                    echo $this->Form->control('name',['class' => 'form-control']);
                    echo $this->Form->control('description',['class' => 'form-control']);
                    echo $this->Form->control('status',['class' => 'form-control']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
