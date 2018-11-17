<html>
    <head>
        <title><?=$title?></title>
        <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/pageloader.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/css/googlefonts/googlefonts.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
		<!--Jquery CDN-->
        <script src="<?=base_url()?>assets/js/jquery/jquery-3.3.1.min.js" ></script>
        <script src="<?=base_url()?>assets/js/popper/popper.min.js"></script>
        <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
		<script src="<?=base_url()?>assets/js/sweetalert/sweetalert.min.js"></script>
		<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- <link rel="shortcut icon" href="" type="image/png"> -->
		<!--Chart JS CDN-->
		<script src="<?=base_url()?>assets/js/chartjs/chart.bundle.js"></script>
		<script src="<?=base_url()?>assets/js/chartjs/chart.bundle.min.js"></script>
		<script src="<?=base_url()?>assets/js/chartjs/chart.js"></script>
		<script src="<?=base_url()?>assets/js/chartjs/chart.min.js"></script>
		<style>
			canvas {
				-moz-user-select: none;
				-webkit-user-select: none;
				-ms-user-select: none;
			}
			.feather {
				width: 16px;
				height: 16px;
				vertical-align: text-bottom;
			}

			/*
			* Sidebar
			*/

			.sidebar {
				position: fixed;
				top: 0;
				bottom: 0;
				left: 0;
				z-index: 100; /* Behind the navbar */
				padding: 48px 0 0; /* Height of navbar */
				box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
			}

			.sidebar-sticky {
				position: relative;
				top: 0;
				height: calc(100vh - 48px);
				padding-top: .5rem;
				overflow-x: hidden;
				overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
			}

			@supports ((position: -webkit-sticky) or (position: sticky)) {
			.sidebar-sticky {
				position: -webkit-sticky;
				position: sticky;
			}
			}

			.sidebar .nav-link {
				font-weight: 500;
				color: #333;
			}

			.sidebar .nav-link .feather {
				margin-right: 4px;
				color: #999;
			}

			.sidebar .nav-link.active {
				color: #007bff;
			}

			.sidebar .nav-link:hover .feather,
			.sidebar .nav-link.active .feather {
				color: inherit;
			}

			.sidebar-heading {
				font-size: .75rem;
				text-transform: uppercase;
			}

			/*
			* Content
			*/

			[role="main"] {
				padding-top: 48px; /* Space for fixed navbar */
			}

			/*
			* Navbar
			*/

			.navbar-brand {
				padding-top: .75rem;
				padding-bottom: .75rem;
				font-size: 1rem;
				background-color: rgba(0, 0, 0, .25);
				box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
			}

			.navbar .form-control {
				padding: .75rem 1rem;
				border-width: 0;
				border-radius: 0;
			}

			.form-control-dark {
				color: #fff;
				background-color: rgba(255, 255, 255, .1);
				border-color: rgba(255, 255, 255, .1);
			}

			.form-control-dark:focus {
				border-color: transparent;
				box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
			}
			.navimage{
				width:40px;
				height:40px;
				border-radius: 50%;
				margin-right:5%;
			}
			.navproflinks{
				margin-right: 8%;
			}
			body{
				font-family: 'Noto Serif', serif;
			}
			.profile_content{
				margin-left:5%;
				margin-right:5%;
			}
			.image_landing{
				height: 300px;
				width: 300px;
				border-style: solid;
				border-color: lightgray; 
				border-radius: 50%;
				margin-top:5%;
				margin-bottom:5%;
			}
			.image_educ{
				height: 125px;
				width: 150px;
				border-style: solid;
				border-color: lightgray;
				border-radius: 50%; 
			}
			.profile_container{
				margin-top:2%;
				margin-bottom:2%;
			}
			.profile_below{
				margin-top:1%;
			}
			.image_profile{
				height: 300px;
				width: 300px;
				border-style: solid;
				border-color: lightgray; 
			}
			.profile_modal{
				height: 300px;
				width: 250px;
				border-style: solid;
				border-color: lightgray; 
			}
			.imgup{
				text-align:center;
			}
			.img_cert{
				width:80%;
				height: 300px;
				border-style: solid;
				border-color: lightgray; 
			}.img_receipt{
				width:600px;
				height: 500px;
				border-style: solid;
				border-color: lightgray; 
			}.cntr{
				text-align:center;
			}.navHead{
				font-weight:bold;
				font-size: 15px;
				color: #000000;
			}
		</style>
    </head>
    <body onload="myFunction()" style="margin:0;background-color:lightgray;">
        <div id="loader"></div>
		<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?=base_url()?>">Welcome! Admin </a>
			<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<button class="logout_btn btn btn-secondary">Sign out</button>
				</li>
			</ul>
		</nav>
			<div class="container profile_below">
				<div class="row">
					<nav class="col-md-2 d-none d-md-block bg-light sidebar">
						<div class="sidebar-sticky">
							<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
								<span class="navHead">Home</span>
								<a class="d-flex align-items-center text-muted" href="#">
									<span data-feather="plus-circle"></span>
								</a>
							</h6>
							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link" href="<?=base_url()?>">
										<span class="fa fa-home"></span>
										Dashboard 
									</a>
								</li>
							</ul>
							<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
								<span class="navHead">Account Management</span>
								<a class="d-flex align-items-center text-muted" href="#">
									<span data-feather="plus-circle"></span>
								</a>
							</h6>
							<ul class="nav flex-column mb-2">
								<li class="nav-item">
									<a class="nav-link" href="<?=base_url()?>adminprofile/adminaccounts">
										<span class="fa fa-user-secret"></span>
										Admin Accounts
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?=base_url()?>adminprofile/selleraccounts">
										<span class="fa fa-user"></span>
										Seller Accounts
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?=base_url()?>adminprofile/useraccounts">
										<span class="fa fa-users"></span>
										User Accounts
									</a>
								</li>
							</ul>
							<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
								<span class="navHead">Products</span>
								<a class="d-flex align-items-center text-muted" href="#">
									<span data-feather="plus-circle"></span>
								</a>
							</h6>
							<ul class="nav flex-column mb-2">
								<li class="nav-item">
									<a class="nav-link" href="<?=base_url()?>adminprofile/adminaccounts">
										<span class="fa fa-user-secret"></span>
										Product request
									</a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
			<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutModalCenterTitle" aria-hidden="true" 
				data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="logoutModalCenterTitle">Logout</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="container">
								<div class="row">
									<p>Are you sure do you want to log-out?</p>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<form class="form" method="POST" action="<?=base_url()?>adminprofile/logout/">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
								<button type="success" class="btn btn-secondary" name="sbmt">logout</button>
							</form>
						</div>
					</div>
				</div>
			</div>