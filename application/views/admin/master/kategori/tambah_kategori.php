<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a href="<?php echo base_url('admin/masterKategori') ?>">Master Data Kategori</a> </li>
                            <li class="active">Tambah Data Kategori</li>
                        </ol>
                        <br />
                    </div>
                    <form action="<?php echo base_url('admin/simpanKategori') ?>" method="post">

                        <div class="form-group col-md-6">
                            <label>Nama Kategori</label>
                            <input class="form-control" type="text" name="nama_kategori" placeholder="Masukkan Nama Kategori Buku" required="required">
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