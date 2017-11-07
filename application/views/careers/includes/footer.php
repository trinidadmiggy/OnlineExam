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

<script src="<?=base_url()?>public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
    $(document).ready(function() {
        <?php if($this->session->flashdata('addform_error') || $this->session->flashdata('addupload_error')) { ?>
            document.getElementById("addError").style.display = "block";
            $('#addJob').modal('show');
            <?php } else if($this->session->flashdata('editform_error') || $this->session->flashdata('editupload_error')) { ?>
               document.getElementById("editError").style.display = "block";
               var job_id = <?php echo $this->session->flashdata('id') ?>;
               $.ajax({
                url: "<?php echo site_url('hr/careers/updateGetJobs') ?>",
                method:"POST",
                data:{job_id:job_id},
                dataType:"json", 
                success:function(data) {
                    $('#jobTitle').val(data.job_title);  
                    $('iframe').contents().find('.wysihtml5-editor').html(data.job_description);
                    $('#image').attr('src', '<?=base_url()?>'+ data.image);
                    $('#jobImagePath').val(data.image);  
                    $('#status').val(data.status);   
                    $('#job_id').val(data.job_id);  
                    $('#insert').val("Update");  
                    $('#editJob').modal('show');
                }
            })
               $('#myModal').on('hidden.bs.modal', function () {
                   location.reload();
               })
               <?php } ?>
           });
       </script>


       <script>
          $(function () {
            $('.textarea').wysihtml5({
              toolbar: {
    "font-styles": false, // Font styling, e.g. h1, h2, etc.
    "emphasis": true, // Italics, bold, etc.
    "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
    "html": false, // Button which allows you to edit the generated HTML.
    "link": false, // Button to insert a link.
    "image": false, // Button to insert an image.
    "color": false, // Button to change color of font
    "blockquote": false, // Blockquote
    "size": "sm" // options are xs, sm, lg
}
});
        })
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
                        "width": "50%"  
                    },
                    { 
                        "data": "image",
                        "orderable": false,
                        "render": function ( data, type, row ) {
                            return "<img src='<?=base_url()?>"+ data + "' alt='no image' onError=this.onerror=null;this.src='<?=base_url()?>public/dist/img/no-image.jpg' class='img-rounded' width='100' />";  
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
                    "data": null,
                    "orderable": false, 
                    "render": function (data, type, row) {
                        if(data.status == "Posted") {
                            return "<button runat='server' type='button' id='"+ data.job_id +"' class='btn btn-sm btn-danger post-job' onClick='window.location.reload()' title='Unpost'><i class='fa fa-share-square-o'></i></button>";
                        } else {
                            return "<button runat='server' type='button' id='"+ data.job_id +"' class='btn btn-sm btn-danger post-job' onClick='window.location.reload()' title='Post'><i class='fa fa-share-square-o'></i></button>";
                        }

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
                $('#jobTitle').val(data.job_title);  
                $('iframe').contents().find('.wysihtml5-editor').html(data.job_description);
                $('#image').attr('src', '<?=base_url()?>'+ data.image);
                $('#jobImagePath').val(data.image);  
                $('#status').val(data.status);   
                $('#job_id').val(data.job_id);  
                $('#insert').val("Update");  
                $('#editJob').modal('show');
            }
        })
    });
    $('#table tbody').on( 'click', '.post-job', function () {
        var job_id = $(this).attr("id");
        var data = table.row( $(this).parents('tr') ).data();
        var status = $('#status').val
        $.ajax({
            url: "<?php echo site_url('hr/careers/postStatus') ?>",
            method:"POST",
            data:{job_id:job_id, status:data.status},
            dataType:"json"
        })
    });
</script>




<script type="text/javascript">
    var tbl;
    $(document).ready(function () {

        tbl = $('#app_exams').DataTable({
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.

                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": "<?php echo site_url('hr/app_exams/getApplicant') ?>",
                        "type": "POST", 
                    },

                    "columns": [
                    { 
                        "data": "app_id",
                        "orderable": false, 
                        "visible": false,
                    },

                    {
                        "data": "app_id",
                        "orderable": false, 
                        "render": function (data, type, row) {
                            return "<button type='button' id='"+ data +"' class='btn btn-sm btn-primary app_details' title='Applicant Details'><i class='fa fa-info'></i></button>";
                        }
                    },
                    {
                        "data": "lname"
                    },
                    {
                        "data": "mname"
                    },
                    {
                        "data": "fname"
                    },
                    {
                        "data": null,
                        "orderable": false, 
                        "render": function (data, type, row) {
                            if(data.exam_status) {
                                return "<button type='button' id='"+ data.app_id +"' class='btn btn-sm btn-secondary view-exam' title='Print/Save Exam'><i class='fa fa-print'></i></button>";
                            } else {
                                return "<button type='button' id='"+ data.app_id +"' class='btn btn-sm btn-danger view-exam' title='Applicant has not yet taken the examination or has not yet finished with the examination' disabled><i class='fa fa-exclamation-triangle' ></i></button>";
                            }
                            
                        }
                    },

                    ]
                });


    });
</script>
<script>
    $('#app_exams tbody').on( 'click', '.app_details', function () {
        var app_id = $(this).attr("id");
        $.ajax({
            url: "<?php echo site_url('hr/app_exams/getAppDetails') ?>",
            method:"POST",
            data:{app_id:app_id},
            dataType:"json", 
            success:function(data) {
                $('#name').val(data.lname +", "+ data.fname +" "+ data.mname);
                $('#birthdate').val(data.birthdate);  
                $('#address').val(data.address);
                $('#contact').val(data.mobile);  
                $('#email').val(data.email);   
                $('#applicantDetails').modal('show');
            }
        })
    });

    $('#app_exams tbody').on( 'click', '.view-exam', function () {
        var app_id = $(this).attr("id");
        window.location = "<?= base_url()?>hr/app_exams/appans/" + app_id;
    });
</script>



</body>
</html>