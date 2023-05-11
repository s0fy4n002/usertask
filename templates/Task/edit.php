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
                    echo $this->Form->control('user_id', ['options' => $user, 'empty' => 'kosongkan', 'class' => 'form-control']);
                    echo $this->Form->control('name', ['class' => 'form-control']);
                    echo $this->Form->control('description', ['class' => 'form-control']);
                    echo $this->Form->radio('status',  [
                        ['value' => '1', 'text' => 'aktif', 'label' => ['style' => 'margin-right:10px']],
                        ['value' => '0', 'text' => 'non aktif'],
                    ]);
                    echo $this->Form->control("expired", ['type' =>'date', 'class' => 'form-control', 'label' => 'Expired']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info  mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
