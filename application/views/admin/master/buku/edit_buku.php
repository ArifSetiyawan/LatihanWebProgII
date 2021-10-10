<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a href="<?php echo base_url('admin/masterBuku') ?>">Master Data Buku</a> </li>
                            <li class="active">Tambah Data Buku</li>
                        </ol>
                        <br />
                    </div>
                    <form action="<?php echo base_url('admin/updateBuku') ?>" method="post">

                        <div class="form-group col-md-6">
                            <label>Judul Buku</label>
                            <input class="form-control" type="text" value="<?php echo $judul_buku ?>" name="judul" placeholder="Masukkan Judul Buku" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Kategori Buku</label>
                            <select name="k_buku" id="k_buku" class="form-control">
                                <?php foreach ($aktif_kategori as $kategori) { ?>
                                    <option value="<?php echo $kategori['id_kategori_buku'] ?>" <?php echo isset($kategori_buku) ? ($kategori['id_kategori_buku'] == $kategori_buku ? 'selected' : '') : ''; ?>>
                                        <?php echo $kategori['nama_kategori_buku'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Penulis Buku</label>
                            <input class="form-control" type="text" name="penulis" value="<?php echo $penulis_buku ?>" placeholder="Masukkan Penulis Buku" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Penerbit Buku</label>
                            <input class="form-control" type="text" name="penerbit" value="<?php echo $penerbit_buku ?>" placeholder="Masukkan Penerbit Buku" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Tahun Terbit</label>
                            <input class="form-control" type="text" onkeypress="return harusAngka(event);" autocomplete="off" name="tahun_terbit" value="<?php echo $tahun_terbit ?>" placeholder="Masukkan Tahun Terbit Buku" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Stok Buku</label>
                            <input class="form-control" type="text" onkeypress="return harusAngka(event);" autocomplete="off" name="stok" value="<?php echo $stok_buku ?>" placeholder="Masukkan Jumlah Stok Buku" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo base_url('admin/masterBuku') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>