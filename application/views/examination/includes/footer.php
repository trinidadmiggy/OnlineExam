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


<script type="text/javascript">
      //iCheck for checkbox and radio inputs
      $('input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })

    </script>

    <script type="text/javascript">
      $(".prog").animate({
       backgroundColor: "#f7af07",
       width: "14.286%"
     }, 400 )

   </script>

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
      displayAlign: "left",
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

<!-- Timer -->
<script>
  $( document ).ready(function() {
   var min = document.getElementById("timeValue").value;
   var countDown = new Date().getTime() + min*60000;

   var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDown - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById("time").innerHTML = minutes + "m " + seconds + "s ";

    if(distance < 0 ) {
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)) + 1;
      document.getElementById("time").innerHTML = minutes+ "m " + seconds + "s ";
      document.getElementById("time").style.color = "red";
    }
  }, 100)
 });
</script>
</body>
</html>