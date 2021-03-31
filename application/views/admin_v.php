                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dataset Autism</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Ekspor Dataset</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Dataset</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $datalatih['jml_data_latih'] ?> Data</div>
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
                                                Total Atribut</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $atribut['jml_atrib'] ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-table fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4 ml-auto d-flex align-items-center">
                            <!-- <div class="card w-100 boxbtn"> -->
                            <a href="<?= base_url('data_uji') ?>" class="card bg-primary font-weight-bold text-white shadow w-100 h-75 py-2 btnhitung btnatas" id="cekdata">
                                Data Latih & Uji
                            </a>

                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card shadow tablecard">
                                <table id="dataset" class="table table-striped table-bordered display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td>#</td>
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
                                            <td>class</td>
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