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
<!-- AdminLTE App -->
<script src="<?=base_url()?>public/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>public/dist/js/demo.js"></script>
<!-- page script -->

<script type="text/javascript">
    var table;

    $(document).ready(function(){
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('examination/fetch_questions')?>",
            "type": "POST", 
            
            data: {},
            "dataType": "json",
            cache: false,
            success: function (data) {
                $.each(data, function (i, val) {
                    var tr = 
                    "<tr>" +
                    "<td>"+ (i + 1) + "</td>" +
                    "<td>"+ val.question_id + "</td>" +
                    "<td>"+ val.question + "</td>" +
                    "<td>"+ val.option1 + "</td>" +

                    "</tr>";
                    $(tr).appendTo("tbody");
                });
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
    });
});

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




/*    $('input:radio').click(function() { 
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
    }, 400 );*/

</script>

<script>
	if (window.MathJax) {
		MathJax.Hub.Queue(
			["Typeset",MathJax.Hub]
			);
	}
	MathJax.Hub.Config({
		tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]},
		showMathMenu : false
	});


</script>
</body>
</html>