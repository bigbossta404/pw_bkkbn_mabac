                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center justify-align-center">
                                        <div class="col d-flex align-items-center justify-align-center">
                                            <div class="col">
                                                <div class="ketbox">
                                                    <p class="m-0">Sistem sudah melakukan perhitungan dibalik layar atau otomatis, hasil dapat dilihat pada tabel dibawah.</p>
                                                </div>
                                            </div>
                                            <a href="<?= base_url('eksporHasilRank') ?>" class="btn btn-success"><i class="fas fa-file-excel"></i> Ekspor ke Excel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row align-items-center justify-align-center">
                                        <div class="col ">
                                            <h5 class="m-0 text-center rekomen">Alat dipakai terbanyak: <span class="rekomendasiRes"><?php echo $terbanyak['alat'] . ' ( ' . $terbanyak['jum'] . ' Rekomendasi )'; ?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl">
                            <div class="card shadow tablecard">
                                <table id="datarank" class="table table-striped table-bordered display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Nilai</th>
                                            <th>Rank</th>
                                            <th>Alat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($hasilData as $hd) : ?>
                                            <tr>
                                                <td><?php echo $hd['id_hitung']; ?></td>
                                                <td><?php echo ucwords($hd['nama']); ?></td>
                                                <td><?php echo $hd['nilai']; ?></td>
                                                <td><?php echo $hd['rank']; ?></td>
                                                <td><?php
                                                    if ($hd['nilai'] <= 2.5) {
                                                        echo 'IUD';
                                                    } elseif ($hd['nilai'] >= 2.6 && $hd['nilai'] <= 7.0) {
                                                        echo 'Suntik';
                                                    } elseif ($hd['nilai'] >= 7.1) {
                                                        echo 'Implan';
                                                    }
                                                    ?></td>
                                            </tr>
                                        <?php endforeach; ?>
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