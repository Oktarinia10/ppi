<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>
<!-- Bordered table -->
<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="mb-2 page-title">Master PIC</h2>
              <p class="card-text">Data user</p>
              <?= form_error('image', '<div class="error">', '</div>'); ?>
              <?= $this->session->flashdata('message'); ?>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                    <a href="<?=site_url('c_pic/tambah');?>" class="btn btn-primary mb-3">Tambah</a>
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                      <thead class="thead-dark">
                          <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Flag</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                         $no = 1;
                         foreach ($mstpic as $a) : ?>
                          <tr>  
                          <td><?= $no++; ?></td>
                         <td><?= $a['pic_nik']; ?></td>
                         <td>
                          <?php if ($a['pic_flag'] == '2') :?>
                            Rekap
                          <?php else: ?>
                            PIC
                          <?php endif; ?>
                        </td>
                         <td>
                         <a class="dropdown-item" href="<?= site_url("c_pic/edit/{$a['pic_id']}"); ?>">Edit</a> 
                         <form method="POST" action="<?= site_url("c_pic/hapus_data/{$a['pic_id']}"); ?>" class="mx-1 my-1">
                            <input name="_method" type="hidden" value="DELETE">
                            
                            <button type="submit" class="btn btn-sm btn-outline-primary dropdown-item remove-item-btn" data-toggle="tooltip" title="Delete">
                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted">
                                <span class="fe fe-trash-2 fe-16 align-middle"></span></i>
                            </button>
                        </form>
                          </td>
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