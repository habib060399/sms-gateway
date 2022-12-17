<!-- <div class="content-page"> -->
<!-- Start content -->
<div class="content"></div>
<div class="">
    <div class="page-header-title">
        <h4 class="page-title">Data Pembayaran </h4>
    </div>
</div>
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <h4 class="m-b-30 m-t-0">Tabel Konfirmasi Pembayaran</h4>
                            <a href="<?= base_url() ?>Admin/inputTunggakan1" class="btn btn-warning">Tunggakan 1</a>
                            <a href="<?= base_url() ?>Admin/inputTunggakan2" class="btn btn-info">Tunggakan 2</a>
                            <a href="<?= base_url() ?>Admin/inputLunas" class="btn btn-info">Lunas</a>
                            <br><br>
                            <table id="datatable-fixed-header" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Jurusan</th>
                                        <th>Kelas</th>
                                        <th>Ruangan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($murid->result_array() as $m) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $m['nis'] ?></td>
                                            <td><?= $m['nama'] ?></td>
                                            <td><?= $m['nama_jurusan'] ?></td>
                                            <td><?= $m['nama_kelas'] ?></td>
                                            <td><?= $m['nama_ruangan'] ?></td>
                                            <td><?= $m['status'] ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>admin/editPembayaran/<?= $m['nis']; ?>" class="btn btn-primary waves-effect waves-light"> Pembayaran</a>
                                                <!-- <a href="<?= base_url() ?>admin/updateStatus/<?= $m['nis']; ?>" class="btn btn-info waves-effect waves-light"> Konfirmasi</a><a href="" class="btn btn-primary"> Delete</a> -->


                                            </td>
                                        </tr>
                                    <?php  } ?>

                                </tbody>
                            </table>
                            <!-- sample Upadate modal content -->
                            <div class="col-lg-3 col-md-6 m-t-30">
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title m-0" id="myModalLabel">Update Data Jurusan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <label class=" for=" example-text-input">Id Jurusan</label>
                                                <div class="">
                                                    <input type="text" class="form-control" value="" id="example-text-input" disabled>
                                                </div>
                                                <br>
                                                <label class=" for=" example-text-input">Nama Siswa</label>
                                                <div class="">
                                                    <input type="text" class="form-control" value="" id="example-text-input" placeholder="Nama Siswa">
                                                </div>
                                                <br>
                                                <label class="" for="example-text-input">Tanggal Bayar</label>
                                                <div class="">
                                                    <input type="date" class="form-control" value="" id="example-text-input">
                                                </div>
                                                <br>
                                                <label class="" for="example-text-input">Jumlah</label>
                                                <div class="">
                                                    <input type="text" class="form-control" value="" id="rupiah3" name="rupiah3" placeholder="Nominal Jumlah">
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect">Simpan</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                </div>
                                <!-- sample End Upadate modal content -->
                            </div><!-- End div card -->
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div> <!-- col -->
            </div> <!-- End row -->
        </div> <!--  End container-fluid -->
    </div> <!-- End page-content-wrapper -->
</div> <!-- End content -->

<!-- </div> End-content-page -->