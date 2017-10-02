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
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
  </script>

  <script type="text/javascript">
/*	$(document).ready(function (){
		var table = $('#example').DataTable({
			'pageLength': 3,
			'stateSave': false,
			'paging'      : true,
			'lengthChange': false,
			'searching'   : false,
			'ordering'    : false,
			'info'        : false,
			'autoWidth'   : false
/*		});

		$('#onlineExam').on('submit', function (e) {
        // Force all the rows back onto the DOM for postback
        table.rows().nodes().page.len(-1).draw(false);  // This is needed
        if ($(this).valid()) {
        	return true;
        }
        e.preventDefault();
      });*/




      $('input:radio').click(function() { 
       $("#ptqothers").prop("disabled",true);
       if($(this).hasClass('enable_tb')) {
        $("#ptqothers").prop("disabled",false);
      }
    });

      $(".prog1").animate({
       backgroundColor: "#f7af07",
       width: "14.286%"
     }, 400 );
      $(".prog2").animate({
       width: "14.286%"
     }, 400 );
      $(".prog3").animate({
       width: "14.286%"
     }, 400 );
      $(".prog4").animate({
       width: "14.286%"
     }, 400 );
      $(".prog5").animate({
       width: "14.286%"
     }, 400 );
      $(".prog6").animate({
       width: "14.285%"
     }, 400 );
      $(".prog7").animate({
       width: "14.285%"
     }, 400 );

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
        scale: 105, 
        minScaleAdjust: 50,
        noReflows: false,
        matchFontHeight: false,
        linebreaks: { automatic: true } 
      }, 
      SVG: { 
        linebreaks: { automatic:true } }, 
        displayAlign: "left"
      });


    </script>




<!--     <script type="text/javascript">
      var page = 1;
      $(window).scroll(function() {   
        if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
          page++;
          loadMoreData(page);
        }
      });

      function loadMoreData(page){
        $.ajax(
        {
          url: '?page=' + page,
          type: "get",
          beforeSend: function()
          {
            $('.ajax-load').show();
          }
        })
        .done(function(data)
        {
          if(data == " "){
            $('.ajax-load').html("No more records found");
            return;
          } else {
            $('.ajax-load').hide();
            $("#exam_questions").append(data);
          }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
          alert('server not responding...');
        });
      }
    </script> -->

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
    </script>

    <script>
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
          url:"<?php echo base_url() ?>examination/getNumber",
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