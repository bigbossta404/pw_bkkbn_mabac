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
                    <div class="row mb-4 resuji" style="visibility:hidden; display:none">
                        <div class="col-xl m-10">
                            <div class="card col p-10 shadow card_res">
                                <a href="#" class="close_res"><i class="fas fa-times"></i></a>
                                <div class="res_box text">
                                    <table class="table res_uji_tab">
                                        <thead>
                                            <tr>
                                                <th scope="col">A1</th>
                                                <th scope="col">Res_A1</th>
                                                <th scope="col">Res_A2</th>
                                                <th scope="col">Res_A3</th>
                                                <th scope="col">Res_A4</th>
                                                <th scope="col">Res_A5</th>
                                                <th scope="col">Res_A6</th>
                                                <th scope="col">Res_A7</th>
                                                <th scope="col">Res_A8</th>
                                                <th scope="col">Res_A9</th>
                                                <th scope="col">Res_A10</th>
                                            </tr>
                                        </thead>
                                        <tbody id='tbodyres'>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row resuji " style="visibility:hidden; display:none">
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card p-10 shadow card_gen">
                                <table class="table res_gen_tab">
                                    <thead>
                                        <tr>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Res_Gender</th>
                                        </tr>
                                    </thead>
                                    <tbody id='tbodyresgen'>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card p-10 shadow card_gen">
                                <table class="table res_gen_tab">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jundice</th>
                                            <th scope="col">Res_Jundice</th>
                                        </tr>
                                    </thead>
                                    <tbody id='tbodyresjun'>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card p-10 shadow card_gen">
                                <table class="table res_autis_tab">
                                    <thead>
                                        <tr>
                                            <th scope="col">Autism</th>
                                            <th scope="col">Res_Autis_Tree</th>
                                        </tr>
                                    </thead>
                                    <tbody id='tbodyresautis'>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row resuji" style="visibility:hidden; display:none">
                        <div class="col-xl col-md-6 mb-4">
                            <div class="card p-10 shadow card_gen">
                                <div class="table-responsive">
                                    <table class="table res_age_tab">
                                        <thead>
                                            <tr>
                                                <th scope="col">Age</th>
                                                <th scope="col">Res_4</th>
                                                <th scope="col">Res_5</th>
                                                <th scope="col">Res_6</th>
                                                <th scope="col">Res_7</th>
                                                <th scope="col">Res_8</th>
                                                <th scope="col">Res_9</th>
                                                <th scope="col">Res_10</th>
                                                <th scope="col">Res_11</th>
                                            </tr>
                                        </thead>
                                        <tbody id='tbodyresage'>

                                        </tbody>
                                    </table>
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