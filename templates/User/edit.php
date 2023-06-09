<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                     echo $this->Form->control('name',['class'=>'form-control']);
                     echo $this->Form->control('email', ['class'=>'form-control']);
                     echo $this->Form->control('phone', ['class'=>'form-control']);
                     echo $this->Form->control('address', ['class'=>'form-control']);
                     echo $this->Form->radio('status',  [
                        ['value' => '1', 'text' => 'aktif', 'label' => ['style' => 'margin-right:10px']],
                        ['value' => '0', 'text' => 'non aktif'],
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-info mt-2']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
