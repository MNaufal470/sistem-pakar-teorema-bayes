<?=$this->extend('Template/TemplateAdmin/Template') ?>
<?=$this->section('content') ?>
<?php
$session = session();
$errors = $session->getFlashdata('errors');
$success = $session->getFlashdata('success');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <?php if ($errors != null) :  ?>
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Terjadi Kesalahan</h4>
                <hr>
                <p class="mb-0">
                    <?php
                            foreach ($errors as $err) {
                                echo $err . ' | ';
                            } ?>
                </p>
            </div>
            <?php endif; ?>
            <?php if ($success):?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><?= session()->getFlashdata('success') ?></h4>
            </div>
            <?php endif; ?>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6">
                    <h6 class="m-0 font-weight-bold text-primary">
                        DataTables Basis Pengetahuan
                    </h6>
                </div>
                <div class="col-lg-6" style="display: flex; flex-direction: row-reverse">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPengetahuan">
                        Tambah Data
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Nama Kerusakan</th>
                        <th>Nama Gejala</th>
                        <th>Probalitas</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach($pengetahuan as $p): ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $p['kode_kerusakan'] ?> - <?=$p['nama_kerusakan']?></td>
                            <td><?= $p['kode_gejala'] ?> - <?=$p['nama_gejala']?></td>
                            <td><?= $p['probabilitas'] ?></td>
                            <td>
                                <button type="button " class="btn w-100 btn-success " data-toggle="modal"
                                    data-target="#ubahPengetahuan<?= $p['id'] ?>">
                                    Edit
                                </button>
                                <button type="button  " class="btn w-100 btn-danger mt-3" data-toggle="modal"
                                    data-target="#hapusPengetahuan<?= $p['id'] ?>">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Pengetahuan  -->
<div class="modal fade" id="tambahPengetahuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengetahuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/TambahPengetahuan" method="post">
                    <div class="form-group">
                        <select class="form-select form-control" aria-label="Default select example"
                            name="id_kerusakan">
                            <option selected>Pilih Kerusakan</option>
                            <?php foreach($kerusakan as $p): ?>
                            <option value=<?=$p->id_kerusakan ?>><?= $p->kode_kerusakan ?> - <?=$p->nama_kerusakan ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select form-control" aria-label="Default select example" name="id_gejala">
                            <option selected>Pilih Gejala</option>
                            <?php foreach($gejala as $p): ?>
                            <option value=<?=$p->id_gejala ?>><?= $p->kode_gejala ?> - <?=$p->nama_gejala ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1 " class="text-primary">Nilai Probabilitas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nilai Probabilitas" name="probabilitas">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php foreach($pengetahuan as $d): ?>
<!-- Modal Update Pengetahuan  -->
<div class="modal fade" id="ubahPengetahuan<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Pengetahuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/UpdatePengetahuan/<?= $d['id']?>" method="post">
                    <div class="form-group">
                        <select class="form-select form-control" aria-label="Default select example"
                            name="id_kerusakan">
                            <option selected value="<?= $d['id_kerusakan'] ?>"><?= $d['kode_kerusakan'] ?> -
                                <?=$d['nama_kerusakan']?></option>
                            <?php foreach($kerusakan as $p): ?>
                            <option value=<?=$p->id_kerusakan ?>><?= $p->kode_kerusakan ?> - <?=$p->nama_kerusakan ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select form-control" aria-label="Default select example" name="id_gejala">
                            <option selected value="<?= $d['id_gejala'] ?>"><?= $d['kode_gejala'] ?> -
                                <?=$d['nama_gejala']?></option>
                            <?php foreach($gejala as $p): ?>
                            <option value=<?=$p->id_gejala ?>><?= $p->kode_gejala ?> - <?=$p->nama_gejala ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1 " class="text-primary">Nilai Probabilitas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nilai Probabilitas" name="probabilitas"
                            value="<?= $d['probabilitas'] ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<?php foreach($pengetahuan as $d): ?>
<!-- Modal Delete Pengetahuan  -->
<div class="modal fade" id="hapusPengetahuan<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Pengetahuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/DeletePengetahuan/<?= $d['id']?>" method="post">
                    <div class="form-group">
                        <select class="form-select form-control" aria-label="Default select example" name="id_kerusakan"
                            disabled>
                            <option selected value="<?= $d['id_kerusakan'] ?>"><?= $d['kode_kerusakan'] ?> -
                                <?=$d['nama_kerusakan']?></option>
                            <?php foreach($kerusakan as $p): ?>
                            <option value=<?=$p->id_kerusakan ?>><?= $p->kode_kerusakan ?> - <?=$p->nama_kerusakan ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-select form-control" aria-label="Default select example" name="id_gejala"
                            disabled>
                            <option selected value="<?= $d['id_gejala'] ?>"><?= $d['kode_gejala'] ?> -
                                <?=$d['nama_gejala']?></option>
                            <?php foreach($gejala as $p): ?>
                            <option value=<?=$p->id_gejala ?>><?= $p->kode_gejala ?> - <?=$p->nama_gejala ?>
                            </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1 " class="text-primary">Nilai Probabilitas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nilai Probabilitas" name="probabilitas"
                            value="<?= $d['probabilitas'] ?>" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<?=$this->endSection() ?>