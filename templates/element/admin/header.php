<?php

use Cake\Routing\Asset;
?>
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="index.html" class="logo">
            <img src="<?= Asset::url('template/assets/img/logo.png') ?>" width="40" height="40" alt="">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <h3>Admin Page</h3>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

   

</div>