<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
            <li class="<?php if ($active_menu == 'dashboard') { echo "active"; } else { echo ""; } ?>">
                <a href="<?php echo base_url('admin/dashboard') ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
            </li>
            <?php if ($_SESSION['akses'] == 1) { ?>
            <li class="<?php if ($active_menu == 'master_anggota' || $active_menu == 'tambah_anggota' || $active_menu == 'edit_anggota') 
            { echo "active"; } else { echo ""; } ?>">
                <a href="<?php echo base_url('admin/masterAnggota') ?>"><span class="glyphicon glyphicon-user"></span> Data Master Anggota</a>
            </li>
            <li class="<?php if ($active_menu == 'master_buku' || $active_menu == 'tambah_buku' || $active_menu == 'edit_buku') 
            { echo "active"; } else { echo ""; } ?>">
                <a href="<?php echo base_url('admin/masterBuku') ?>"><span class="glyphicon glyphicon-book"></span> Data Master Buku</a>
            </li>
            <li class="<?php if ($active_menu == 'master_kategori' || $active_menu == 'tambah_kategori' || $active_menu == 'edit_kategori') 
            { echo "active"; } else { echo ""; } ?>">
                <a href="<?php echo base_url('admin/masterKategori') ?>"><span class="glyphicon glyphicon-list-alt"></span> Data Master Kategori</a>
            </li>
            <li class="<?php if ($active_menu == 'master_pustakawan' || $active_menu == 'tambah_pustakawan' || $active_menu == 'edit_pustakawan') 
            { echo "active"; } else { echo ""; } ?>">
                <a href="<?php echo base_url('admin/masterPustakawan') ?>"><span class="glyphicon glyphicon-user"></span> Data Master Pustakawan</a>
            </li>
        <?php } ?>
        <li class="parent">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> Transaksi <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li <?php if ($active_menu == 'pinjam_buku') { echo "active"; } else { echo ""; } ?>>
                    <a class="" href="<?php echo base_url('transaksi/pinjam_buku') ?>">
                        <span class="glyphicon glyphicon-share-alt"></span> Peminjaman Buku
                    </a>
                </li>
                <li>
                    <a class="" href="#">
                        <span class="glyphicon glyphicon-share-alt"></span> Pengembalian Buku
                    </a>
                </li>
            </ul>
        </li>
        <li role="presentation" class="divider"></li>
        <li><a href="<?php echo base_url('admin/gantiPassword') ?>"><span class="glyphicon glyphicon-wrench"></span>Ganti Password</a></li>
    </ul>
</div>
<!--/.sidebar-->