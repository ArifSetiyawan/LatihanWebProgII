<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li class="active">Ganti Password User</li>
                        </ol>
                        <br />
                    </div>
                    <form action="<?php echo base_url('admin/updatePassword') ?>" method="post">

                        <div class="form-group col-md-6">
                            <label>Password lama</label>
                            <div class="input-group">
                                <input type="password" name="p_lama" placeholder="Masukkan Password lama anda" required="required" class="form-control pwd0">
                                <span class="input-group-btn">
                                    <button class="btn btn-default reveal0" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                </span>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Password baru</label>
                            <div class="input-group">
                                <input class="form-control pwd1" type="password" name="p_baru" placeholder="Masukkan Password baru anda" required="required">
                                <span class="input-group-btn">
                                    <button class="btn btn-default reveal1" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                </span>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Konfirmasi password baru</label>
                            <div class="input-group">
                                <input class="form-control pwd2" type="password" name="konfirm_baru" placeholder="Konfirmasi password baru anda" required="required">
                                <span class="input-group-btn">
                                    <button class="btn btn-default reveal2" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                </span>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-danger">Batal</button>
                        </div>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>