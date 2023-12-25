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
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                    <?php foreach ($askHhg as $p): ?>
                        <div class="form-group row">
                          <input type="hidden" name="ask_form_id[]" value="<?= $p['ask_form_id']; ?>">
                          <?php if ($p['ask_name']): ?>
                              <label class="col-sm-3 col-form-label"><?= $p['ask_name']; ?></label>
                              <div class="col-sm-5">
                              <input type="number" class="form-control" value="num[]" placeholder="num" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label"></label>
                              <div class="col-sm-5">
                              <input type="number" class="form-control" placeholder="denum" value="denum[]" required>
                          </div>
                        </div>
                        <?php endif ?>
                        <?php endforeach ?>
                        




                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sub Div</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                         
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ask form id</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">mst ppa id</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">trans date actual</label>
                            <div class="col-sm-5">
                            <input type="date" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">trans date</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">trans hour</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">pic nik</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" 
                            value="<?= $this->session->userdata('kary_name') ?>">
                            </div>
                        </div>
                   
                    </div> 
                    <!-- /.col -->
                    
                  </div>
                  <button type="button" class="btn mb-2 btn-primary">Simpan</button>
                </div>
              </div> <!-- / .card -->
             
                
               
             
                
               
                
               
          
              
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      
        
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
<?php $this->load->view('partials/footer.php'); ?>
