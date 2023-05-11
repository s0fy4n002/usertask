<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">User Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?= $this->Flash->render() ?>
                <table class="table table-nowrap mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>status</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($user as $item) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $item->name ?></td>
                                <td><?= $item->email ?></td>
                                <td><?= $item->phone ?></td>
                                <td><?= $item->status == 1 ?'aktif':'non aktif' ?></td>
                                
                                <td>
                                    <button type="button" onclick="assignTask(<?= $item->id ?>, <?= $item->status ?>)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Assign Task
                                    </button>
                                    <a href="<?= $this->Url->build(['_name' => 'user.view', 'id' => $item->id]); ?>" class="btn btn-info">View</a>
                                    <a href="<?= $this->Url->build("/user/edit/{$item->id}", ['fullBase' => true]) ?>" class="btn btn-warning">Edit</a>

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
                <h5 class="modal-title" id="exampleModalLabel">Assign Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="myform" method="POST" >
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                <div class="modal-body">
                    <div class="form-group">
                    <select name="task" id="task" class="form-control">
                        <?php foreach ($tasks as $task) { ?>
                            <option value="<?= $task->id ?>"><?= $task->name ?></option>
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
    function assignTask(id, status) {
        const form = document.querySelector("form[name='myform']")
        form.action = "<?= $this->Url->build('/user/add-task', ['fullBase' => true]) ?>" + '/' + id
        
        if(status != 1){
            alert('status anda tidak akatif')
            form.childNodes[3].childNodes[3].childNodes[1].disabled = true
            form.childNodes[3].childNodes[1].childNodes[1].disabled=true
            return
        }else{
            form.childNodes[3].childNodes[3].childNodes[1].disabled = false
            form.childNodes[3].childNodes[1].childNodes[1].disabled = false
        }
        
        
    }
</script>
<?php $this->end(); ?>