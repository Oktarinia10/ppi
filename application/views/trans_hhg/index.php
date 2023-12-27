<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>
<main role="main" class="main-content">
        
<a href="<?=site_url('c_trans_hhg/tambah');?>" class="btn btn-primary mb-3">Tambah</a>
<div class="container-fluid">
  <div class="card shadow mb-2">
    <div class="card-body">
      <p class="mb-2"><strong>Date & Time Pickers</strong></p>
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="date-input1">Date Picker</label>
              <div class="input-group">
              <input type="date" class="form-control drgpicker" id="trans_date" name="trans_date" aria-describedby="button-addon2">
                
            </div>
           
          </div>
          <div class="col-md-6">
            <button id="prosesFilter" class="btn btn-primary">Proses</button>
            <button id="cetak" class="btn btn-info" disabled>Excel</button>
            <button id="cetakPdf" class="btn btn-info" disabled>PDF</button>
            <button id="resetFilter" class="btn btn-danger">Reset</button>
          </div>
          
        </div>
      </div>
    </div> <!-- /.card-body -->
    lll
    <div class="card shadow">
                    <div class="card-body">
                    <a href="<?=site_url('c_pic/tambah');?>" class="btn btn-primary mb-3">Tambah</a>
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                      <thead class="thead-dark">
                          <tr>
                            <th>No</th>
                            <th>PIC NIK</th>
                            <th>PIC Flag</th>
                            <th>PIC St</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                     
                        </tbody>
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




