<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h1>Detail task <?php echo $task->name ?></h1>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <th><?= $task->name ?></th>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>:</td>
                        <th><?= $task->description ?></th>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <th><?= $task->status == 1 ? 'Selesai':'Belum Selesai' ?></th>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>:</td>
                        <th><?= $task->created ?></th>
                    </tr>
                </table>

                <div class="card">
                    <div class="card-body">
                        <div class="h4">User: </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($task->user)) {  ?>
                                    <tr>
                                        <td><?= $task->user?->id ?></td>
                                        <td><?= $task->user?->name ?></td>
                                        <td><?= $task->user?->address ?></td>
                                        <td><?= $task->user?->status == 1 ? 'Active':'Deactive' ?></td>
                                        <td><?= $task->user?->created ?></td>
                                    </tr>
                                <?php }else{  ?>
                                    <tr>
                                        <td class="text-center" colspan="5">Tidak ada user</td>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>