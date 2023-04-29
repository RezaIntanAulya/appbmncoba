<?= $this->extend('template/layout_admin'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Menu <?= $tittle ?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data <?= $tittle ?></h5>
        </div>
        <div class="card-body">
        
		<!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">
                <i class="fa fa-plus mr-1"></i>
                Tambah
            </button>
            <div class="table-responsive"  >
                <table class="table table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Penanggung Jawab</th>
                            <th>Kondisi</th>
                            <th>Tanggal Pemeliharaan</th>
                            <th>Jenis Pemeliharaan</th>
                            <th>Biaya</th>
                            <th>Keterangan</th>
                            <th width="180px">Aksi</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pemeliharaan as $pm) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?>.</th>
                                <td><?= $pm["kode_barang"]; ?></td>
                                <td><?= $pm["nama_pegawai"]; ?></td>
                                <td><?= $pm["kondisi"]; ?></td>
                                <td><?= date('d/m/Y', strtotime($pm["tanggal_pemeliharaan"])); ?></td>
                                <td><?= $pm["jenis_pemeliharaan"]; ?></td>
                                <td><?= 'Rp' . number_format($pm['biaya'], 0, ',', '.'); ?></td>
                                <td><?= $pm['keterangan']; ?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $pm['idPemeliharaan']; ?>" id="btn-edit"><i class="fas fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $pm['idPemeliharaan']; ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal add -->
<div class="modal fade" id="add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data <?= $tittle; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pemeliharaan/store'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <div>
                            <select id="kode_barang" name="kode_barang" class="form-control">
                                <option>--Pilih Kode Barang--</option>
                                <?php foreach($barang as $b ) { ?>
                                    <option value="<?= $b['kode_barang']; ?>"><?= $b['kode_barang']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idPegawai">Penanggung Jawab</label>
                        <div>
                            <select id="idPegawai" name="idPegawai" class="form-control">
                                <option>--Pilih Penanggung Jawab--</option>
                                <?php foreach($pegawai as $p ) { ?>
                                    <option value="<?= $p['idPegawai']; ?>"><?= $p['nama_pegawai']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pemeliharaan">Tanggal Pemeliharaan</label>
                        <input id="tanggal_pemeliharaan" type="date" name="tanggal_pemeliharaan" class="form-control"required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pemeliharaan">Jenis Pemeliharaan</label>
                        <input id="jenis_pemeliharaan" type="text" name="jenis_pemeliharaan" class="form-control" placeholder="Jenis Pemeliharaan Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="biaya">Biaya</label>
                        <input id="biaya" type="decimal" name="biaya" class="form-control" placeholder="Biaya Pemeliharaan Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="Keterangan">Keterangan</label>
                        <input id="keterangan" type="text" name="keterangan" class="form-control" placeholder="Keterangan Barang">
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $no = 1;
foreach ($pemeliharaan as $pm) { ?>
    <!-- Modal edit -->
    <div class="modal fade" id="edit<?= $pm['idPemeliharaan'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Update Data <?= $tittle; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-="true">&times;</span>
                    </button>
                </div>
                <?php
                session();
                $validation = \Config\Services::validation();
                ?>
                <form action="<?= base_url('pemeliharaan/UpdateData/' . $pm['idPemeliharaan']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang</label>
                            <div>
                                <select id="kode_barang" name="kode_barang" class="form-control">
                                    <option>--Pilih Kode Barang--</option>
                                    <?php foreach($barang as $b ) { ?>
                                        <option value="<?= $b['kode_barang']; ?>" <?= ($b['kode_barang'] == $pm['kode_barang']) ? 'selected' : '' ?>><?= $b['kode_barang']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="idPegawai">Penanggung Jawab</label>
                            <div>
                                <select id="idPegawai" name="idPegawai" class="form-control">
                                    <option>--Pilih Penanggung Jawab--</option>
                                    <?php foreach($pegawai as $p ) { ?>
                                        <option value="<?= $p['idPegawai']; ?>" <?= ($p['idPegawai'] == $pm['idPegawai']) ? 'selected' : '' ?>><?= $p['nama_pegawai']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kondisi Barang</label>
                            <div>
                            <select id="kode_barang" name="kondisi" class="form-control" required>
                                <option>--Pilih Kondisi--</option>
                                <?php foreach($barang as $b ) { ?>
                                        <option value="<?= $b['kode_barang']; ?>" <?= ($b['kode_barang'] == $pm['kode_barang']) ? 'selected' : '' ?>><?= $b['kondisi']; ?></option>
                                    <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pemeliharaan">Tanggal Pemeliharaan</label>
                            <input id="tanggal_pemeliharaan" type="date" name="tanggal_pemeliharaan" class="form-control"required value="<?= $pm['tanggal_pemeliharaan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jenis_pemeliharaan">Jenis Pemeliharaan</label>
                            <input id="jenis_pemeliharaan" type="text" name="jenis_pemeliharaan" class="form-control" placeholder="Jenis Pemeliharaan Barang" required value="<?= $pm['jenis_pemeliharaan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="biaya">Biaya</label>
                            <input id="biaya" type="decimal" name="biaya" class="form-control" placeholder="Biaya Pemeliharaan Barang" required value="<?= $pm['biaya']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Keterangan">Keterangan</label>
                            <input id="keterangan" type="text" name="keterangan" class="form-control" placeholder="Keterangan Barang" value="<?= $pm['keterangan']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal delete -->
    <div class="modal fade" id="delete<?= $pm['idPemeliharaan']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Data <?= $tittle; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pemeliharaan/DeleteData/' . $pm['idPemeliharaan']); ?>" method="post">
                    <div class="modal-body">
                        Apakah Anda Yakin Menghapus Data Ini <?= $pm['kode_barang'] ?> ..?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-trash"></i> Yakin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>

<?= $this->endSection('content'); ?>