<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Tambah Data</h2>
                <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form tambah data</strong>
                    </div>
                    <form action="<?php echo site_url('c_master_ppa/proses_tambah'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>PPA Name</label>
                                        <input type="text" class="form-control" name="mst_ppa_name" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Master PPA st</label>
                                        <input type="text" class="form-control" name="mst_ppa_st" value="1">
                                    </div>
                                </div> <!-- /.col -->
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?=site_url('c_master_ppa');?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<?php $this->load->view('partials/footer.php'); ?>
