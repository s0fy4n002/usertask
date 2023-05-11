<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h1>Detail <?php $user->name ?></h1>
            <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <th><?= $user->name ?></th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <th><?= $user->email ?></th>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>:</td>
                        <th><?= $user->phone ?></th>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>:</td>
                        <th><?= $user->phone ?></th>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <th><?= $user->status == 1 ? 'active':'deactive' ?></th>
                    </tr>
                </table>

                <div class="card">
                    <div class="card-body">
                        <h3>Task : </h3>
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
                          
                                <?php foreach($user->tasks as $task){ ?>
                                    <tr>
                                        <td><?= $task->id ?></td>
                                        <td><?= $task->name ?></td>
                                        <td><?= $task->description ?></td>
                                        <td><?= $task->status == 1 ? 'Active':'Non Aktif' ?></td>
                                     
                                        <td><?= $task->expired ?></td>
                                    </tr>
                                <?php } ?>

                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>