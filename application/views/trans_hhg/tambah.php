<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>
<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Trans Form Data</h2>
              <p class="text-muted">Trans Form</p>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Form tambah data</strong>
                </div>
                <form action="<?php echo site_url('c_trans_hhg/proses_tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                    <?php foreach ($askHhg as $p): ?>
                        <?php if ($p['ask_name']): ?>
                            <div class="form-group row">
                                <input type="hidden" name="ask_form_id[]" value="<?= $p['ask_form_id']; ?>">
                                <label class="col-sm-3 col-form-label"><?= $p['ask_name']; ?></label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="num[]" placeholder="num" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="denum[]" placeholder="denum" required>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="simple-select1">Sub Divisi</label>
                        <div class="col-sm-5">
                        <select class="form-control select2" name="sub_div_id" id="simple-select1" required>
                          <option value="">--Pilih Sub Divisi--</option>
                          <?php foreach ($subDiv as $s): ?>
                          <option value="<?= $s['sub_div_id']; ?>"><?= $s['sub_div_name']; ?></option>
                          <?php endforeach ?>
                        </select>
                          </div>
                        </div>
                       
                        <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="simple-select1">Master PPA</label>
                        <div class="col-sm-5">
                        <select class="form-control select2" name="mst_ppa_id" id="simple-select1" required>
                          <option value="">--Pilih PPA--</option>
                          <?php foreach ($mstPPA as $s): ?>
                          <option value="<?= $s['mst_ppa_id']; ?>"><?= $s['mst_ppa_name']; ?></option>
                          <?php endforeach ?>
                        </select>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Trans date actual</label>
                            <div class="col-sm-5">
                            <input type="date" name="trans_date_actual" class="form-control">
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Moment</label>
                            <div class="col-sm-5">
                            <select class="form-control select2" name="moment_ke" id="simple-select1" required>
                              <option>Pilih moment</option>
                              <option value="1" <?= set_select('moment_ke', '1') ?>>1 </option>
                              <option value="2" <?= set_select('moment_ke', '2') ?>>2 </option>
                              <option value="3" <?= set_select('moment_ke', '3') ?>>3 </option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Action ke</label>
                            <div class="col-sm-5">
                            <select class="form-control select2" name="action_ke" id="simple-select1" required>
                              <option>Pilih Action</option>
                              <option value="1" <?= set_select('action_ke', '1') ?>>1 </option>
                              <option value="2" <?= set_select('action_ke', '2') ?>>2 </option>
                              <option value="3" <?= set_select('action_ke', '3') ?>>3 </option>
                              <option value="4" <?= set_select('action_ke', '4') ?>>4 </option>
                              <option value="5" <?= set_select('action_ke', '5') ?>>5 </option>
                            </select>
                            </div>
                        </div>
                        

                    
                        <div class="form-group row">
                            <div class="col-sm-5">
                            <input type="text" class="form-control" name="pic_nik" hidden
                            value="<?= $this->session->userdata('kary_nik') ?>">
                            </div>
                        </div>
                   
                    </div> 
                    <!-- /.col -->
                    
                  </div>
                  <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
              </div> <!-- / .card -->
            </form>
             
                
               
             
                
               
                
               
          
              
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      
        
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
<?php $this->load->view('partials/footer.php'); ?>
