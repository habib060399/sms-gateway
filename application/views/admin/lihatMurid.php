<div class="content">
    <div class="">
        <div class="page-header-title">
            <h4 class="page-title">Data Siswa </h4>
        </div>
    </div>
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-b-30 m-t-0">Data Siswa SMK NEGERI 1 LABANGKA</h4>
                                <table id="datatable-fixed-header" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                        <thead>
                                            <?php $data = $role['username']; ?>
                                            <tr>
                                                <th>No</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Agama</th>
                                                <th>Kelamin</th>
                                                <th>alamat</th>
                                                <th>Telp Ortu</th>
                                                <th>Jurusan</th>
                                                <th>Kelas</th>
                                                <th <?php if ($data != 'admin') {
                                                        echo 'hidden';
                                                    } else {
                                                        echo '';
                                                    } ?>>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($tbl_murid->result_array() as $dt) { ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $dt['nis']; ?></td>
                                                    <td><?php echo $dt['nama']; ?></td>
                                                    <td><?php echo $dt['agama']; ?></td>
                                                    <td><?php echo $dt['kelamin']; ?></td>
                                                    <td><?php echo $dt['alamat']; ?></td>
                                                    <td><?php echo $dt['telp_orangtua']; ?></td>
                                                    <td><?php echo $dt['nama_jurusan']; ?></td>
                                                    <td><?php echo $dt['nama_kelas']; ?></td>
                                                    <td <?php if ($data != 'admin') {
                                                            echo 'hidden';
                                                        } else {
                                                            echo '';
                                                        } ?>>
                                                        <a href="<?php echo base_url('admin/editMurid/' . $dt['nis']) ?> " class="btn btn-primary waves-effect waves-light">Edit</a>
                                                        <a href="<?php echo base_url('admin/deleteMurid/' . $dt['nis']) ?> " class="btn btn-danger waves-effect waves-light" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?');">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
</div>
