<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var string[]|\Cake\Collection\CollectionInterface $user
 */
?>
<div class="col-12 mt-4">

    <div class="card">
        <div class="card-body">
            <?= $this->Form->create($task) ?>
            <fieldset>
                <legend><?= __('Edit Task') ?></legend>
                <?php
                    // echo $this->Form->control('user_id', ['options' => $user, 'empty' => '--pilih--', 'class' => 'form-control']);
                    echo $this->Form->control('name', ['class' => 'form-control']);
                    echo $this->Form->control('description', ['class' => 'form-control']);
                    echo $this->Form->control('status', ['class' => 'form-control']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info  mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
