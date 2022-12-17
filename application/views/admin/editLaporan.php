<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Edit Laporan</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-t-0 m-b-30"> Form Edit Laporan Pembayaran Siswa</h4>

                            <form class="form-horizontal" action="<?= base_url() ?>/Admin/updateLaporan" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label" for="example-text-input">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Nomor Induk Siswa" name="tanggal" id="tanggal" value="<?= date('Y-m-d'); ?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <?php foreach ($murid->result_array() as $m) { ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-text-input">Nomor Induk Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Nomor Induk Siswa" name="noinduk" id="noinduk" value="<?= $m['nis']; ?>" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-text-input">Nama Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Nama Siswa" name="nama" id="nama" value="<?= $m['nama']; ?>" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Kelas</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="kelas" name="kelas" value="<?= $m['kelas']; ?>" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Jurusan</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="jurusan" name="jurusan" id="jurusan" value="<?= $m['jurusan']; ?>" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Semeter</label>
                                        <div class="col-sm-10">
                                            <!-- <input type="text" class="form-control" id="semester" name="semester" value=" <?= $m['semester']; ?>"> -->
                                            <select type="text" class="form-control" id="semester" name="semester">
                                                <option value="<?= $m['semester']; ?>"><?= $m['semester']; ?></option>
                                                <option value="Semester 1">Semester 1</option>
                                                <option value="Semester 2">Semester 2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Jumlah</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="jumlah" name="jumlah" value=" <?= $m['jumlah']; ?>">
                                        </div>
                                    </div>
                                <?Php } ?>
                                <br>
                                <div class="form-group row mb-0">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10" style="padding: 5px 0%;">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light m-l-10" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-danger waves-effect waves-light m-l-10">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- card-body -->
                    </div>
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- End row -->
    </div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

<!-- End Right content here -->

</div>
<!-- END wrapper -->

<!-- <script>
    $(document).ready(function() {

        loadKelas();
    });

    function loadKelas() {
        $('#jurusan').change(function() {
            var getJurusan = $('#jurusan').val();
            $.ajax({
                type: "POST",
                dataType: "JSON",
                url: "<?= base_url(); ?>Admin/getDataKelas",
                data: {
                    jurusan: getJurusan
                },
                success: function(data) {
                    console.log(data);

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_kelas + '">' + data[i].nama_kelas + '</option>';
                    }

                    $('#kls').html(html);
                }
            });
        });
    }
</script> -->