<div class="content">
    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Data Laporan Pembayaran BPP</h4>
        </div>
    </div>
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-b-30 m-t-0">Laporan Pembayaran BPP Siswa SMK NEGERI 1 LABANGKA</h4>
                            <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No.</th>
                                        <th>Tanggal</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                        <th>Semester</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($murid->result_array() as $m) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $m['tanggal'] ?></td>
                                            <td><?= $m['nis'] ?></td>
                                            <td><?= $m['nama'] ?></td>
                                            <td><?= $m['jurusan'] ?></td>
                                            <td><?= $m['kelas'] ?></td>
                                            <td><?= $m['semester'] ?></td>
                                            <td><?= $m['jumlah'] ?></td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
</div>

<script>
    window.print();
</script>