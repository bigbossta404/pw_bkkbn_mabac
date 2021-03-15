                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Uji</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Ekspor Dataset</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl mb-4">
                            <div class="card border-left-warning shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Isi question dibawah dengan format yang sesuai
                                            </div>
                                            <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"></div> -->
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="card bg-success font-weight-bold text-white shadow  py-2 btnhitung" form="hitung">
                                                Proses
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card shadow tablehitung">
                                <div class="card-body">
                                    <?php echo form_open_multipart('pengguna/hitung', 'id="hitung"'); ?>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-md-6.5 mr-3">
                                            <div class="row mb-4">
                                                <!-- <div class="col-xl-5"> -->
                                                <div class="form-group mr-5">
                                                    <label for="">A1 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih1" id="flexRadioDefault" value="1">
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih1" id="flexRadioDefault" value="0" checked>
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group mr-5">
                                                    <label for="">A2 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih2" value="1" id="flexRadioDefault">
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih2" value="0" id="flexRadioDefault" checked>
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group mr-5">
                                                    <label for="">A3 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih3" value="1" id="flexRadioDefault">
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih3" value="0" id="flexRadioDefault" checked>
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group mr-5">
                                                    <label for="">A4 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih4" value="1" id="flexRadioDefault">
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih4" value="0" id="flexRadioDefault" checked>
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">A5 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih5" value="1" id="flexRadioDefault">
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih5" value="0" id="flexRadioDefault" checked>
                                                        <label class="form-check-label" for="flexRadioDefault">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group mr-5">
                                                    <label for="">A6 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih6" value="1" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih6" value="0" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group mr-5">
                                                    <label for="">A7 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih7" value="1" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih7" value="0" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group mr-5">
                                                    <label for="">A8 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih8" value="1" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih8" value="0" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group mr-5">
                                                    <label for="">A9 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih9" value="1" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih9" value="0" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group mr-5">
                                                    <label for="">A10 Score</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih10" value="1" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="pilih10" value="0" id="flexRadioDefault2" checked>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <select type="number" class="form-control border-dark" name="age" placeholder="Age">
                                                    <option value="">-- Age --</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control border-dark" name="gender" id="">
                                                    <option value="">-- Gender --</option>
                                                    <option value="m">Laki-laki</option>
                                                    <option value="f">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control border-dark" name="jundice" id="">
                                                    <option value="">-- Jundice --</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control border-dark" name="autism" id="">
                                                    <option value="">-- Autism --</option>
                                                    <option value="yes">Yes</option>
                                                    <option value="no">No</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                    <?php form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>