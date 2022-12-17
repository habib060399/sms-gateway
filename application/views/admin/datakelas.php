<div class="content">
    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Data Kelas Dan Jurusan</h4>
        </div>
    </div>
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-t-0 m-b-30">Data Kelas</h4>

                            <!-- <canvas id="pie" style="width:100%;max-width:700px"></canvas> -->
                            <canvas id="myChart" height="260"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-t-0 m-b-30">Data Jurusan</h4>

                            <!-- <canvas id="pie" style="width:100%;max-width:700px"></canvas> -->
                            <canvas id="myChart2" height="260"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // var xValues = [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150];
    // var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15];
    var barColors = ["red", "green", "blue", "orange", "brown"];
    new Chart("myChart2", {
        type: "pie",
        data: {
            labels: [
                <?php
                foreach ($jurusan as $data) {
                    echo "'" . $data->nama_jurusan . "',";
                }
                ?>
            ],
            datasets: [{
                backgroundColor: barColors,
                data: [
                    <?php
                    foreach ($jumjurusan->result_array() as $data) {
                        echo "'" . $data['nis'] . "',";
                    }
                    ?>
                ],
            }]
        },
        options: {
            title: {
                display: true,
                text: "Data Jurusan"
            }
        }
    });
</script>

<script>
    var barColors = ["red", "green", "blue", "orange", "brown"];
    new Chart("myChart", {
        type: "pie",
        data: {
            labels: [
                <?php
                foreach ($graph as $data) {
                    echo "'Kelas " . $data->nama_kelas . "',";
                }
                ?>
            ],
            datasets: [{
                backgroundColor: barColors,
                data: [
                    <?php
                    foreach ($jum->result_array() as $data) {
                        echo "'" . $data['nis'] . "',";
                    }
                    ?>
                ],
            }]
        },
        options: {
            title: {
                display: true,
                text: "Data Kelas"
            }
        }
    });
</script>