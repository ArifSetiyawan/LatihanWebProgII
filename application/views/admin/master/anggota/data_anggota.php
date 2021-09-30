<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li class="active">Master Data Anggota</li>
                        </ol>
                        <br />
                    </div>

                    <a href="<?php echo base_url('admin/tambahAnggota') ?>">
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah anggota</button>
                    </a> <br />

                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">No. Anggota</th>
                                <th data-sortable="true">No. Identitas</th>
                                <th data-sortable="true">Nama Anggota</th>
                                <th data-sortable="true">Tempat Lahir</th>
                                <th data-sortable="true">Tanggal Lahir</th>
                                <th data-sortable="true">Jenis Kelamin</th>
                                <th data-sortable="true">Status Anggota</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_anggota as $anggota) {
                                $enkrip = sha1($anggota['no_anggota']);
                            ?>

                                <tr>
                                    <td data-sortable="true"><?php echo $no = $no + 1 ?></td>
                                    <td data-sortable="true"><?php echo $anggota['no_anggota'] ?></td>
                                    <td data-sortable="true"><?php echo $anggota['no_identitas'] ?></td>
                                    <td data-sortable="true"><?php echo $anggota['nama_anggota'] ?></td>
                                    <td data-sortable="true"><?php echo $anggota['tempat_lahir'] ?></td>
                                    <td data-sortable="true"><?php echo $anggota['tanggal_lahir'] ?></td>
                                    <td data-sortable="true">
                                        <?php
                                        if ($anggota['jenis_kelamin'] == "L") {
                                            echo "Laki Laki";
                                        } elseif ($anggota['jenis_kelamin'] == "P") {
                                            echo "Perempuan";
                                        } else {
                                            echo "";
                                        }

                                        ?>
                                    </td>
                                    <td data-sortable="true"><?php echo $anggota['status_anggota'] ?></td>
                                    <td data-sortable="true">
                                        <a href="<?php echo base_url() ?>admin/editAnggota/<?php echo $enkrip ?>" title="edit">
                                            <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span></button>
                                        </a>
                                        <a href="#" title="hapus" onclick="doDelete('<?php echo $enkrip ?>')">
                                            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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