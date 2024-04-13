 <!-- Core -->
<script src="<?php echo base_url('./vendor/jquery/dist/jquery.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/popper.js/dist/umd/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('./vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('./vendor/headroom.js/dist/headroom.min.js');?>"></script>

<!-- Vendor JS -->
<script src="<?php echo base_url('./vendor/onscreen/dist/on-screen.umd.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/nouislider/distribute/nouislider.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/waypoints/lib/jquery.waypoints.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/jarallax/dist/jarallax.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/jquery.counterup/jquery.counterup.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/jquery-countdown/dist/jquery.countdown.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js');?>"></script>
<script src="<?php echo base_url('./vendor/prismjs/prism.js');?>"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Neumorphism JS -->
<script src="<?php echo base_url('./assets/js/neumorphism.js');?>"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src=""></script>

<script>
  // Initialize DataTable
  $(document).ready(function() {
    $('#pegawaiTable').DataTable();
  });
</script>

<script>
  $(document).ready(function(){
    $('.btn-plus').click(function(){
      $('#myModal').modal('show');
    });
  });
  </script>
