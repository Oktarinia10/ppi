<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Edit Data Ask Form</h2>
                <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form Edit data</strong>
                    </div>
                    <form action="<?php echo site_url("c_ask_form/proses_update/{$askform['ask_form_id']}"); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Ask Name</label>
                                        <input type="text" class="form-control" name="ask_name" value="<?php echo $askform['ask_name']?>" required >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Master Form</label>
                                        <select class="form-control" name="mst_form_id" required>
                                    <?php foreach ($mstform as $p) : ?>
                                        <option <?= ($p['mst_form_id'] == $askform['mst_form_id'] ? 'selected=""' : '') ?> value="<?php echo $p['mst_form_id']; ?>"><?php echo $p['mst_name']; ?></option>
                                    <?php endforeach ?>
                                </select>                                 
                                    </div>
                                </div> <!-- /.col -->
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?=site_url('c_ask_form');?>" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

<?php $this->load->view('partials/footer.php'); ?>
