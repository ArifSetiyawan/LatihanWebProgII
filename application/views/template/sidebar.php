<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li class="<?php if ($active_menu == 'dashboard') { echo "active"; } else { echo ""; } ?>">
            <a href="<?php echo base_url('admin/dashboard') ?>"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
        </li>
        <li class="<?php if ($active_menu == 'master_anggota' || $active_menu == 'tambah_anggota' || $active_menu == 'edit_anggota') 
        { echo "active"; } else { echo ""; } ?>">
            <a href="<?php echo base_url('admin/masterAnggota') ?>"><span class="glyphicon glyphicon-user"></span> Data Master Anggota</a>
        </li>
        <li>
            <a href="charts.html"><span class="glyphicon glyphicon-stats"></span> Data Master Buku</a>
        </li>
        <li class="<?php if ($active_menu == 'master_kategori' || $active_menu == 'tambah_kategori' || $active_menu == 'edit_kategori') 
        { echo "active"; } else { echo ""; } ?>">
            <a href="<?php echo base_url('admin/masterKategori') ?>"><span class="glyphicon glyphicon-list-alt"></span> Data Master Kategori</a>
        </li>
        <li><a href="forms.html"><span class="glyphicon glyphicon-user"></span> Data Master Pustakawan</a></li>
        <li class="parent ">
            <a href="#">
                <span class="glyphicon glyphicon-list"></span> Transaksi <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="#">
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
        <li><a href="<?php echo base_url('admin/logout') ?>"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
</div>
<!--/.sidebar-->