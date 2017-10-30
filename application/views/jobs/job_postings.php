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
  <!-- <link rel="stylesheet" href="<?=base_url()?>public/bower_components/Ionicons/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/AdminLTE.css">
  
  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/custom.css">

  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/skins/_all-skins.css">

  <link rel="stylesheet" href="<?=base_url()?>public/dist/css/sourcesans.css">

  <style>
  section.module.parallax-1 {
    background-image: url("<?=base_url()?>public/dist/img/meeting.jpg");
  }
</style>
</head>
<body class="hold-transition skin-black sidebar-mini sidebar-collapse">
  <div class="wrapper">
    <header class="main-header">
      <a class="logo">
        <span class="logo-mini"><b>Q</b>NX</span>
        <span class="logo-lg"><small>Q U E S T R O N I X</small> </span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" >
                Hi! <span class="hidden-xs"><?php echo $sess['fname']." ". $sess['lname'];  ?></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="pull-right">

                  </div>
                </li>
              </ul>
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
  <div class="content-wrapper">
    <section class="module parallax parallax-1">
      <div class="parallax-container">
        <h1>Careers</h1>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div id="job">
          <div class="col-lg-12">
            <?php foreach($jobs as $job) { ?>
            <div class="col-lg-6">
              <div class="strip_list wow fadeIn" data-wow-delay="0.1s">
                <div class="row">
                  <div class="col-md-9 col-sm-9">
                    <div class="desc">
                      <div class="thumb_strip">
                        <img src="<?=base_url(); echo $job['image']?>" onError="this.onerror=null;this.src='<?=base_url()?>public/dist/img/no-job.jpg'" >
                      </div>
                      <h3><?php echo $job['job_title']; ?></h3>
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
      <form method="post" action="<?= site_url('applicant/jobs/apply')?>">
        <div class="modal-body">
          <div class="form-horizontal">
            <div class="form-group">
              <div class="col-lg-12">
                <div class="alert alert-danger" id="error" style="display: none;">
                  <?php echo $this->session->flashdata('error'); ?>
                </div>
                <div class="alert alert-success" id="applied" style="display: none;">
                  <?php echo $this->session->flashdata('applied'); ?>
                </div>
                <h4 style="padding: 0">Job Description</h4>
                <input type="hidden" id="job_id" name="job_id" />
                <div style="font-weight: 400;" id="jd"></div>
                <label class="form-control-label" ></label>
                <hr/>
                <input type="hidden" id="essayid" name="essayid" />
                <label class="form-control-label" id="essay"></label>
                <textarea class="form-control textarea"  name="essayAns" id="essayAns" rows="5" minlength="50" style="resize: none;" required ></textarea>
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
<!-- SlimScroll -->
<script src="<?=base_url()?>public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>public/dist/js/adminlte.min.js"></script>


<script type="text/javascript">

  $(document).ready(function() {
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
          document.getElementById("jd").innerHTML = data[0].job_description;
          $("#essay").text(data[1].question + " " + data[0].job_title);
          $("#essayid").val(data[1].question_id);  
          $('#apply').modal('show');
        }
      })
    });
  });
</script>

</html>
