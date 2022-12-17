    <div class="">
            <div class="page-header-title">
                <h4 class="page-title">Form Input Ruangan</h4>
            </div>
        </div>

        <div class="page-content-wrapper ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="m-t-0 m-b-30">Form Input Ruangan</h4>

                                <form class="form-horizontal" action="insertRuangan" method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="idRuangan">ID Ruangan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" readonly value="<?php echo idrng(); ?>" placeholder="Masukan ID Ruangan" name="idRuangan" id="idRuangan">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label" for="namaRuangan">Nama Ruangan</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="namaRuangan" name="namaRuangan" class="form-control" placeholder="Masukan Nama Ruangan">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light m-l-10">Submit</button>
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