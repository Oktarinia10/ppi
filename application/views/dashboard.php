<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>
<main role="main" class="main-content">

<?php if(!empty($this->session->userdata('pic_flag') =='1')) : ?>
    <div class="container-fluid">
    <div class="p">Halo User/pic(1)</div>
    </div>

<?php elseif (!empty($this->session->userdata('pic_flag') =='2')) : ?>
    <div class="container-fluid">
    <div class="p">Halo Admin/rekap(2) 
      
    </div>
    </div>
<?php endif; ?>
</main>


<?php $this->load->view('partials/footer.php'); ?>

