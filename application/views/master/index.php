<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>
<!-- Bordered table -->
<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="mb-2 page-title">Master Form</h2>
              <p class="card-text">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table. </p>
              <?= form_error('image', '<div class="error">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                    <a href="<?=site_url('c_master/tambah');?>" class="btn btn-primary mb-3">Tambah</a>
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Mst Name</th>
                            <th>Mst form st</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                         $no = 1;
                         foreach ($mstform as $a) : ?>
                          <tr>
                          <td><?= $no++; ?></td>
                         <td><?= $a['mst_name']; ?></td>
                         <td><?= $a['mst_form_st']; ?></td>
                         <td><a class="dropdown-item" href="<?= site_url("c_master/hapus_data/{$a['mst_form_id']}"); ?>">Hapus</a>
                         <a class="dropdown-item" href="<?= site_url("c_master/edit/{$a['mst_form_id']}"); ?>">Edit</a> </td>

                          </tr>
                        <?php endforeach?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        
</main> <!-- .container-fluid -->

<?php $this->load->view('partials/footer.php'); ?>