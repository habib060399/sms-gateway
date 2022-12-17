        <div class="">
            <div class="page-header-title">
                <h4 class="page-title">Form Input Jurusan</h4>
            </div>
        </div>

        <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="m-t-0 m-b-30">Form Input Jurusan</h4>
                                <form class="form-horizontal" action="insertJurusan" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-text-input">ID Jurusan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="idjr" class="form-control" readonly value="<?php echo idjr(); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="example-email">Nama Jurusan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="namaJurusan" id="namaJurusan" class="form-control <?php echo (form_error('namaJurusan') ? "is-invalid" : ""); ?>" value="<?php echo set_value('nama_Jurusan') ?>" placeholder="Masukan Nama Jurusan">
                                            <?php echo form_error('namaJurusan'); ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10" style="padding: 5px 0%;">
                                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light m-l-10">Submit</button>
                                            <button type="reset" class="btn btn-danger waves-effect waves-light m-l-10">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- card-body -->
                        </div> <!-- card -->
                    </div> <!-- col -->
                </div> <!-- End row -->
            </div><!-- container -->

        </div> <!-- Page content Wrapper -->

        </div> <!-- content -->

        </div>
        <!-- End Right content here -->

        </div>
        <!-- END wrapper -->