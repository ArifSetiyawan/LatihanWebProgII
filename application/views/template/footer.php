    <script src="<?php echo config_item('js'); ?>jquery-1.11.1.min.js"></script>
    <script src="<?php echo config_item('js'); ?>bootstrap.min.js"></script>
    <script src="<?php echo config_item('js'); ?>sweetalert2.min.js"></script>
    <script src="<?php echo config_item('js'); ?>chart.min.js"></script>
    <script src="<?php echo config_item('js'); ?>chart-data.js"></script>
    <script src="<?php echo config_item('js'); ?>easypiechart.js"></script>
    <script src="<?php echo config_item('js'); ?>easypiechart-data.js"></script>
    <script src="<?php echo config_item('js'); ?>bootstrap-datepicker.js"></script>
    <script src="<?php echo config_item('js'); ?>bootstrap-table.js"></script>

    <script>
    	$('#calendar').datepicker({});

    	! function($) {
    		$(document).on("click", "ul.nav li.parent > a > span.icon", function() {
    			$(this).find('em:first').toggleClass("glyphicon-minus");
    		});
    		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    	}(window.jQuery);

    	$(window).on('resize', function() {
    		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    	})
    	$(window).on('resize', function() {
    		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    	})
    </script>
    <?php if ($this->session->flashdata('success')) : ?>
    	<script type="text/javascript">
    		$(document).ready(function() {
    			swal("Success!", "<?php echo $_SESSION['success'] ?>", "success");
    		});
    	</script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
    	<script type="text/javascript">
    		$(document).ready(function() {
    			swal("Sorry!", "<?php echo $_SESSION['error'] ?>", "error");
    		});
    	</script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('warning')) : ?>
    	<script type="text/javascript">
    		$(document).ready(function() {
    			swal("Warning!", "<?php echo $_SESSION['warning'] ?>", "warning");
    		});
    	</script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('info')) : ?>
    	<script type="text/javascript">
    		$(document).ready(function() {
    			swal("Info!", "<?php echo $_SESSION['info'] ?>", "info");
    		});
    	</script>
    <?php endif; ?>
    </body>

    </html>