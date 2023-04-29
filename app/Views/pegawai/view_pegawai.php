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
        <?php if(session()->get('insert')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Data barang berhasil <strong><?= session()->getFlashdata('insert'); ?></strong>
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
                Tambah
            </button>
            <div class="table-responsive"  >
                <table class="table table-hover text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Induk Pegawai</th>
                            <th>Nama Pegawai</th>
                            <th width="180px">Aksi</th>
                        </tr>
                    </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pegawai as $p) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?>.</th>
                                <td><?= $p["nip"]; ?></td>
                                <td><?= $p["nama_pegawai"]; ?></td>
                                <td align="center">
                                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $p['idPegawai']; ?>" id="btn-edit"><i class="fas fa-pen"></i></button>
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $p['idPegawai']; ?>"><i class="fas fa-trash"></i></button>
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
            <form action="<?= base_url('pegawai/Insert'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nomor Induk Pegawai</label>
                        <input name="nip" class="form-control" placeholder="Nomor Induk Pegawai" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pegawai</label>
                        <input name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" required>
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
foreach ($pegawai as $p) { ?>
    <!-- Modal edit -->
    <div class="modal fade" id="edit<?= $p['idPegawai'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-="true">
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
                <form action="<?= base_url('pegawai/UpdateData/' . $p['idPegawai']); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor Induk Pegawai</label>
                            <input  name="nip" class="form-control" placeholder="Nomor Induk Pegawai" value="<?= $p['nip']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input name="nama_pegawai" class="form-control" placeholder="Nama Pegawai" value="<?= $p['nama_pegawai']; ?>" required>
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
    <div class="modal fade" id="delete<?= $p['idPegawai']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Data <?= $tittle; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pegawai/DeleteData/' . $p['idPegawai']); ?>" method="post">
                    <div class="modal-body">
                        Apakah Anda Yakin Menghapus Data Ini <?= $p['nama_pegawai'] ?> ..?
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