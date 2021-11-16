             <!-- Scroll to Top Button-->
             <a class="scroll-to-top rounded" href="#page-top">
                 <i class="fas fa-angle-up"></i>
             </a>
             <div class="modal fade" id="entrydata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                     <div class="modal-content">
                         <div class="row  p-4">
                             <div class="col">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <form>
                                         <div class="row">
                                             <div class="col">
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Nama</label>
                                                     <input type="text" class="form-control" id="nama" placeholder="Nama pasien">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Jangka Waktu</label>
                                                     <select class="form-control" id="jangka">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="5">Panjang</option>
                                                         <option value="2">Pendek</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">melahirkan</label>
                                                     <select class="form-control" id="lahir">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="3">Sudah</option>
                                                         <option value="1">Belum</option>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col">
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Menstruasi</label>
                                                     <select class="form-control" id="men">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="3">Ya</option>
                                                         <option value="5">Tidak</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Usia</label>
                                                     <select class="form-control" id="usia">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="2">Umur 18-25</option>
                                                         <option value="4">Umur 26-35</option>
                                                         <option value="5">Umur 36-60</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Penyaki</label>
                                                     <select class="form-control" id="sakit">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">Kangker payudara</option>
                                                         <option value="2">Diabetes</option>
                                                         <option value="4">Radang</option>
                                                         <option value="3">Sakit kuning</option>
                                                         <option value="5">Tidak ada</option>
                                                     </select>
                                                 </div>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     <button type="button" class="btn btn-primary btntambah">Tambah Data</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Logout Modal-->
             <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Yakin keluar akun?</h5>
                             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">×</span>
                             </button>
                         </div>
                         <div class="modal-body">Pilih "keluar" untuk melanjutkan keluar dari akunmu.</div>
                         <div class="modal-footer">
                             <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                             <a class="btn btn-primary" href="<?= base_url('logout') ?>">Keluar</a>
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
             <script src="<?= base_url('asset/vendor/chart.js/Chart.min.js') ?>"></script>
             <script src="<?= base_url('asset/js/demo/chart-pie-demo.js') ?>"></script>
             <!-- Custom scripts for all pages-->
             <script src="<?= base_url('asset/js/sb-admin-2.min.js') ?>"></script>
             <script src="<?= base_url('asset/js/hitung.js?v=2') ?>"></script>
             <script src="<?= base_url('asset/js/sweetalert2.js') ?>"></script>

             <!-- Page level plugins -->

             <script>
                 var tabelset;
                 $(document).ready(function() {

                     //datatables
                     tabelset = $('#dataset').DataTable({
                         "language": {
                             "emptyTable": "Tidak Ada Data",
                             "processing": "Memuat Data",
                             "zeroRecords": "Data Tidak Ditemukan"
                         },
                         //  "scrollX": true,
                         "processing": true, //Feature control the processing indicator.
                         "serverSide": true, //Feature control DataTables' server-side processing mode.
                         ajax: {
                             url: "<?php echo site_url('admin/getDataset') ?>",
                             type: "POST"
                         },
                         //  "columnDefs": [{
                         //      "targets": [0],
                         //      "className": "text-center",
                         //      "orderable": false
                         //  }]

                     });

                 });
             </script>
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
                             url: "<?php echo site_url('admin/getDatalatih') ?>",
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
                             url: "<?php echo site_url('admin/getDatauji') ?>",
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
                 var tabelriwayat;
                 $(document).ready(function() {

                     //datatables
                     tabelriwayat = $('#tabelriwayat').DataTable({
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
                             url: "<?php echo site_url('admin/getDataRiwayat') ?>",
                             type: "POST"
                         },

                     });

                 });
             </script>
             </body>

             </html>