<div class="">
    <div class="page-header-title">
        <h4 class="page-title">Dashboard</h4>
    </div>
</div>

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div>

                            <div class="float-right">
                                <?php foreach ($murid->result_array() as $m) { ?>
                                    <h2 class="text-primary mb-0"><?= $m['nis']; ?></h2>
                                <?php } ?>
                                <p class="text-muted mb-0 mt-2">Total Murid</p><br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div>

                            <div class="float-right">
                                <?php foreach ($jurusan->result_array() as $m) { ?>
                                    <h2 class="text-primary mb-0"><?= $m['jurusan']; ?></h2>
                                <?php } ?>
                                <p class="text-muted mb-0 mt-2">Total Jurusan</p><br>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div>

                            <div class="float-right">
                                <?php foreach ($lunas->result_array() as $m) { ?>
                                    <h2 class="text-primary mb-0"><?= $m['nis']; ?></h2>
                                <?php } ?>
                                <p class="text-muted mb-0 mt-2">Total siswa yang <br>sudah bayar</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div>

                            <div class="float-right">
                                <?php foreach ($nunggak->result_array() as $m) { ?>
                                    <h2 class="text-primary mb-0"><?= $m['nis']; ?></h2>
                                <?php } ?>
                                <p class="text-muted mb-0 mt-2">Total siswa yang <br> belum bayar</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div id="combine-chart-container" class="flot-chart" style="height: 360px"></div>

                        <div id="pie-chart-container" class="flot-chart" style="height: 360px"></div> -->

        <!-- <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="78"></div>

                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>

                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>

                        <div id="website-stats" style="height: 200px" class="flot-chart"></div> -->


    </div>
    <!-- container-fluid -->