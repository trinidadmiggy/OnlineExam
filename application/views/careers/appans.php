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
  	 <link rel="stylesheet" href="<?=base_url()?>public/dist/css/sourcesans.css">
      <link rel="stylesheet" href="<?=base_url()?>public/dist/css/roboto.css">
    <!--  onload="document.title = 'Examination - <?php echo $app_details['lname']; echo ", "; echo $app_details['fname'];  echo " "; echo $app_details['mname'];?>';setTimeout(function() {window.print(); window.location = '<?= base_url()?>hr/app_exams/'}, 1000); -->


    <style>
    #exam {
      display: none;
    }
    /* Main Css */
    html {
      background: #E2EBF2;
      font-family: "Roboto";
    }

    .loading {
      height: 100vh;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      -webkit-animation: in ease 1s forwards;
      animation: in ease 1s forwards;
      font-family: 'Roboto', sans-serif;
    }

    /* Objets */
    .printer-main {
      position: absolute;
      height: 140px;
      width: 280px;
      background: #2c3e50;
      border-radius: 15px;
      cursor: pointer;
    }

    .body-print {
      position: relative;
      height: 40px;
      width: 280px;
      background: #2c3e50;
      z-index: 3;
    }

    .ramp {
      position: absolute;
      top: -60px;
      left: 60px;
      height: 60px;
      width: 150px;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
      background: #2c3e50;
    }

    .printer-top {
      position: relative;
      height: 60px;
      width: 280px;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      background: #34495e;
      z-index: 3;
    }

    .button-1 {
      position: relative;
      height: 12px;
      width: 12px;
      top: 40px;
      left: 250px;
      background: #2ECC71;
      border: 1px solid #7ee2a8;
      border-radius: 100%;
      z-index: 3;
    }

    .button-2 {
      position: relative;
      height: 8px;
      width: 8px;
      top: 29px;
      left: 228px;
      background: #FF9900;
      border: 1px solid #ffc266;
      border-radius: 100%;
      z-index: 3;
    }

    .button-3 {
      position: relative;
      height: 5px;
      width: 5px;
      top: 21px;
      left: 210px;
      background: #F9E55C;
      border: 1px solid #fbed8d;
      border-radius: 100%;
      z-index: 3;
    }

    .printer-separator {
      position: relative;
      top: 0px;
      height: 10px;
      width: 280px;
      background: #48647F;
      z-index: 3;
    }

    .exit-part {
      position: relative;
      top: -30px;
      left: 60px;
      height: 60px;
      width: 150px;
      border-top-left-radius: 8px;
      border-top-right-radius: 8px;
      background: #1a252f;
    }

    .paper {
      position: relative;
      top: -180px;
      left: 15px;
      height: 150px;
      width: 120px;
      border-radius: 2px;
      background: #FFFEF3;
      z-index: 1;
      box-shadow: 13px 13px 10px -11px rgba(0,0,0,0.39);
    }

    img {
      position: relative;
      top: -330px;
      left: 20px;
      height: 135px;
      width: 110px;
      opacity: 0;
      z-index: 2;
    }

    /* Pour Animation */
    .active-paper {
      -webkit-animation: down ease 3s forwards;
      animation: down ease 3s forwards;
    }

    .active-logo {
      -webkit-animation: down-logo ease 3s forwards;
      animation: down-logo ease 3s forwards;
    }

    .flashing {
      -webkit-animation: light ease 600ms infinite;
      animation: light ease 600ms infinite;
    }

    /* Animations */
    @-webkit-keyframes in {
      0% {
        -webkit-transform: translateY(-900px);
        transform: translateY(-900px);
      }
      60% {
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
      }
      80% {
        -webkit-transform: translateY(-10px);
        transform: translateY(-10px);
      }
      100% {
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
      }
    }
    @keyframes in {
      0% {
        -webkit-transform: translateY(-900px);
        transform: translateY(-900px);
      }
      60% {
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
      }
      80% {
        -webkit-transform: translateY(-10px);
        transform: translateY(-10px);
      }
      100% {
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
      }
    }
    @-webkit-keyframes light {
      0% {
        background: #2ECC71;
      }
      100% {
        background: white;
      }
    }
    @keyframes light {
      0% {
        background: #2ECC71;
      }
      100% {
        background: white;
      }
    }
    @-webkit-keyframes down {
      0% {
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
      }
      100% {
        -webkit-transform: translateY(250px);
        transform: translateY(250px);
      }
    }
    @keyframes down {
      0% {
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
      }
      100% {
        -webkit-transform: translateY(250px);
        transform: translateY(250px);
      }
    }
    @-webkit-keyframes down-logo {
      0% {
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
        opacity: 0;
      }
      20% {
        opacity: 0;
      }
      25% {
        opacity: 1;
      }
      100% {
        -webkit-transform: translateY(265px);
        transform: translateY(265px);
        opacity: 1;
      }
    }
    @keyframes down-logo {
      0% {
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
        opacity: 0;
      }
      20% {
        opacity: 0;
      }
      25% {
        opacity: 1;
      }
      100% {
        -webkit-transform: translateY(265px);
        transform: translateY(265px);
        opacity: 1;
      }
    }
  </style>




</head>
<body  onload="myFunction(); document.title = 'Examination - <?php echo $app_details['lname']; echo ", "; echo $app_details['fname'];  echo " "; echo $app_details['mname'];?>';">
  <div class="loading" id="loading">
    <div class="printer-main">
      <div class="ramp"></div>
      <div class="printer-top">
        <div class="button-1"></div>
        <div class="button-2"></div>
        <div class="button-3"></div>
      </div>
      <div class="printer-separator"></div>
      <div class="body-print"></div>
      <div class="exit-part">
        <div class="paper" style="text-align: center;">Examination</div>
        <img src="<?=base_url()?>public/dist/img/scribble-1.png" />
      </div>
    </div>
  </div>
  <div class="wrapper"  style="display:none;" id="exam" class="animate-bottom" style="color:white;">

   <div class="col-lg-12 col-print-12">
    <div class="row">
      <h1 style="padding-bottom: 30px; font-size: 80px; font-family: 'Impact'; color:white;">
        <i>Computer Programmer Aptitude <br/> Battery</i>
      </h1>
      <p style="color:white;">
        Developed by <br />
        <h4 style="color:white;">Jean Maier Palormo</h4>
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
                &nbsp;
                <div class="page-break"></div>
                <div class="col-lg-12 col-print-12">
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
                  <?php $essayNo++; } ?>
                </div>
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
          <script>

            var myVar;

            function myFunction() {
              $('.paper').toggleClass('active-paper');
              $('img').toggleClass('active-logo');
              $('.button-1').toggleClass('flashing');

              myVar = setTimeout(showPage, 3000);
            }

            function showPage() {
              document.getElementById("loading").style.display = "none";
              document.getElementById("exam").style.display = "block";
              setTimeout(function() {window.print(); window.location = '<?= base_url()?>hr/app_exams/'}, 1000);
            }
            /* Downloaded from https://www.codeseek.co/ */



          </script>


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