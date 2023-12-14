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
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ask hhg 1</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" placeholder="num">
                        </div>
                      </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" placeholder="denum">
                        </div>
                      </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                     
                      
                      
                    </div> <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group mb-3">
                        <label>Text</label>
                        <input type="text" id="simpleinput" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label>Text</label>
                        <input type="text" id="simpleinput" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label>Text</label>
                        <input type="text" id="simpleinput" class="form-control">
                      </div>
                      <div class="form-group mb-3">
                        <label>Text</label>
                        <input type="text" id="simpleinput" class="form-control">
                      </div>
                    </div>
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
