<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <ol class="breadcrumb">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                            <li class="active">Master Data Pustakawan</li>
                        </ol>
                        <br />
                    </div>

                    <a href="<?php echo base_url('admin/tambahPustakawan') ?>">
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Pustakawan</button>
                    </a> <br />

                    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true">
                        <thead>
                            <tr>
                                <th data-sortable="true">#</th>
                                <th data-sortable="true">Nama Pustakawan</th>
                                <th data-sortable="true">Username</th>
                                <th data-sortable="true">Akses Pustakawan</th>
                                <th data-sortable="true">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data_pustakawan as $pustakawan) {
                                $enkrip = sha1($pustakawan['id_pustakawan']);
                            ?>

                                <tr>
                                    <td data-sortable="true"><?php echo $no = $no + 1 ?></td>
                                    <td data-sortable="true"><?php echo $pustakawan['nama_pustakawan'] ?></td>
                                    <td data-sortable="true"><?php echo $pustakawan['username_pustakawan'] ?></td>
                                    <td data-sortable="true">
                                        <?php
                                        if ($pustakawan['akses_pustakawan'] == 1) {
                                            echo "Superadmin";
                                        } elseif ($pustakawan['akses_pustakawan'] == 2) {
                                            echo "User";
                                        } else {
                                            echo "";
                                        }

                                        ?>
                                    </td>
                                    <td data-sortable="true">
                                        <a href="<?php echo base_url() ?>admin/editPustakawan/<?php echo $enkrip ?>" title="edit">
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
    function doDelete(id_pustakawan) {
        swal({
                title: "Delete Data Pustakawan?",
                text: "Data ini akan terhapus permanent",
                icon: "warning",
                buttons: true,
                dangerMode: false,
            })
            .then(ok => {
                if (ok) {
                    window.location.href = '<?php echo base_url() ?>admin/hapusPustakawan/' + id_pustakawan;
                } else {
                    $(this).removeAttr('disabled')
                }
            })
    }
</script>