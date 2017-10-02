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
      SVG: { 
        linebreaks: { automatic:true } 
      }, 
      displayAlign: "left"
    });
</script>
<!--     <script>
      $(document).ready(function(){
        getquestion(0);
        $("#load_more").click(function(e){
          e.preventDefault();
          var page = $(this).data('val');
          getquestion(page);
        });
      });
      var getquestion = function(page){

        $.ajax({
          url:"<?php echo base_url() ?>examination/getVerbal",
          type:'GET',
          data: {page:page}
        }).done(function(response){
          $("#ajax_table").append(response);
          $('#load_more').data('val', ($('#load_more').data('val')+1));
          scroll();
        });
      };
      var scroll  = function(){
        $('html, body').animate({
          scrollTop: $('#load_more').offset().top
        }, 1000);
      };
    </script> -->
  </body>
  </html>