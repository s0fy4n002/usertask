<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">Task Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?= $this->Flash->render() ?>
                
                <table class="table table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>status</th>
                            <th>expired</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($task as $item) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><a href="<?= $this->Url->build('/user/view', ['fullBase' => true])."/".$item->user?->id ?>"><?= $item->user?->name ?></a></td>
                                <td><?= $item->name ?></td>
                                <td><?= $item->description ?></td>
                                <td><?= $item->status == 1 ? 'Aktif' :'non aktif' ?></td>
                                
                                <td><?= strtotime($item->expired->format('Y-m-d')) < strtotime('now') ? $item->expired->format('Y-m-d')."(expired)" :$item->expired->format('Y-m-d')    ?></td>
                                <td>
                                    <button type="button"
                                    <?= strtotime($item->expired->format('Y-m-d')) < strtotime('now') ? "disabled" :'' ?>
                                    onclick="assign(<?= $item->id ?>)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Assign User
                                    </button>
                                    <a href="<?= $this->Url->build('/task/view', ['fullBase' => true])."/".$item->id ?>" class="btn btn-info">View</a>
                                    <a href="<?= $this->Url->build("/task/edit/{$item->id}", ['fullBase' => true]) ?>" class="btn btn-warning">Edit</a>

                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'btn btn-danger']) ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="myform" method="POST">
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                <div class="modal-body">
                    <div class="form-group">
                    <select name="user_id" id="user_id" class="form-control">
                        <?php foreach ($users as $user) { ?>
                            <option value="<?= $user->id ?>"><?= $user->name ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->start('addon-script'); ?>
<script>
    function assign(task_id) {
        const form = document.querySelector("form[name='myform']")
        form.action = "<?= $this->Url->build('/task/add-assign', ['fullBase' => true]) ?>" + '/' + task_id
        
        console.log(form)
    }
</script>
<?php $this->end(); ?>