<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Online Recruitment</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url()?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>public/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url()?>public/bower_components/Ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=base_url()?>public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>public/dist/css/AdminLTE.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="<?=base_url()?>public/plugins/iCheck/all.css">
	
	<link rel="stylesheet" href="<?=base_url()?>public/dist/css/custom.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?=base_url()?>public/dist/css/skins/_all-skins.css">
  	<!-- Mathjax -->
  	<script src='<?=base_url()?>public/plugins/MathJax-master/MathJax.js?config=TeX-AMS-MML_HTMLorMML'></script>
  	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue">
	<div class="wrapper">
		<header class="main-header">
			<!-- <img class="img-thumbnail qnxlogo" src="../../dist/img/qnxlogo.jpg" /> -->
			<a href="#" class="qnxlogo">
				<span class="logo-mini"><b>QNX</b></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Questronix</b></span>
			</a>
		</header>
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li>
						<a href="#">
							<i class="fa fa-briefcase"></i> <span>Careers</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fa fa-book"></i> <span>Online Examination</span>
						</a>
					</li>
					<li>
						<a href="<?= site_url('home/logout')?>">
							<i class="fa fa-sign-out"></i> <span>Logout</span>
						</a>
					</li>
				</ul>
			</section>
		</aside>
