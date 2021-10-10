    <script src="<?php echo config_item('js'); ?>jquery-1.11.1.min.js"></script>
    <script src="<?php echo config_item('js'); ?>bootstrap.min.js"></script>
    <script src="<?php echo config_item('js'); ?>sweetalert2.min.js"></script>
    <script src="<?php echo config_item('js'); ?>chart.min.js"></script>
    <script src="<?php echo config_item('js'); ?>chart-data.js"></script>
    <script src="<?php echo config_item('js'); ?>easypiechart.js"></script>
    <script src="<?php echo config_item('js'); ?>easypiechart-data.js"></script>
    <script src="<?php echo config_item('js'); ?>bootstrap-datepicker.js"></script>
    <script src="<?php echo config_item('js'); ?>bootstrap-table.js"></script>
    <script type="text/javascript">
		
    </script>
    <script type="text/javascript">
    	for (i = 0; i <= 2; i++) {
    		(function(i) {
    			$(".reveal" + i).on('click', function() {
    				console.log(i)

    				$("i", this).toggleClass("glyphicon glyphicon-eye-open glyphicon glyphicon-eye-close");
    				var pwd = $(".pwd" + i);
    				if (pwd.attr('type') == 'password') {
    					pwd.attr('type', 'text');
    				} else {
    					pwd.attr('type', 'password');
    				}
    			});
    		})(i);
    	}
    </script>
    <script type="text/javascript">
    	function harusAngka(jumlah) {
    		var karakter = (jumlah.which) ? jumlah.which : event.keyCode
    		if (karakter > 31 && (karakter < 48 || karakter > 57)) {
    			return false
    		} else {
    			return true
    		}
    	}

    	function getKey(e) {
    		if (window.event) {
    			return window.event.keyCode
    		} else if (e) {
    			return e.which
    		} else {
    			return null
    		}
    	}

    	function goodChars(e, goods, field) {
    		var key, keychar
    		key = getKey(e)

    		if (key == null) {
    			return true
    		}

    		keychar = String.fromCharCode(key)
    		keychar = keychar.toLowerCase()
    		goods = goods.toLowerCase()

    		if (goods.indexOf(keychar) != -1) {
    			return true
    		}

    		if (key == null || key == 0 || key == 8 || key == 27) {
    			return true
    		}
    		if (key == 13) {
    			for (let i = 0; i < field.form.elements.length; i++) {
    				if (field == field.form.elements[i]) {
    					break
    					i = (i + 1) % field.form.elements.length
    					field.form.elements[i].focus()
    					return false
    				}
    				return false
    			}
    		}
    	}
    </script>
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