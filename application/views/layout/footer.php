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
                                                     <label for="exampleFormControlSelect1">Sedang Menyusui?</label>
                                                     <select class="form-control" id="menyusui">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">Iya</option>
                                                         <option value="3">Tidak</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Pernah/Sedang Hamil</label>
                                                     <select class="form-control" id="hamil">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">Iya</option>
                                                         <option value="3">Tidak</option>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col">
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Keadaan Umum</label>
                                                     <select class="form-control" id="ku">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="3">Baik</option>
                                                         <option value="2">Menengah</option>
                                                         <option value="1">Kurang</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Penyakit</label>
                                                     <select class="form-control" id="penyakit">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">Radang</option>
                                                         <option value="2">Keputihan</option>
                                                         <option value="3">Sakit Kuning</option>
                                                         <option value="4">Tumor</option>
                                                         <option value="5">Tidak Ada</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Berat Badan</label>
                                                     <select class="form-control" id="bb">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">40-50 Kg</option>
                                                         <option value="3">51-60 Kg</option>
                                                         <option value="2">61-70++ Kg</option>
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
             <div class="modal fade" id="updatedata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                     <div class="modal-content">
                         <div class="row  p-4">
                             <div class="col">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">Update Data Kriteria</h5>
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
                                                     <input type="text" class="form-control" id="namaupdate" placeholder="Nama pasien">
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Sedang Menyusui?</label>
                                                     <select class="form-control" id="menyusuiupdate">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">Iya</option>
                                                         <option value="3">Tidak</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Pernah/Sedang Hamil</label>
                                                     <select class="form-control" id="hamilupdate">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">Iya</option>
                                                         <option value="3">Tidak</option>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="col">
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Keadaan Umum</label>
                                                     <select class="form-control" id="kuupdate">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="3">Baik</option>
                                                         <option value="2">Menengah</option>
                                                         <option value="1">Kurang</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Penyakit</label>
                                                     <select class="form-control" id="penyakitupdate">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">Radang</option>
                                                         <option value="2">Keputihan</option>
                                                         <option value="3">Sakit Kuning</option>
                                                         <option value="4">Tumor</option>
                                                         <option value="5">Tidak Ada</option>
                                                     </select>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="exampleFormControlSelect1">Berat Badan</label>
                                                     <select class="form-control" id="bbupdate">
                                                         <option value selected>-- Pilih --</option>
                                                         <option value="1">40-50 Kg</option>
                                                         <option value="3">51-60 Kg</option>
                                                         <option value="2">61-70++ Kg</option>
                                                     </select>
                                                 </div>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                     <button type="button" class="btn btn-primary saveupdate">Simpan Data</button>
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
                         "columnDefs": [{
                             "targets": [0, 7],
                             "className": "text-center",
                             "orderable": false
                         }]

                     });

                 });
             </script>
             <script>
                 var tabelrank;
                 $(document).ready(function() {

                     //datatables
                     tabelrank = $('#datarank').DataTable({
                         "language": {
                             "emptyTable": "Tidak Ada Data",
                             "processing": "Memuat Data",
                             "zeroRecords": "Data Tidak Ditemukan"
                         },
                         "order": [
                             [2, "desc"]
                         ]

                     });

                 });
             </script>
             </body>

             </html>