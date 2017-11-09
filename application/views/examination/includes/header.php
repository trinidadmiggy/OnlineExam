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
  <link rel="stylesheet" href="<?=base_url()?>public/plugins/animate.css">
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/skins/_all-skins.css">
  <script src='<?=base_url()?>public/plugins/MathJax-master/MathJax.js?config=TeX-AMS-MML_HTMLorMML'></script>
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/sourcesans.css">
</head>
<body class="hold-transition skin-black fixed sidebar-mini sidebar-collapse">
 <div class="wrapper">
  <header class="main-header">
   <a class="logo">
    <span class="logo-mini"><b>Q</b>NX</span>
    <span class="logo-lg"><small>Q U E S T R O N I X</small> </span>
  </a>
  <nav class="navbar navbar-custom-menuatic-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    </a>
    <div class="navbar-custom-menu">
     <ul class="nav navbar-nav">
      <li class="dropdown user user-menu" style="visibility: hidden;">
        <div class="showtime navbox" >
          <span class="info-box-number" id="timer" ></span>
        </div>
      </li>
      <li class="dropdown user user-menu">
        <div class="hidden-xs navbox">
          Hi!<?php echo $fname." ".$lname;  ?>
        </div>
      </li>
      <li class="dropdown user user-menu">
       <a href="<?= site_url('home/logout')?>" title="logout">
        <i class="fa fa-sign-out" ></i>
      </a>
    </li>
  </ul>
</div>
</nav>
</header>
<aside class="main-sidebar">
 <section class="sidebar">
  <ul class="sidebar-menu" data-widget="tree">
   <li>
    <a href="<?=base_url()?>applicant/examination/">
     <i class="fa fa-pencil-square-o"></i> <span>Examination</span>
   </a>
 </li>
 <li>
  <a href="<?=base_url()?>applicant/jobs/">
   <i class="fa fa-briefcase"></i> <span>Careers</span>
 </a>
</li>
</ul>
</section>
</aside>
