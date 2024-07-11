 <!-- Core -->
 <script src="<?php echo base_url('./vendor/jquery/dist/jquery.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/popper.js/dist/umd/popper.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/headroom.js/dist/headroom.min.js'); ?>"></script>

 <!-- Vendor JS -->
 <script src="<?php echo base_url('./vendor/onscreen/dist/on-screen.umd.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/nouislider/distribute/nouislider.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/waypoints/lib/jquery.waypoints.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/jarallax/dist/jarallax.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/jquery.counterup/jquery.counterup.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/jquery-countdown/dist/jquery.countdown.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js'); ?>"></script>
 <script src="<?php echo base_url('./vendor/prismjs/prism.js'); ?>"></script>

 <script async defer src="https://buttons.github.io/buttons.js"></script>

 <!-- Neumorphism JS -->
 <script src="<?php echo base_url('./assets/js/neumorphism.js'); ?>"></script>

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
     document.addEventListener('DOMContentLoaded', function() {
         const editButtons = document.querySelectorAll('.edit-btn');
         editButtons.forEach(button => {
             button.addEventListener('click', function(event) {
                 event.preventDefault();
                 const url = this.getAttribute('href');
                 Swal.fire({
                     title: 'Anda yakin ingin mengedit data?',
                     text: "Anda akan dialihkan ke halaman edit.",
                     icon: 'question',
                     showCancelButton: true,
                     confirmButtonColor: '#d33',
                     cancelButtonColor: '#3085d6',
                     confirmButtonText: 'Ya, edit!',
                     cancelButtonText: 'Batal'
                 }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = url;
                     }
                 });
             });
         });
     });
 </script>

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const deleteButtons = document.querySelectorAll('.delete-btn');
         deleteButtons.forEach(button => {
             button.addEventListener('click', function(event) {
                 event.preventDefault();
                 const url = this.getAttribute('href');

                 Swal.fire({
                     title: 'Apakah Anda yakin?',
                     text: "Data yang dihapus tidak dapat dikembalikan!",
                     icon: 'warning',
                     showCancelButton: true,
                     confirmButtonColor: '#d33',
                     cancelButtonColor: '#3085d6',
                     confirmButtonText: 'Ya, hapus!',
                     cancelButtonText: 'Batal'
                 }).then((result) => {
                     if (result.isConfirmed) {
                         window.location.href = url;
                     }
                 });
             });
         });
     });
 </script>

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         <?php if (session()->has('success')) : ?>
             Swal.fire({
                 icon: 'success',
                 title: 'Success',
                 text: '<?php echo session()->getFlashdata("success"); ?>',
                 timer: 1000,
                 showConfirmButton: false
             });
         <?php endif ?>

         <?php if (session()->has('update')) : ?>
             Swal.fire({
                 icon: 'update',
                 title: 'update',
                 text: '<?php echo session()->getFlashdata("update"); ?>',
                 timer: 1000,
                 showConfirmButton: false
             });
         <?php endif ?>

         <?php if (session()->has('error')) : ?>
             Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: '<?php echo session()->getFlashdata("error"); ?>',
                 timer: 1000,
                 showConfirmButton: false
             });
         <?php endif ?>
     });
 </script>