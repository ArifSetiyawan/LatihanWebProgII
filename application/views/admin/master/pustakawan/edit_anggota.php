<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li><a href="<?php echo base_url('admin/masterAnggota') ?>">Master Data Anggota</a> </li>
                            <li class="active">Edit Data Anggota</li>
                        </ol>
                        <br />
                    </div>
                    <form action="<?php echo base_url('admin/updateAnggota') ?>" method="post">

                        <div class="form-group col-md-6">
                            <label>Nomor Identitas</label>
                            <input class="form-control" type="text" name="no_ident" value="<?php echo $no_ident ?>" placeholder="Masukkan No Identitas" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Nama Lengkap</label>
                            <input class="form-control" type="text" name="nama_anggota" value="<?php echo $nama_anggota ?>" placeholder="Masukkan Nama Lengkap" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Tempat Lahir</label>
                            <input class="form-control" type="text" name="tmpt_lahir" value="<?php echo $tempat_lahir ?>" placeholder="Masukkan Tempat Lahir" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tanggal_lahir ?>" placeholder="Masukkan Tanggal Lahir" required="required">
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control">
                                <?php
                                if ($jk == "L") {
                                    $selL = "selected";
                                    $selP = "";
                                } elseif ($jk == "P") {
                                    $selL = "";
                                    $selP = "selected";
                                }

                                ?>
                                <option value="L" <?php echo $selL ?>>Laki Laki</option>
                                <option value="P" <?php echo $selP ?>>Perempuan</option>
                            </select>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <label>Status Anggota</label>
                            <select name="status" id="status" class="form-control">
                                <?php
                                if ($status == "Guru") {
                                    $selG = "selected";
                                    $selS = "";
                                } elseif ($status == "Siswa") {
                                    $selG = "";
                                    $selS = "selected";
                                }

                                ?>

                                <option value="Guru" <?php echo $selG ?>>Guru</option>
                                <option value="Siswa" <?php echo $selS ?>>Siswa</option>
                            </select>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="<?php echo base_url('admin/masterAnggota') ?>"><button type="button" class="btn btn-danger">Batal</button></a>
                        </div>
                        <div style="clear: both;"></div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>