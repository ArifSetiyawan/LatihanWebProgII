<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Administrator</title>

	<link href="<?php echo config_item('css'); ?>bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo config_item('css'); ?>styles.css" rel="stylesheet">
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo base_url('admin/authentifikasi') ?>">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->



	<script src="<?php echo config_item('js'); ?>jquery-1.11.1.min.js"></script>
	<script src="<?php echo config_item('js'); ?>bootstrap.min.js"></script>
	<script src="<?php echo config_item('js'); ?>sweetalert2.min.js"></script>
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
				swal("Warning!", "{!! session('warning') !!}", "warning");
			});
		</script>
	<?php endif; ?>
	<?php if ($this->session->flashdata('info')) : ?>
		<script type="text/javascript">
			$(document).ready(function() {
				swal("Info!", "{!! session('info') !!}", "info");
			});
		</script>
	<?php endif; ?>
</body>

</html>