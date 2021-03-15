             <!-- Scroll to Top Button-->
             <a class="scroll-to-top rounded" href="#page-top">
                 <i class="fas fa-angle-up"></i>
             </a>

             <!-- Logout Modal-->
             <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                             </button>
                         </div>
                         <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                         <div class="modal-footer">
                             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                             <a class="btn btn-primary" href="login.html">Logout</a>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Bootstrap core JavaScript-->
             <script src="<?= base_url('asset/js/jquery-3.5.1.min.js'); ?>"></script>

             <script src="<?= base_url('asset/bootstrap/js/bootstrap.min.js'); ?>"></script>
             <script src="<?= base_url('asset/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

             <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.23/b-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>
             <!-- Core plugin JavaScript-->
             <script src="<?= base_url('asset/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

             <!-- Custom scripts for all pages-->
             <script src="<?= base_url('asset/js/sb-admin-2.min.js') ?>"></script>
             <script src="<?= base_url('asset/js/hitung.js') ?>"></script>

             <!-- Page level plugins -->

             <script>
                 var tablelatih;
                 $(document).ready(function() {

                     //datatables
                     tablelatih = $('#tablelatih').DataTable({
                         "language": {
                             "emptyTable": "Tidak Ada Data",
                             "processing": "Memuat Data",
                             "zeroRecords": "Data Tidak Ditemukan"
                         },
                         "scrollX": true,
                         "processing": true, //Feature control the processing indicator.
                         "serverSide": true, //Feature control DataTables' server-side processing mode.
                         "order": [],
                         ajax: {
                             url: "<?php echo site_url('pengguna/getDataset') ?>",
                             type: "POST"
                         },
                         "columnDefs": [{
                             "targets": [0],
                             "className": "text-center",
                             "orderable": false
                         }]

                     });

                 });
             </script>
             <script>
                 var tableuji;
                 $(document).ready(function() {

                     //datatables
                     tableuji = $('#tableluji').DataTable({
                         "language": {
                             "emptyTable": "Tidak Ada Data",
                             "processing": "Memuat Data",
                             "zeroRecords": "Data Tidak Ditemukan"
                         },
                         "scrollX": true,
                         "processing": true, //Feature control the processing indicator.
                         "serverSide": true, //Feature control DataTables' server-side processing mode.
                         "order": [],
                         ajax: {
                             url: "<?php echo site_url('pengguna/getDatauji') ?>",
                             type: "POST"
                         },
                         "columnDefs": [{
                             "targets": [0],
                             "className": "text-center",
                             "orderable": false
                         }]

                     });

                 });
             </script>
             </body>

             </html>