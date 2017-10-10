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

<script type="text/javascript">
	var table;

	$(document).ready(function () {
        table = $('#table').DataTable({

                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.

                    // Load data for the table's content from an Ajax source
                    "ajax": {
                    	"url": "<?php echo site_url('hr/careers/jobs') ?>",
                    	"type": "POST", 
                    },
                    "columns": [
                    { 
                        "data": "job_id",
                        "visible": false,
                    },
                    { "data": "job_title" },
                    { 
                        "data": "job_description",
                        "orderable": false, 
                    },
                    { 
                        "data": "image",
                        "orderable": false,
                        "render": function ( data, type, row ) {
                            return "<img src='<?=base_url()?>"+ data + "' alt='no image' class='img-rounded' width='100' />";
                        }
                    },
                    { "data": "status" },
                    {
                        "orderable": false, 
                        "render": function (data, type, row) {
                         return "<button type='button' id='button2' class='btn btn-sm btn-warning' title='Edit'><i class='fa fa-edit'></i></button>";
                     }
                 },
                 {
                    "orderable": false, 
                    "render": function (data, type, row) {
                     return "<button runat='server' type='button' class='btn btn-sm btn-danger' title='Archive'><i class='fa fa-trash'></i></button>";
                 }
             },
             ]

         });
    });

</script>
<script type="text/javascript">
    $('#table tbody').on( 'click', '#button2', function () {
        var data = table.row( $(this).parents('tr') ).data();
        alert( data[0] +"'s salary is: "+ data[ 1 ] );
    } );
    $('#button1').on('click', function() {
       $('#addJob').modal('show')
   });
</script>
</body>
</html>