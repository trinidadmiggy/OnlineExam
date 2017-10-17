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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<style type="text/css">
.parallax-window {
  min-height: 400px;
  background: transparent;
}
.parallax-mirror {
  z-index:1 !important;
}
</style>
</head>
<body class="hold-transition skin-black sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="../index2.html" class="logo">
        <span class="logo-mini"><b>Q</b>NX</span>
        <span class="logo-lg"><b>Questronix</b> </span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        </a>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="#" class="img-circle" alt="#">
          </div>
          <div class="pull-left info">
          </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Examination</li>
          <li>
            <a href="<?=base_url()?>applicant/examination/">
              <i class="fa fa-th"></i> <span>Examination</span>
            </a>
          </li>
          <li class="header">Careers</li>
          <li>
            <a href="<?=base_url()?>applicant/jobs/">
              <i class="fa fa-th"></i> <span>Careers</span>
            </a>
          </li>
          <li class="header">Logout</li>
          <li>
            <a href="<?= site_url('home/logout')?>">
              <i class="fa fa-sign-out"></i> <span>Logout</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <section class="content">
        <div class="parallax-window" data-parallax="scroll" data-image-src="<?=base_url()?>public/dist/img/multo.jpg" data-natural-width="1400" data-natural-height="350">
          <div id="subheader">
            <div id="sub_content">
              <h1>24 results in your zone</h1>
              <div><i class="icon_pin"></i> 135 Newtownards Road, Belfast, BT4 1AB</div>
            </div><!-- End sub_content -->
          </div><!-- End subheader -->
        </div>
        <div class="row">
          <div id="job">
            <div class="col-lg-12">
              <?php  foreach($jobs as $job) { ?>
              <div class="col-lg-6">
                <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                  <div class="row">
                    <div class="col-md-9 col-sm-9">
                      <div class="desc">
                        <div class="thumb_strip">
                         <img src="<?=base_url(); echo $job['image']?>" alt="" onError="this.onerror=null;this.src='<?=base_url()?>public/dist/img/no-image.jpg'" >
                       </div>
                       <h3><?php echo $job['job_title']; ?></h3>
                       <div class="type">
                        <?php echo $job['jd']; ?> 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <div class="go_to">
                      <div>
                       <input type="button" id="<?php echo $job['job_id']; ?>" class="btn btn-primary btn-sm pull-right apply" value="Read More...">
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <?php } ?>
         </div>
       </div>
     </div>
   </section>
 </div>
 <!-- Apply Modal -->
 <div class="modal fade" id="apply" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title caps">
          <strong><span id="job_title"></span></strong>
        </h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= site_url('applicant/jobs/answerEssay')?>">
          <div class="form-horizontal">
            <div class="form-group">
              <div class="col-lg-12">
                <h4 style="padding: 0">Job Description</h4>
                <input type="hidden" id="job_id" name="job_id" />
                <div style="font-weight: 400;" id="jd"></div>
                <label class="form-control-label" ></label>
                <hr/>
                <input type="hidden" id="essayid" name="essayid" />
                <label class="form-control-label" id="essay"></label>
                <textarea class="form-control textarea"  name="essayAns" rows="5" required></textarea>
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

<script src="<?=base_url()?>public/dist/js/parallax.js"></script>
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
<script src="<?=base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
  $('.parallax-window').parallax({imageSrc: '<?=base_url()?>public/dist/img/multo.jpg'});
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
        $("#jd").append(data[0].job_description);
        $("#essay").text(data[1].question + " " + data[0].job_title);
        $("#essayid").val(data[1].question_id);  
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
