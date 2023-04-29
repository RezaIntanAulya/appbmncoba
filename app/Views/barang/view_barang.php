<?= $this->extend('template/layout_admin'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Menu <?= $tittle ?></h1>
            <a href="<?php echo base_url('Barang/htmlToPDF') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Data <?= $tittle ?></h5>
        </div>
        <div class="card-body">
            <?php if(session()->get('insert')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Barang Berhasil <strong><?= session()->getFlashdata('insert'); ?></strong>
                </div>
            <?php endif; ?>

            <?php if(session()->get('update')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Barang Berhasil <strong><?= session()->getFlashdata('update'); ?></strong>
                </div>
            <?php endif; ?>

            <?php if(session()->get('DeleteData')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data Barang Berhasil <strong><?= session()->getFlashdata('delete'); ?></strong>
                </div>
            <?php endif; ?>

            <?php if(session()->get('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                   <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add">
                <i class="fa fa-plus mr-1"></i>
                Tambah Barang
            </button>
            <a type="button" class="btn btn-success mb-3" href="pemeliharaan/insert">
                <i class="fa fa-plus mr-1"></i>
                Tambah Pemeliharaan
            </a>
        
            <div class="table-responsive"  >
                <table class="display table table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>NUP</th>
                            <th>Merk/Type</th>
                            <th>Jumlah Barang</th>
                            <th>Tahun Perolehan</th>
                            <th>Ruang</th>
                            <th>Penanggung Jawab</th>
                            <th>Kondisi</th>
                            <th width="180px">Aksi</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($barang as $b) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?>.</th>
                                <td><?= $b["kode_barang"]; ?></td>
                                <td><?= $b["nama_barang"]; ?></td>
                                <td><?= $b['nup']; ?></td>
                                 <td><?= $b["merk/type"]; ?></td>
                                <td><?= $b["jumlah"]; ?></td>
                                <td><?= date('d/m/Y', strtotime($b["tahun_perolehan"])); ?></td>
                                <td><?= $b['nama_ruang']; ?></td>
                                <td><?= $b['nama_pegawai']; ?></td>
                                <td><?= $b["kondisi"]; ?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $b['id']; ?>" id="btn-edit"><i class="fas fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $b['id']; ?>"><i class="fas fa-trash"></i></button>
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
            <?php
                session();
                $validasi = \Config\Services::validation();
                ?>
            <form action="<?= base_url('barang/Insert'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input id="kode_barang" name="kode_barang" class="form-control" placeholder="Kode Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="nup">NUP</label>
                        <input id="nup" name="nup" class="form-control" placeholder="NUP" required>
                    </div>
                    <div class="form-group">
                        <label for="merk/type">Merk/Type</label>
                        <input id="merk" type="text" name="merk/type" class="form-control" placeholder="Merk/Type Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Barang</label>
                        <input id="jumlah" class="form-control" name="jumlah" placeholder="Jumlah Barang" required></input>
                    </div>
                    <div class="form-group">
                        <label for="tahun_perolehan">Tahun Perolehan</label>
                        <input id="tahun_perolehan" type="date" name="tahun_perolehan" class="form-control" placeholder="Tahun Perolehan Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="idRuang">Ruang</label>
                        <div>
                            <select id="idRuang" name="idRuang" class="form-control">
                                <option>--Pilih Ruang--</option>
                                <?php foreach($ruang as $r => $value) { ?>
                                    <option value="<?= $value['idRuang']; ?>"><?= $value['nama_ruang']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idPegawai">Penanggung Jawab</label>
                        <div>
                            <select id="idPegawai" name="idPegawai" class="form-control">
                                <option>--Pilih Penanggung Jawab--</option>
                                <?php foreach($pegawai as $p => $value) { ?>
                                    <option value="<?= $value['idPegawai']; ?>"><?= $value['nama_pegawai']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <div>
                            <select id="kondisi" name="kondisi" class="form-control" required>
                                <option>--Pilih Kondisi--</option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
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
foreach ($barang as $b) { ?>
    <!-- Modal edit -->
    <div class="modal fade" id="edit<?= $b['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-="true">
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
                <form action="<?= base_url('barang/UpdateData/' . $b['id']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Barang</label>
                            <input id="kode_barang" name="kode_barang" class="form-control" placeholder="Kode Barang" value="<?= $b['kode_barang']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $b['nama_barang']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Merk/Type</label>
                            <input id="merk" name="merk/type" class="form-control" placeholder="Merk/Type Barang" value="<?= $b['merk/type']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <input id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah Barang">"<?= $b['jumlah']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tahun Perolehan</label>
                            <input id="tahun_perolehan" type="date" name="tahun_perolehan" class="form-control" value="<?= $b['tahun_perolehan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="idRuang">Ruang</label>
                            <div>
                                <select id="idRuang" name="idRuang" class="form-control">
                                    <option>--Pilih Ruang--</option>
                                    <?php foreach($ruang as $r ) { ?>
                                        <option value="<?= $r['idRuang']; ?>" hidden><?= $r['nama_ruang']; ?></option>
                                        <option value="<?= $r['idRuang']; ?>" <?= ($r['idRuang'] == $b['idRuang']) ? 'selected' : '' ?>><?= $r['nama_ruang']; ?></option>
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
                                        <option value="<?= $p['idPegawai']; ?>" hidden><?= $p['nama_pegawai']; ?></option>
                                        <option value="<?= $p['idPegawai']; ?>" <?= ($p['idPegawai'] == $b['idPegawai']) ? 'selected' : '' ?>><?= $p['nama_pegawai']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kondisi Barang</label>
                            <div>
                            <select id="kondisi" name="kondisi" class="form-control" required>
                                <option value="<?= $b['kondisi'] ?>" hidden><?= $b['kondisi'] ?></option>
                                <option>--Pilih Ruang--</option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                            </div>
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
    <div class="modal fade" id="delete<?= $b['id']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Data <?= $tittle; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('barang/DeleteData/' . $b['id']); ?>" method="post">
                    <div class="modal-body">
                        Apakah Anda Yakin Menghapus Data Ini <?= $b['kode_barang'] ?> ..?
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