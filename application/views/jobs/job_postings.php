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
<body class="hold-transition skin-blue sidebar-mini">
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <?php  foreach($jobs as $job) { ?>
          <div class="col-lg-3" id="job">
            <div class="box box-widget">
             <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $job['job_id']; ?>">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <?php echo $job['job_title']; ?>
                </h4>
              </div>
              <div class="box-body">
                <img src="<?=base_url(); echo $job['image']?>" alt='no image' onError=this.onerror=null;this.src='<?=base_url()?>public/dist/img/no-image.jpg' class='img-responsive' style="width: 100%"  />
              </div>
            </a> 
            <div class="box-footer box-comments">
              <div class="box-comment">
                <span class="username">
                  Job Description
                  <input type="button" id="<?php echo $job['job_id']; ?>" class="btn btn-primary btn-sm pull-right apply" value="Apply">
                </span>
                <?php echo $job['jd']; ?> 
                <br />
                <i>Read More...</i>
                <div class="box-group" id="accordion">
                  <div id="<?php echo $job['job_id']; ?>" class="panel-collapse collapse out">
                    <div class="box-body">
                      <?php echo $job['job_description']; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </section>
  </div>
</div>
<!-- ./wrapper -->

<!-- Apply Modal -->
<div class="modal fade" id="apply" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title caps">
          <strong>Apply for <span id="job_title"></span></strong>
          <input type="text" id="job_id" />
        </h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="<?= site_url('#')?>">
          <div class="form-horizontal">
            <div class="form-group row">
              <label for="normal-field" class="col-lg-4 form-control-label" style="text-align: right"><span id="essay"></span></label>
              <div class="col-lg-7">
               <!--  <textarea class="form-control" name="jobDesc" required="required" rows="5"></textarea> -->
               <textarea class="textarea" name="jobDesc" style="min-width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             </div>
           </div> 
         </div>         
       </div>
       <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-danger btn-rounded" style="float: left" >Cancel</button>
        <input type="submit" value="Apply" class="btn btn-success btn-rounded" style="float: right" />  
      </div>
    </form>
  </div>
</div>
</div>

<!-- jQuery 3 -->
<script src="<?=base_url()?>public/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>public//bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?=base_url()?>public/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>public/dist/js/demo.js"></script>
<script type="text/javascript">
  $('.row').masonry({
    itemSelector : '.col-lg-3'
  });
</script>

<script>
  $('#job').on( 'click', '.apply', function () {
    var job_id = $(this).attr("id");
    $.ajax({
      url: "<?php echo site_url('applicant/jobs/getJobDetails') ?>",
      method:"POST",
      data:{job_id:job_id},
      dataType:"json", 
      success:function(data) {
        $("#job_id").val(data[0].job_id); 
        $("#job_title").text(data[0].job_title); 
        $("#essay").text(data[1].question + " " + data[0].job_title); 
        $('#apply').modal('show');
      }
    })
  });

  $('#app_exams tbody').on( 'click', '.view-exam', function () {
    var app_id = $(this).attr("id");
    window.location = "<?= base_url()?>hr/app_exams/appans/" + app_id;
  });
</script>

</html>
