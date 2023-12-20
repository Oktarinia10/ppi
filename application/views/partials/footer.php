    <!-- <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/popper.min.js"></script>
    <script src="../../public/js/moment.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/simplebar.min.js"></script>
    <script src='../../public/js/daterangepicker.js'></script>
    <script src='../../public/js/jquery.stickOnScroll.js'></script>
    <script src="../../public/js/tinycolor-min.js"></script>
    <script src="../../public/js/config.js"></script>
    <script src='../../public/js/jquery.dataTables.min.js'></script>
    <script src='../../public/js/dataTables.bootstrap4.min.js'></script>

    <script src="../../public/js/apps.js"></script> -->
    
    <script type="text/javascript" src="<?=base_url('assets/');?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/popper.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/moment.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/simplebar.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/daterangepicker.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/jquery.stickOnScroll.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/tinycolor-min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/config.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/d3.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/topojson.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/datamaps.all.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/datamaps-zoomto.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/datamaps.custom.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

    <script type="text/javascript" src="<?=base_url('assets/');?>js/gauge.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/apexcharts.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/apexcharts.custom.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/select2.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/jquery.steps.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/jquery.timepicker.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/dropzone.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/uppy.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/quill.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/');?>js/apps.js"></script>

    <script>
      $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [16, 32, 64, -1],
          [16, 32, 64, "All"]
        ]
      });
    </script>

<script>
// Alert Konfirmasi Hapus data
$(document).ready(function() {
    $(document).on('click', '.remove-item-btn', function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        return Swal.fire({
            title: 'Anda yakin ingin menghapus ?',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>

    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>