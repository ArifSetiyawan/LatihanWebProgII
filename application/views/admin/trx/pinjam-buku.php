<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li class="active">Transaksi Peminjaman Buku</li>
                        </ol>
                        <br />
                    </div>
                    <form class="row" method="post" action="">
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="noAnggota" name="noAnggota" placeholder="Nomor Anggota">
                        </div>
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="namaAnggota" name="namaAnggota" placeholder="Nama Anggota">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-default">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="kdBuku" name="kdBuku" placeholder="Kode Buku">
                        </div>
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" id="jdlBuku" name="jdlBuku" placeholder="Judul Buku">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-default">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jmlPinjam" class="form-label">Jumlah Pinjam</label>
                            <input type="text" class="form-control" id="jmlPinjam" name="jmlPinjam" placeholder="Masukkan Jumlah Pinjam">
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary">Simpan dan isi lagi</button>
                        </div>
                    </form>
                    <hr />
                    <div>
                        <span>Data Temporary Peminjaman</span>
                    </div>
                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">Nomor Anggota</th>
                                <th data-sortable="true">Kode Buku</th>
                                <th data-sortable="true">Judul Buku</th>
                                <th data-sortable="true">Jumlah Peminjaman</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            // foreach ($data_anggota as $anggota) {
                            //     $enkrip = sha1($anggota['no_anggota']);
                            ?>

                            <tr>
                                <td data-sortable="true"><?php echo $no = $no + 1 ?></td>
                                <td data-sortable="true">arr</td>
                                <td data-sortable="true">arr</td>
                                <td data-sortable="true">arr</td>
                                <td data-sortable="true">20</td>
                                <td data-sortable="true">
                                    <a href="#" title="hapus" onclick="doDelete('1')">
                                        <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br />
                    <div style="text-align: right;">
                        <a href="<?php echo base_url('admin/tambahKategori') ?>">
                            <button type="button" class="btn btn-success">Selesai Transaksi</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function doDelete(id_anggota) {
        swal({
                title: "Delete Data Anggota?",
                text: "Data ini akan terhapus permanent",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?php echo base_url() ?>admin/hapusAnggota/' + id_anggota;
                } else {
                    $(this).removeAttr('disabled')
                }
            })
    }
</script>