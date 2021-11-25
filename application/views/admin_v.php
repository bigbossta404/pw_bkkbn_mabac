                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Total Data</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="jmldata"><?= $datalatih['jml_data'] ?> Data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-database fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Total Kriteria</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $atribut['jml_atrib'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col d-flex align-items-center justify-align-center">
                                            <a href="#" data-toggle="modal" data-target="#entrydata" class="btn btn-primary mr-2"><i class="fas fa-plus-circle"></i> Tambah data</a>
                                            <a href="<?= base_url('hitung') ?>" class="btn btn-warning mr-2"><i class="fas fa-calculator"></i></i> Hitung Ranking</a>
                                            <a href="<?= base_url('eksporBobot') ?>" class="btn btn-success"><i class="fas fa-file-excel"></i></i> Ekspor Excel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-md-6 mb-4 ml-auto d-flex align-items-center">
                            <a href="<?= base_url('data_uji') ?>" class="card bg-primary font-weight-bold text-white shadow w-100 h-75 py-2 btnhitung btnatas" id="cekdata">
                                Data Latih & Uji
                            </a>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card shadow tablecard">
                                <table id="dataset" class="table table-striped table-bordered display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Jangka Waktu</th>
                                            <th>Melahirkan</th>
                                            <th>Menstruasi</th>
                                            <th>Usia</th>
                                            <th>Penyakit</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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