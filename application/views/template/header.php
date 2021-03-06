<?php
$user_access = $this->session->userdata();

if ($user_access != null) {
    if ($user_access['username'] == null) {
        $this->session->set_flashdata('warning', "Silahkan login dulu !");
        redirect('admin');
    }
} else {
    $this->session->set_flashdata('warning', "Silahkan login dulu !");
    redirect('admin');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan - <?php echo $judul_web ?></title>

    <link href="<?php echo config_item('css'); ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo config_item('css'); ?>datepicker3.css" rel="stylesheet">
    <link href="<?php echo config_item('css'); ?>styles.css" rel="stylesheet">
    <link href="<?php echo config_item('css'); ?>bootstrap-table.css" rel="stylesheet">


</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>Perpus</span>takaan</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                            <li><a href="<?php echo base_url('admin/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>