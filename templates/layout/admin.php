<?php

use Cake\Routing\Asset;
?>
<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>Admin Page</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="template/assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= Asset::url('template/assets/css/bootstrap.min.css') ?>">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?= Asset::url('template/assets/css/font-awesome.min.css') ?>">
		
		<!-- Lineawesome CSS -->
        <link rel="stylesheet" href="<?= Asset::url('template/assets/css/line-awesome.min.css') ?>">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?= Asset::url('template/assets/css/style.css') ?>">
		
		<?php echo $this->fetch('addon-style') ?>
    </head>
    <body>
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
            <?= $this->element('admin/header') ?>   
            <?= $this->element('admin/sidebar') ?>
			
            <div class="page-wrapper" style="min-height: 307px;">
				<?= $this->fetch('content') ?>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="<?= Asset::url('template/assets/js/jquery-3.5.1.min.js') ?>"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="<?= Asset::url('template/assets/js/popper.min.js') ?>"></script>
        <script src="<?= Asset::url('template/assets/js/bootstrap.min.js') ?>"></script>
		
		<!-- Slimscroll JS -->
		<script src="<?= Asset::url('template/assets/js/jquery.slimscroll.min.js') ?>"></script>
		
		<!-- Custom JS -->
		<script src="<?= Asset::url('template/assets/js/app.js') ?>"></script>
		
    
<div class="sidebar-overlay"></div>
<script>
			class Sidebar{
				static get ListPath(){
					let ul = document.querySelector("#sidebar-menu ul")
					let a = Array.from(ul.children).map(li => li.children[0]).filter(a => a.tagName == "A");
					a.forEach(element => {
                        let current = window.location.pathname.split('/')
                        let list = element.pathname.split('/')
                        element.parentElement.classList.remove('active')
						if(current[1] === list[1]){
							let li = element.parentElement
                            
                            if(li.children[1]?.tagName == "UL"){
                                let ul = li.children[1]
                                ul.style.display='block'
                                Array.from(ul.children).forEach(li =>{
                                    let a = li.children[0]
                                    if(a.pathname == window.location.pathname){
                                        li.classList.add('active')
                                    }
                                })
                                // console.log(ul.children)
                                
                                // li.children[1].children.classList.add('active')
                            }else{
                                li.classList.add('active')
                            }
                            
						}
						
					});
					
				}
			}
			Sidebar.ListPath
			
		</script>
<?php echo $this->fetch('addon-script') ?>
</body></html>