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
	
	<link rel="stylesheet" href="<?=base_url()?>public/dist/css/custom.css" media="all">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?=base_url()?>public/dist/css/skins/_all-skins.css">
  	<!-- Mathjax -->
  	<script src='<?=base_url()?>public/plugins/MathJax-master/MathJax.js?config=TeX-AMS-MML_HTMLorMML'></script>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!--  onload="document.title = 'Examination - <?php echo $app_details['lname']; echo ", "; echo $app_details['fname'];  echo " "; echo $app_details['mname'];?>';setTimeout(function() {window.print(); window.location = '<?= base_url()?>hr/app_exams/'}, 1000); -->

    <style type="text/css">
    #exam {
      display: none;
    }

    @media print {
     #exam {
      display: block;
    }
  }
</style>
</head>
<body class="hold-transition skin-blue" id="exam" onload="document.title = 'Examination - <?php echo $app_details['lname']; echo ", "; echo $app_details['fname'];  echo " "; echo $app_details['mname'];?>';setTimeout(function() {window.print(); window.location = '<?= base_url()?>hr/app_exams/'}, 1000);">
<div class="wrapper print-this">
  <div class="content-wrapper">
   <section class="content">
    <div class="row ">
      <div class="box-exam">	
       <div class="box-body">
        <div class="container-fluid">
         <div class="col-lg-12 col-print-12">
          <div class="row">
            <h1 style="padding-bottom: 30px; font-size: 80px; font-family: 'Impact'">
              <i>Computer Programmer Aptitude <br/> Battery</i>
            </h1>
            <p>
              Developed by <br />
              <h4>Jean Maier Palormo</h4>
            </p>
            <div style="padding-top: 455px;">
              <div class="sra"<div>
                <span class="license-border">S</span>
                <span class="license-border">R</span>
                <span class="license-border">A</span>
              </div>
              <div class="license-text" style="border-left:2px solid black;height:32px">
                PRINTED UNDER LICENSE OF SCIENCE RESEARCH ASSOCIATES INC. COPYRIGHT 1964, SCIENCE RESEARCH INC. 259 EAST ERIE, CHICAGO ILLINOIS 60611. ALL RIGHTS RESERVED. Printed in the Philippines.
              </div> 
            </div>
            <div class="page-break"></div>   
            <div> 
              <h3 align="center"><?php echo $app_details['lname']; ?>, <?php echo $app_details['fname']; echo " "; echo$app_details['mname']; ?> </h3>
              <br/>
            </div>
            <?php $v=0;$r=0; $l=0; $n=0; $i=0; foreach($answers as $ans => $value) {  if($value['examtype_id'] == 1) { $v++; if($v == 1) {  ?>
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th colspan="4"><h3 align="center">Verbal Meaning</h3></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Started: <label><?php echo date('M d, Y h:i.s a', strtotime($value['datestarted'])); ?></label></td>
                  <th rowspan="2"><h3 align="center"><i><?php echo $value['score']; ?>/ 38</h3></th>
                  </tr>
                  <tr>
                    <td>Ended: <label><?php echo date('M d, Y h:i.s a', strtotime($value['dateended'])); ?></label></td>
                  </tr>
                </tbody>
              </table>
              <?php } ?>
              <div class="col-lg-4 col-print-4">
                <label style="margin: -6px;">
                  <?php if ($value['answer'] != $value['app_answer']) { ?>
                  <span class="bg-danger">
                    <?php echo $value['question_id'];?>) <?php echo $value['question'];?>
                    <span class="glyphicon glyphicon-remove wrong"></span>
                  </span>
                  <?php } else {   ?>
                  <span class="bg-success">
                    <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                    <span class="glyphicon glyphicon-ok correct"></span>
                  </span>
                  <?php } ?>
                </label>
                <div class="radio">
                  <?php echo $value['answer'] ?>
                </div>
              </div>

              <?php } else if($value['examtype_id'] == 2) {  $r++; ?>
              <?php if($r == 1) { ?> <div class="page-break"></div> 
              <table class="table table-bordered" >
                <thead>
                  <tr>
                    <th colspan="4"><h3 align="center">Reasoning</h3></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Started: <label><?php echo date('M d, Y h:i.s a', strtotime($value['datestarted'])); ?></label></td>
                    <th rowspan="2"><h3 align="center"><i><?php echo $value['score']; ?>/ 24</h3></th>
                    </tr>
                    <tr>
                      <td>Ended: <label><?php echo date('M d, Y h:i.s a', strtotime($value['dateended'])); ?></label></td>
                    </tr>
                  </tbody>
                </table>
                <?php } ?>
                <label>
                  <?php if ($value['answer'] != $value['app_answer']) { ?>
                  <span class="bg-danger">
                    <?php echo $value['question_id'];?>) <?php echo $value['question'];?>
                    <span class="glyphicon glyphicon-remove wrong"></span>
                  </span>
                  <?php } else {   ?>
                  <span class="bg-success">
                    <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                    <span class="glyphicon glyphicon-ok correct"></span>
                  </span>
                  <?php } ?>
                </label>
                <div class="radio">
                  <?php echo $value['answer'] ?>
                </div>

                <?php } else if($value['examtype_id'] == 3) { $l++; ?> 
                <?php if($l == 1) { ?> <div class="page-break"></div> 
                <table class="table table-bordered" >
                  <thead>
                    <tr>
                      <th colspan="4"><h3 align="center">Letter Series</h3></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Started: <label><?php echo date('M d, Y h:i.s a', strtotime($value['datestarted'])); ?></label></td>
                      <th rowspan="2"><h3 align="center"><i><?php echo $value['score']; ?>/ 26 </h3></th>
                      </tr>
                      <tr>
                        <td>Ended: <label><?php echo date('M d, Y h:i.s a', strtotime($value['dateended'])); ?></label></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php } ?>
                  <div class="col-lg-6 col-print-6">
                    <label style="margin: -6px;">
                      <?php if ($value['answer'] != $value['app_answer']) { ?>
                      <span class="bg-danger">
                        <?php echo $value['question_id'];?>) <?php echo $value['question'];?>  
                        <span class="glyphicon glyphicon-remove wrong"></span>
                      </span>
                      <?php } else {   ?>
                      <span class="bg-success">
                        <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                        <span class="glyphicon glyphicon-ok correct"></span>
                      </span>
                      <?php } ?>
                    </label>
                    <div class="radio">
                      <?php echo $value['answer'] ?>
                    </div>
                  </div>

                  <?php } else if($value['examtype_id'] == 4) { $n++;?> 
                  <?php if($n == 1) { ?> <div class="page-break"></div> 
                  <table class="table table-bordered" >
                    <thead>
                      <tr>
                        <th colspan="4"><h3 align="center">Number Ability</h3></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Started: <label><?php echo date('M d, Y h:i.s a', strtotime($value['datestarted'])); ?></label></td>
                        <th rowspan="2"><h3 align="center"><i><?php echo $value['score']; ?>/ 28</h3></th>
                        </tr>
                        <tr>
                          <td>Ended: <label><?php echo date('M d, Y h:i.s a', strtotime($value['dateended'])); ?></label></td>
                        </tr>
                      </tbody>
                    </table>
                    <?php } ?>
                    <div class="col-lg-6 col-print-6">
                      <label style="margin: -6px;">
                        <?php if ($value['answer'] != $value['app_answer']) { ?>
                        <span class="bg-danger">
                          <?php echo $value['question_id'];?>) <?php echo $value['question'];?>  
                          <span class="glyphicon glyphicon-remove wrong"></span>
                        </span>
                        <?php } else {   ?>
                        <span class="bg-success">
                          <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                          <span class="glyphicon glyphicon-ok correct"></span>
                        </span>
                        <?php } ?>
                      </label>
                      <div class="radio">
                        <?php echo $value['answer'] ?>
                      </div>
                    </div>

                    <?php } else if($value['examtype_id'] == 5) { $i++; ?> 
                    <?php if($i == 1) { ?> <div class="page-break"></div> 
                    <table class="table table-bordered" >
                      <thead>
                        <tr>
                          <th colspan="4"><h3 align="center">IPI Aptitude</h3></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Started: <label><?php echo date('M d, Y h:i.s a', strtotime($value['datestarted'])); ?></label></td>
                          <th rowspan="2"><h3 align="center"><i><?php echo $value['score']; ?>/ 54</h3></th>
                          </tr>
                          <tr>
                            <td>Ended: <label><?php echo date('M d, Y h:i.s a', strtotime($value['dateended'])); ?></label></td>
                          </tr>
                        </tbody>
                      </table> 
                      <?php } ?>
                      <div class="col-lg-6 col-print-6">
                        <label style="margin: -6px;">
                          <?php if ($value['answer'] != $value['app_answer']) { ?>
                          <span class="bg-danger">
                            <?php echo $i; ?>) <?php echo $value['question'];?>  
                            <span class="glyphicon glyphicon-remove wrong"></span>
                          </span>
                          <?php } else {   ?>
                          <span class="bg-success">
                            <?php echo $i;?>) <?php echo $value['question'];?> 
                            <span class="glyphicon glyphicon-ok correct"></span>
                          </span>
                          <?php } ?>
                        </label>
                        <div class="radio">
                          <?php echo $value['answer'] ?>
                        </div>
                      </div>
                      <?php } } ?>

                      <div class="col-lg-12 col-print-12 page-break">
                        <?php $essayNo = 1; foreach($essay as $ess => $val) { if($essayNo == 1) {  ?> 
                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                              <th rowspan="2"><h3 align="center">Essay</h3></th>
                              <td>Started: <label><?php echo date('M d, Y h:i a', strtotime($val['started'])); ?></label></td>
                            </tr>
                            <tr>
                              <td>Ended: <label><?php echo date('M d, Y h:i a', strtotime($val['ended'])); ?></label></td>
                            </tr>
                          </tbody>
                        </table>

                        <?php }?>
                        <label style="margin: -6px;">
                          <?php echo $essayNo; ?>) <?php echo $val['question'];?>  
                        </label>
                        <div class="radio">
                          <?php echo $val['answer'] ?>
                        </div>
                        <?php $essayNo++;} ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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
    <!-- page script -->
    <script>
     if (window.MathJax) {
      MathJax.Hub.Queue(
       ["Typeset",MathJax.Hub]
       );
    }
    MathJax.Hub.Config({
      messageStyle: "none",
      tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]},
      showMathMenu : false,
      "HTML-CSS": { 
       scale: 110, 
       minScaleAdjust: 50,
       noReflows: false,
       matchFontHeight: false,
       linebreaks: { automatic: true } 
     }, 
     SVG: { 
       linebreaks: { automatic:true } 
     }, 
     displayAlign: "left"
   });
 </script>
 <script>
   (function($) {
    var element = $('.follow-scroll'),
    originalY = element.offset().top;

    // Space between element and top of screen (when scrolling)
    var topMargin = 20;
    
    // Should probably be set in CSS; but here just for emphasis
    element.css('position', 'relative');
    
    $(window).on('scroll', function(event) {
      var scrollTop = $(window).scrollTop();

      element.stop(false, false).animate({
        top: scrollTop < originalY
        ? 0
        : scrollTop - originalY + topMargin
      }, 300);
    });
  })(jQuery);

</script>

</body>
</html>