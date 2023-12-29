<?php $this->load->view('partials/header.php'); ?>
<?php $this->load->view('partials/top_menu.php'); ?>
<?php $this->load->view('partials/sidebar.php'); ?>
<main role="main" class="main-content">
        
<div class="container-fluid">
  <div class="card shadow mb-2">

    <div class="card shadow">
      <div class="card-body">
      <a href="<?=site_url('c_trans_hhg/tambah');?>" class="btn btn-primary mb-3">Tambah</a>
      <!-- table -->
      <table class="table table-bordered table-hover mb-0" id="dataTable-1">
    <thead class="thead-dark">
        <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">tgl</th>
            <th style="text-align: center;">Pertanyaan</th>
            <th style="text-align: center;">prwt</th>
            <th style="text-align: center;">farm</th>
        </tr>
    </thead>
    <?php foreach ($askHhgValue as $i => $a) : ?>
        <tr>
            <td><?= $i + 1; ?></td>
            <td><?= $a['trans_date']; ?></td>
            <td><?= $a['ask_name']; ?></td>
            <?php
            // data aktor
            $dataAktor = [
                'prwt' => '',
                'farm' => ''
            ];
            foreach ($denumValues as $denumValue) {
                // Memasukkan data ke dalam array aktor sesuai dengan kondisi
                if ($denumValue['ask_form_id'] == $a['ask_form_id'] && $denumValue['trans_date'] == $a['trans_date']) {
                    if ($denumValue['mst_ppa_id'] == 2) {
                        $dataAktor['prwt'] = '<p>' . $denumValue['num'] . '</p><p>' . $denumValue['denum'] . '</p>';
                    } elseif ($denumValue['mst_ppa_id'] == 3) {
                        $dataAktor['farm'] = '<p>' . $denumValue['num'] . '</p><p>' . $denumValue['denum'] . '</p>';
                    }
                }
            }
            ?>
            <td><?= $dataAktor['prwt']; ?></td>
            <td><?= $dataAktor['farm']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>




      </div>
    </div>
  </div> <!-- /.card -->
</div>

               
<?php $this->load->view('partials/footer.php'); ?>





