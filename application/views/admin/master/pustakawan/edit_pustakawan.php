<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a href="<?php echo base_url('admin/masterPustakawan') ?>">Master Data Pustakawan</a> </li>
                            <li class="active">Edit Data Pustakawan</li>
                        </ol>
                        <br />
                    </div>
                    <form action="<?php echo base_url('admin/updatePustakawan') ?>" method="post">

                        <div class="form-group col-md-6">
                            <label>Nama Pustakawan</label>
                            <input class="form-control" type="text" name="nama_pustakawan" value="<?php echo $nama_pustakawan ?>" placeholder="Masukkan Nama Pustakawan" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Username Pustakawan</label>
                            <input class="form-control" type="text" name="username" value="<?php echo $username_pustakawan ?>" placeholder="Masukkan Username Pustakawan" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo base_url('admin/masterPustakawan') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>