                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Latih & Uji</h1>
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
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Name Class</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= ($class['COLUMN_NAME'] == null) ? "0" : $class['COLUMN_NAME']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4 ml-auto ">
                            <div class="card h-100 w-100 boxbtn">
                                <a href="#" class="btn-secondary font-weight-bold text-white shadow w-100 h-75 py-2 btnhitung btnatas" id="datalatih">
                                    <i class="fas fa-eye-slash"></i>
                                </a>
                                <div class="row">
                                    <div class="col btn-area">
                                        <a href="#" class="btn-success font-weight-bold text-white shadow  py-2 btnhitung" id="datauji">
                                            <span>Data Uji</span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row tabeldatalatih">
                        <div class="col-xl mb-4">
                            <div class="card shadow tablecard">
                                <table id="tablelatih" class="table table-striped table-bordered display nowrap" width="100%" cellspacing="0">
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
                                            <td>Class</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row tabeldatauji" style="visibility:hidden; display:none">
                        <div class="col-xl mb-4">
                            <div class="card shadow tablecard">
                                <table id="tableluji" class="table table-striped table-bordered display nowrap" width="100%" cellspacing="0">
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
                                            <td>Class</td>
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

                </div>

                </div>