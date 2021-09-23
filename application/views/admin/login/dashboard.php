<?php
$id = $this->session->userdata('idpustakawan');
$enkrip = $this->session->userdata('enid');


if ($id == "" || $enkrip != sha1($id)) {
    ?>
    <script type="text/javascript">
        alert("Session Habis Silahkan Login")
        document.location = "<?php echo base_url('admin/login')?>";
    </script>
    <?php
} else {
    $sql = $this->ModelAdmin->getWhere(['id_pustakawan' => $id]);
    $data = $sql->row_array();
    ?>
    <span><b>Dashboard</b></span><br/><br/>
    Nama User = <?php echo $data['nama_pustakawan']; ?>
<?php }?>