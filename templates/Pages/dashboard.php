<!-- Page Content -->
<div class="content container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Blank Page</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Blank Page</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
							<div class="card dash-widget" onclick="navigateTo('<?= $this->Url->build('/task', ['fullBase' => true]) ?>')">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
									<div class="dash-widget-info">
										<h3><?= $countTask ?></h3>
										<span>Tasks</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
							<div class="card dash-widget" onclick="navigateTo('<?= $this->Url->build('/user', ['fullBase' => true]) ?>')">
								<div class="card-body">
									<span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
									<div class="dash-widget-info">
										<h3><?= $countUser ?></h3>
										<span>Users</span>
									</div>
								</div>
							</div>
						</div>
					</div>
</div>


<?php $this->start('addon-style'); ?>
	<style>
        .card:hover{
            cursor: pointer;
        }   
        
    </style>
<?php $this->end(); ?>


<?php $this->start('addon-script'); ?>
<script>
	 function navigateTo(route)
        {
            window.open(route, "_self")
        }
</script>
<?php $this->end(); ?>