                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Riwayat Input</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Ekspor Dataset</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl mb-4">
                            <div class="card border-left-primary shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Hasil pengolahan data dari input pengguna
                                            </div>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"></div> -->
                                        </div>
                                        <!--<div class="col-md-2 mr-2">-->
                                        <!--    <a type="button" class="btn-success font-weight-bold text-white shadow py-2 btnhitung">-->
                                        <!--        Excel-->
                                        <!--    </a>-->
                                        <!--</div>-->
                                        <div class="col-md-2">
                                            <a type="submit" class="card bg-danger font-weight-bold text-white shadow  py-2 btnhitung" id="resetlog">
                                                Reset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card shadow tablecard">
                                <table id="tabelriwayat" class="table table-striped table-bordered display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>A1</td>
                                            <td>A2</td>
                                            <td>A3</td>
                                            <td>A4</td>
                                            <td>A5</td>
                                            <td>A6</td>
                                            <td>A7</td>
                                            <td>A8</td>
                                            <td>A9</td>
                                            <td>A10</td>
                                            <td>age</td>
                                            <td>gender</td>
                                            <td>jundice</td>
                                            <td>autism</td>
                                            <td>hasil</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modaldetriwayat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Result</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row p-4">
                                    <div class="col">
                                        <span id="waktulog"></span>
                                        <table class="table align-middle table-bordered border-secondary tableresultSet">
                                            <thead style="background-color:#e36f00;color:#ffffff">
                                                <tr>
                                                    <th>Aksi</th>
                                                    <th colspan='2'>Nilai ASD</th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td rowspan="2" style="vertical-align : middle;text-align:center;">Deteksi ASD</td>
                                                    <td>Normal</td>
                                                    <td>Autism</td>
                                                    <td rowspan=" 2" style="vertical-align : middle;text-align:center;" id="resultcell">-</td>
                                                </tr>
                                                <tr>
                                                    <td id="normalcell">0,000</td>
                                                    <td id="autiscell">0,000</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <!-- <span>Copyright &copy; Fanny Vega Variant 2021</span> -->
                        </div>
                    </div>
                </footer>

                </div>

                </div>