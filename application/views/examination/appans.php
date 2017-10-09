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
  </head>
  <body class="hold-transition skin-blue">
  	<div class="wrapper">
  		<div class="content-wrapper">
  			<section class="content-header">
  				<h1 class="text-center">
  					Questronix Online Examination <button class="btn btn-success" onclick="setTimeout('window.print()', 500);">Print</button>
  				</h1>
  			</section>
  			<section class="content">
  				<div class="row">
  					<div class="col-lg-8 col-lg-offset-2">
  						<div class="box-exam">	
  							<div class="box-body">
  								<div class="container-fluid">
  									<div class="col-lg-12 col-print-12">
  										<div class="row">
                        <h3>Verbal Meaning</h3>
                        <?php $r=0; $l=0; $n=0; $i=0; foreach($answers as $ans => $value) {  if($value['examtype_id'] == 1) { ?>
                        <div class="col-lg-4 col-print-4">
                          <label style="margin: -6px;">
                            <?php if ($value['answer'] != $value['app_answer']) { ?>
                            <?php echo $value['question_id'];?>) <?php echo $value['question'];?>  
                            <span class="glyphicon glyphicon-remove wrong"></span>
                            <?php } else {   ?>
                            <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                            <span class="glyphicon glyphicon-ok correct"></span>
                            <?php } ?>
                          </label>
                          <div class="radio">
                            <?php echo $value['answer'] ?>
                          </div>
                        </div>

                        <?php } else if($value['examtype_id'] == 2) {  $r++; ?>
                        <?php if($r == 1) { ?> <div class="page-break"></div> <h3>Reasoning</h3>  <?php } ?>
                        <label>
                          <?php if ($value['answer'] != $value['app_answer']) { ?>
                          <?php echo $value['question_id'];?>) <?php echo $value['question'];?>  
                          <span class="glyphicon glyphicon-remove wrong"></span>
                          <?php } else {   ?>
                          <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                          <span class="glyphicon glyphicon-ok correct"></span>
                          <?php } ?>
                        </label>
                        <div class="radio">
                          <?php echo $value['answer'] ?>
                        </div>

                        <?php } else if($value['examtype_id'] == 3) { $l++; ?> 
                        <?php if($l == 1) { ?> <div class="page-break"></div> <h3>Letter Series</h3> <?php } ?>
                        <div class="col-lg-6 col-print-6">
                          <label style="margin: -6px;">
                            <?php if ($value['answer'] != $value['app_answer']) { ?>
                            <?php echo $value['question_id'];?>) <?php echo $value['question'];?>  
                            <span class="glyphicon glyphicon-remove wrong"></span>
                            <?php } else {   ?>
                            <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                            <span class="glyphicon glyphicon-ok correct"></span>
                            <?php } ?>
                          </label>
                          <div class="radio">
                            <?php echo $value['answer'] ?>
                          </div>
                        </div>

                        <?php } else if($value['examtype_id'] == 4) { $n++;?> 
                        <?php if($n == 1) { ?> <div class="page-break"></div> <h3>Number Ability</h3> <?php } ?>
                        <div class="col-lg-6 col-print-6">
                          <label style="margin: -6px;">
                            <?php if ($value['answer'] != $value['app_answer']) { ?>
                            <?php echo $value['question_id'];?>) <?php echo $value['question'];?>  
                            <span class="glyphicon glyphicon-remove wrong"></span>
                            <?php } else {   ?>
                            <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                            <span class="glyphicon glyphicon-ok correct"></span>
                            <?php } ?>
                          </label>
                          <div class="radio">
                            <?php echo $value['answer'] ?>
                          </div>
                        </div>

                        <?php } else if($value['examtype_id'] == 5) { $i++; ?> 
                        <?php if($i == 1) { ?> <div class="page-break"></div> <h3>IPI Aptitude</h3> <?php } ?>
                        <div class="col-lg-6 col-print-6">
                          <label style="margin: -6px;">
                            <?php if ($value['answer'] != $value['app_answer']) { ?>
                            <?php echo $value['question_id'];?>) <?php echo $value['question'];?>  
                            <span class="glyphicon glyphicon-remove wrong"></span>
                            <?php } else {   ?>
                            <?php echo $value['question_id'];?>) <?php echo $value['question'];?> 
                            <span class="glyphicon glyphicon-ok correct"></span>
                            <?php } ?>
                          </label>
                          <div class="radio">
                            <?php echo $value['answer'] ?>
                          </div>
                        </div>
                        <?php } } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer box-comments">
                  <div class="box-comment">
                   <div class="sra">
                    <span class="license-border">S</span>
                    <span class="license-border">R</span>
                    <span class="license-border">A</span>
                  </div>
                  <div class="license-text" style="border-left:2px solid black;height:32px">
                    PRINTED UNDER LICENSE OF SCIENCE RESEARCH ASSOCIATES INC. COPYRIGHT 1964, SCIENCE RESEARCH INC. 259 EAST ERIE, CHICAGO ILLINOIS 60611. ALL RIGHTS RESERVED. Printed in the Philippines.
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

</body>
</html>