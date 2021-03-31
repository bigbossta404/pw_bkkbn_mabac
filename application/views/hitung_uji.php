                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hitung Akurasi</h1>
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
                                                Nilai akurasi hasil pengolahan data uji
                                            </div>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"></div> -->
                                        </div>
                                        <div class="col-md-2 mr-2">
                                            <a type="button" class="btn-primary font-weight-bold text-white shadow  py-2 btnhitung" id="cektesting">
                                                <div class="d-flex justify-content-center align-items-center"><span class="mr-3">Hasil Latih</span><i class="fas fa-expand-arrows-alt"></i></div>
                                            </a>
                                        </div>
                                        <div class="col-md-2">
                                            <a type="submit" class="card bg-success font-weight-bold text-white shadow  py-2 btnhitung" id="cekakurasi">
                                                Proses
                                            </a>
                                        </div>
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
                                    <div class="table-responsive">
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
                    </div>
                    <div class="row resuji" style="visibility:hidden; display:none">
                        <div class="col-xl mb-4">
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
                        <div class="col-xl mb-4">
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
                        <div class="col-xl mb-4">
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
                    <div class="row">
                        <div class="col-xl">
                            <div class="row mb-4">
                                <div class="col-xl">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="col-xl text-white d-flex justify-content-center align-items-center akurasi-content">
                                                <div class="col-xl-2 mr-4 d-flex justify-content-center boxtot">
                                                    <h1 class="mb-0"><?= $dataset['jml_data_latih']; ?></h1>
                                                </div>
                                                <div class="col-xl">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control bg-white" placeholder="88" value="<?= $datalatih ?>" readonly>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text  w-40 pl-2" id="basic-addon1">Data Latih</span>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-0">
                                                        <input type="text" class="form-control bg-white" placeholder="88" value="<?= $datauji ?>" readonly>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text w-40 pl-4" id="basic-addon1">Data Uji</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control bg-white" placeholder="88" id="normal" value="0" aria-describedby="basic-addon1" readonly>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">NOR</span>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mb-0">
                                                        <input type="text" class="form-control bg-white" placeholder="99" id="autis" value="0" aria-describedby="basic-addon1" readonly>
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">ASD</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl">
                                    <!-- Project Card Example -->
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Tidak Tepat</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <td>Id_uji</td>
                                                        <td>Class</td>
                                                        <td>Prediksi</td>
                                                    </thead>
                                                    <tbody id='notmatch'>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Akurasi</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2" tyle="width: 100px; height: 100px; float: left; position: relative;">
                                        <div style="width: 100%; position: absolute; top: 50%; left: 0; margin-top: -10px; line-height:19px; text-align: center; z-index: 999999999999999">
                                            <h1 id="persen">0 %</h1>
                                        </div>
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="pt-5 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Tepat
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Tidak Tepat
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>