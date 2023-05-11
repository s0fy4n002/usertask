<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var \Cake\Collection\CollectionInterface|string[] $user
 */
?>

<div class="d-flex justify-content-center">
<div class="col-6 my-2">
    <div class="card">
        <div class="card-body">
            
            <!-- <form action="<?= $this->Url->build('/task/add', ['fullBase' => true]) ?>" method="post">
            <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                    <?php 
                        if ($this->Form->isFieldError('Task.name')) {
                            echo $this->Form->error('name');
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                    <?php 
                        if ($this->Form->isFieldError('description')) {
                            echo $this->Form->error('description');
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="status" class="mr-2">Status</label> :
                        <label for="status" class="mr-2"><input type="radio" name="status" id="status" value="1">Aktif</label>
                        <label for="status"><input type="radio" name="status" id="status" value="0">Tidak Aktif</label>
                        <?php 
                        if ($this->Form->isFieldError('status')) {
                            echo $this->Form->error('status');
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label class="form-check-label" for="expired" class="mr-2">Expired</label>
                    <input type="date" name="expired" id="expired" class="form-control">

                    <?php 
                        if ($this->Form->isFieldError('Task.expired')) {
                            echo 'expired error';
                        }
                    ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-info">Simpan</button>
                </div>
            </form> -->


            <?= $this->Form->create($task) ?>
            <fieldset>
                <legend><?= __('Add Task') ?></legend>
                <?php
                    // echo $this->Form->control('user_id', ['options' => $user, 'empty' => true,'class' => 'form-control']);
                    echo $this->Form->control('name', ['class' => 'form-control']);
                    echo $this->Form->control('description',['class' => 'form-control']);
                    echo $this->Form->radio('status',  [
                        ['value' => '1', 'text' => 'aktif', 'label' => ['style' => 'margin-right:10px']],
                        ['value' => '0', 'text' => 'non aktif'],
                    ]);
                    echo $this->Form->control("expired", ['type' =>'date', 'class' => 'form-control', 'label' => 'Expired']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Simpan'),['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>
