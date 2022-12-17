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
                            <table id="datatable-fixed-header" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                <?php $data = $role['username'];
                        if ($data != 'admin') {
                            $hidden = 'hidden';
                        } else {
                            $hidden = '';
                        }
                        ?>
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
                                        <th <?php echo $hidden ?>>Aksi</th>
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
                                            <td <?php echo $hidden ?>>
                                                <a href="<?= base_url() ?>admin/editLaporan/<?= $m['id']; ?>" class="btn btn-primary waves-effect waves-light">Edit</a>
                                                <a href="<?= base_url() ?>admin/deletePembayaran/<?= $m['id']; ?>" class="btn btn-danger waves-effect waves-light" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini?');">Delete</a>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                           <form method="post" action="<?= base_url() ?>Admin/printLaporan">
                                 Tahun Ajaran : <select name="tahunAjaran" id="tahunAjaran">
                                     <option value="">Semua</option>
                                     <?php foreach($tahun->result_array() as $t ){?>
                                                  <option value="<?= $t['tahunAjaran'] ?>"><?= $t['tahunAjaran'] ?></option>
                                                  <?php } ?>
                                                </select>
                                 <input type="submit" value="cetak">
                        </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
</div>