<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>
<main role="main" class="main-content">
        
<div class="container-fluid">
  <div class="card shadow mb-2">

    <div class="card shadow">
      <div class="card-body">
      <a href="<?=site_url('c_trans_hhg/tambah');?>" class="btn btn-primary mb-3">Tambah</a>
      <!-- table -->
      <table class="table table-bordered table-hover mb-0" id="dataTable-1">
        <thead class="thead-dark">
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Tgl</th>
                <th style="text-align: center;">prwt</th>
                <th style="text-align: center;">farm</th> 
            </tr>
        

        </thead>
        <?php $no = 0; foreach 
        ($askHhgValue as $a) :?> 
            
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $a['ask_name']; ?></td>
                
            <?php foreach ($valueHhgPrwt as $p => $key) : var_dump($p)?> 
            <h2><?= $no; ?></h2>

                <?php if ($no == $key[1]) :?>
                <td>
                    <p><?= $p['num']; ?></p>
                    <p><?= $p['denum']; ?></p>
                </td>
                <?php endif ; ?>
            <?php endforeach ?>

            <?php foreach ($valueHhgFarm as $f => $key):?> 
                <?php if ($no == $key) :?>
                    <h2>kks</h2>

                <td>
                    <p><?= $f['num']; ?></p>
                    <p><?= $f['denum']; ?></p>
                </td>
            <?php endif ; ?>

            <?php endforeach ?>
            
            </tr>
          <?php endforeach ?>
        </table>


      </div>
    </div>
  </div> <!-- /.card -->
</div>

               
<?php $this->load->view('partials/footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Ketika tombol "Proses" ditekan
    $('#prosesFilter').on('click', function(event) {
        event.preventDefault();
        // Ambil nilai dari form
        var th_masuk = $('#th_masuk').val();
        // Tambahkan parameter pada URL berdasarkan nilai-nilai form
        if (th_masuk != '') {
            <?php if(has_permission('admin')|| has_permission('koor-mbkm')): ?>
            var url = "<?php echo base_url('mbkm/mbkmFix/filter-adm'); ?>" +
                "/" +
                th_masuk;
            <?php elseif(has_permission('dosen')): ?>
            var url = "<?php echo base_url('mbkm/mbkmFix/filter-dsn'); ?>" + "/" +
                th_masuk;
            <?php endif; ?>
        }

        // Muat data dengan menggunakan AJAX
        $.ajax({
            url: url,
            method: "GET",
            dataType: 'json',
            success: function(data) {
                $('button#cetak').prop('disabled', false)
                $('button#cetakPdf').prop('disabled', false)
                var dataAwal = data;
                // Tampilkan data ke dalam tabel
                $('#dataTable-1').DataTable().clear().destroy();
                // tambahkan baris kode berikut untuk menambahkan data ke dalam tabel
                $.each(data, function(i, item) {
                    var url_detail = '<?= base_url('mbkm/mbkmFix/detail'); ?>' +
                        '/' + item.id_mbkm_fix;
                    var url_delete = '<?= base_url('mbkm/mbkmFix/hapus'); ?>' +
                        '/' + item.id_mbkm_fix;
                    var url_edit = '<?= base_url('mbkm/mbkmFix/edit'); ?>' + '/' +
                        item.id_mbkm_fix;
                    var url_bukti =
                        '<?= base_url('mbkm/mbkmFix/download-bukti'); ?>' + '/' +
                        item.id_mbkm_fix;
                    var url_lap =
                        '<?= base_url('mbkm/mbkmFix/download-lap-akhir'); ?>' +
                        '/' +
                        item.id_mbkm_fix;


                    $('#dataTable-1 tbody')
                    <?php if(has_permission('admin')|| has_permission('koor-mbkm')): ?>
                        .append('<tr><td>' + (i++ + 1) +
                            '</td><td>' +
                            item.nm_mhs + '</td><td>' + item.nm_staf +
                            '</td><td>' + ((item.id_mitra === '') ?
                                '<span class="badge badge-warning">Belum Update</span>' :
                                item.nm_mitra
                            ) + '</td><td>' +
                            '<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="' +
                            url_detail +
                            '">Detail</a><a class="dropdown-item" href="' +
                            url_edit +
                            '">Edit</a><form method="POST" action="' +
                            url_delete +
                            '"><input name="_method" type="hidden" value="DELETE"><button type="submit" class="dropdown-item remove-item-btn" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</button></form>' +
                            '</td></tr>');

                    <?php elseif(has_permission('dosen')): ?>
                        .append('<tr><td>' + (i++ + 1) +
                            '</td><td>' +
                            item.nm_mhs + '</td><td>' +
                            ((item.nm_mitra === '') ?
                                '<span class="badge badge-warning">Belum Update</span>' :
                                item.nm_mitra
                            ) + '</td><td>' +
                            '<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="' +
                            url_detail +
                            '">Detail</a></form>' +
                            '</td></tr>');
                    <?php endif; ?>
                });
                $('#dataTable-1').DataTable({
                    columnDefs: [{
                        targets: [0, 1, 2, 3, 4, 5, 6],
                        orderable: true,
                    }],
                });
            },
        });
    });

    $(document).ready(function() {
        $('#resetFilter').click(function() {
            $('#th_masuk').val(null).trigger('change');

            $.ajax({
                url: '<?php echo base_url('mbkm/msib');?>',
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    // Tampilkan data ke dalam tabel
                    $('#dataTable-1').DataTable().clear().destroy();
                    // tambahkan baris kode berikut untuk menambahkan data ke dalam tabel
                    $.each(data, function(i, item) {
                        var url_detail =
                            '<?= base_url('mbkm/msib/detail'); ?>' +
                            '/' + item.id_msib;
                        var url_delete =
                            '<?= base_url('mbkm/msib/hapus'); ?>' +
                            '/' + item.id_msib;
                        var url_edit =
                            '<?= base_url('mbkm/msib/edit'); ?>' +
                            '/' +
                            item.id_msib;
                        var url_unduh_prop =
                            '<?= base_url('mbkm/msib/download-proposal/'); ?>' +
                            '/' + item.id_msib;
                        var url_unduh_lap =
                            '<?= base_url('mbkm/msib/download-proposal/'); ?>' +
                            '/' + item.id_msib;
                        var url_disetujui =
                            "<?= base_url('mbkm/msib/dosen/verifikasi-disetujui'); ?>" +
                            "/" + item.id_msib;
                        var url_tidak_disetujui =
                            "<?= base_url('mbkm/msib/dosen/verifikasi-tidak-disetujui'); ?>" +
                            "/" + item.id_msib;

                        $('#dataTable-1 tbody')
                        <?php if(has_permission('admin')|| has_permission('koor-mbkm')): ?>
                            .append('<tr><td>' + ((i++) + 1) +
                                '</td><td>' +
                                item.nm_mhs + '</td><td>' + item
                                .nm_staf +
                                '</td><td>' + item
                                .nama_instansi +
                                '</td><td>' + ((item.proposal !=
                                        '') ?
                                    '<a class="my-1 mx-1 btn btn-sm btn-outline-success" data-toggle="modal" href="' +
                                    url_unduh_prop +
                                    '"><span class="fe fe-check fe-16 align-middle"></a>' :
                                    '<span class="badge badge-danger">Belum Upload</span>'
                                ) + '</td><td>' +
                                '<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="' +
                                url_detail +
                                '">Detail</a><a class="dropdown-item" href="' +
                                url_edit +
                                '">Edit</a><form method="POST" action="' +
                                url_delete +
                                '"><input name="_method" type="hidden" value="DELETE"><button type="submit" class="dropdown-item remove-item-btn" data-toggle="tooltip" title="Delete"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>Delete</button></form>' +
                                '</td></tr>');
                        <?php elseif(has_permission('dosen')): ?>
                            .append('<tr><td>' + ((i++) + 1) +
                                '</td><td>' +
                                item
                                .nm_mhs + '</td><td>' + item
                                .nama_instansi +
                                '</td><td>' + item
                                .status_lolos +
                                '</td></tr>');
                        <?php endif; ?>
                    });
                    $('#dataTable-1').DataTable({
                        columnDefs: [{
                            targets: [0, 1, 2, 3, 4, 5,
                                6
                            ],
                            orderable: true,
                        }],
                    });
                },
            });
        });
    });
    $('#cetak').on('click', function(event) {
        event.preventDefault();
        var th_masuk = $('#th_masuk').val();

        if (th_masuk != '') {
            var url = "<?= base_url('mbkm/mbkmFix/cetak-excel/');?>" + "/" +
                th_masuk;
            window.open(url);
        }
    });
    $('#cetakPdf').on('click', function(event) {
        event.preventDefault();
        var th_masuk = $('#th_masuk').val();

        if (th_masuk != '') {
            var url = "<?= base_url('mbkm/mbkmFix/cetak-pdf/');?>" + "/" +
                th_masuk;
            window.open(url);
        }
    });
});
</script>




