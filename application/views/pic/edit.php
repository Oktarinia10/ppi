<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Edit Data PIC</h2>
                <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form Edit data</strong>
                    </div>
                    <form action="<?php echo site_url("c_pic/proses_update/{$mstpic['pic_id']}"); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="pic_nik" value="<?php echo $mstpic['pic_nik']?>" required >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>PIC flag</label>
                                        <select name="pic_flag" class="form-control select2" id="simple-select1">
                                            <option>Pilih Flag</option>
                                            <option value="1"
                                                <?= $mstpic['pic_flag'] == '1' ? 'selected' : ''; ?>>
                                                1
                                            </option>
                                            <option value="2"
                                                <?= $mstpic['pic_flag'] == '2' ? 'selected' : ''; ?>>
                                                2
                                            </option>
                                        </select>                                    
                                    </div>
                                </div> <!-- /.col -->
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<?php $this->load->view('partials/footer.php'); ?>
