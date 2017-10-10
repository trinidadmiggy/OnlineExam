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
                        "data": "job_id",
                        "orderable": false, 
                        "render": function (data, type, row) {
                         return "<button type='button' id='"+ data +"' class='btn btn-sm btn-warning edit-job' title='Edit'><i class='fa fa-edit'></i></button>";
                     }
                 },
                 {
                    "data": "job_id",
                    "orderable": false, 
                    "render": function (data, type, row) {
                     return "<button runat='server' type='button' id='"+ data +"' class='btn btn-sm btn-danger' title='Archive'><i class='fa fa-trash'></i></button>";
                 }
             },
             ]
         });
    });

</script>
<script type="text/javascript">
    $('#table tbody').on( 'click', '.edit-job', function () {
        var job_id = $(this).attr("id");
        $.ajax({
            url: "<?php echo site_url('hr/careers/updateGetJobs') ?>",
            method:"POST",
            data:{job_id:job_id},
            dataType:"json", 
            success:function(data) {
                $('#jobTitle').val(data[0].job_title);  
                $('#jobDesc').val(data[0].job_description);  
                $('#image').attr('src', '<?=base_url()?>'+ data[0].image);
                $('#status').val(data[0].status);   
                $('#job_id').val(data[0].job_id);  
                $('#insert').val("Update");  
                $('#editJob').modal('show');
            }
        })
/*        var data = table.row( $(this).parents('tr') ).data();
        alert( data.job_title +"'s salary is: "+ data.job_id );
        $('#addJob').modal('show');*/
    } );
    $('#button1').on('click', function() {
       $('#addJob').modal('show')
   });
</script>
</body>
</html>