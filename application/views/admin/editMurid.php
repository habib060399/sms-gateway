<div class="content">

    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Form Update Siswa</h4>
        </div>
    </div>

    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-t-0 m-b-30">Form Update Siswa</h4>

                            <?php foreach ($murid->result_array() as $mr) { ?>
                                <form class="form-horizontal" action="<?php echo base_url('admin/updateMurid') ?>" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-text-input">Nomor Induk Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo (form_error('noinduk') ? "is-invalid" : ""); ?>" placeholder="Nomor Induk Siswa" name="noinduk" value="<?php echo $mr['nis'] ?>">
                                            <?php echo form_error('noinduk'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-text-input">Nama Siswa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo (form_error('nama') ? "is-invalid" : ""); ?>" placeholder="Nama Siswa" name="nama" value="<?php echo $mr['nama'] ?>">
                                            <?php echo form_error('nama'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-textarea-input">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control <?php echo (form_error('alamat') ? "is-invalid" : ""); ?>" rows="3" id="alamat" name="alamat" value=""><?php echo $mr['alamat'] ?></textarea>
                                            <?php echo form_error('alamat'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Agama</label>
                                        <div class="col-sm-10">
                                            <select id="agama" class="form-control <?php echo (form_error('agama') ? "is-invalid" : ""); ?>" name="agama">
                                                <option value="<?php echo $mr['agama'] ?>"> <?php echo $mr['agama'] ?></option>
                                                <option value="Islam">Islam</option>
                                                <option value="Keristen">Keristen</option>
                                                <option value="Katholik">Katholik</optionv>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            <?php echo form_error('agama'); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <div class="radio radio-info form-check-inline">
                                                <input type="radio" id="pria" value="Laki-laki" name="jenkel" checked="checked">
                                                <label for="pria"> Pria </label>
                                            </div>
                                            <div class="radio form-check-inline">
                                                <input type="radio" id="wanita" value="Perempuan" name="jenkel">
                                                <label for="wanita"> Wanita </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Jurusan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control <?php echo (form_error('jurusan') ? "is-invalid" : ""); ?>" id="jurusan" name="jurusan">
                                                <?php foreach ($record->result_array() as $r) { ?>
                                                    <option value="<?php echo $r['id_jurusan'] ?>"><?php echo $r['nama_jurusan'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php echo form_error('jurusan'); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Kelas</label>
                                        <div class="col-sm-10">
                                            <select class="form-control <?php echo (form_error('kls') ? "is-invalid" : ""); ?>" id="kls" name="kls">
                                                <?php foreach ($kelas->result_array() as $k) { ?>
                                                    <option value="<?php echo $k['id_kelas'] ?>"> <?php echo $k['nama_kelas']; ?></option>

                                                <?php } ?>
                                            </select>
                                            <?php echo form_error('kls'); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label">Ruangan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control <?php echo (form_error('rng') ? "is-invalid" : ""); ?>" id="rng" name="rng">
                                                <?php foreach ($ruangan->result_array() as $r) { ?>
                                                    <option value="<?php echo $r['id_ruangan'] ?>"><?= $r['nama_ruangan']; ?></option>
                                                    <option value="<?php echo $r['id_ruangan'] ?>"><?= $r['nama_ruangan']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php echo form_error('rng'); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-text-input">Nomor Telepon Orang Tua</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo (form_error('tlfortu') ? "is-invalid" : ""); ?>" placeholder="Nomor Telepon Orang Tua" value="<?php echo $mr['telp_orangtua'] ?>" id="noTelpOrtu" name="tlfortu">
                                            <?php echo form_error('tlfortu'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-text-input">Tahun Ajaran</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control <?php echo (form_error('tahunAjaran') ? "is-invalid" : ""); ?>" placeholder="Tahun Ajaran" value="<?php echo $mr['tahunAjaran'] ?>" id="tahunAjaran" name="tahunAjaran">
                                            <?php echo form_error('tahunAjaran'); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10" style="padding: 5px 0%;">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light m-l-10" name="submit">Submit</button>
                                            <button type="reset" class="btn btn-danger waves-effect waves-light m-l-10">Reset</button>

                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
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