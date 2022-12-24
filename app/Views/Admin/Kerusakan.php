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
                        DataTables Kerusakan
                    </h6>
                </div>
                <div class="col-lg-6" style="display: flex; flex-direction: row-reverse">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKerusakan">
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
                        <th>Kode Kerusakan</th>
                        <th>Nama Kerusakan</th>
                        <th>Probabilitas</th>
                        <th>Gambar</th>
                        <th>Solusi</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        <?php foreach($kerusakan as $k): ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=$k->kode_kerusakan?></td>
                            <td><?=$k->nama_kerusakan?></td>
                            <td><?=$k->probabilitas?></td>
                            <td><img src="/Assets/Img/Kerusakan/<?=$k->gambar?>" alt="" class="img-fluid"
                                    style="width: 100%; height:200px;object-fit:cover;"></td>
                            <td><?=$k->solusi?></td>
                            <td>
                                <button class="btn btn-success w-100" data-toggle="modal"
                                    data-target="#updateKerusakan<?=$k->id_kerusakan?>">Edit</button>
                                <button class="btn btn-danger mt-3 w-100" data-toggle="modal"
                                    data-target="#deleteKerusakan<?=$k->id_kerusakan?>">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Kerusakan  -->
<div class="modal fade" id="tambahKerusakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/TambahKerusakan" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Kerusakan</label>
                        <input type="Text" readonly class="form-control" id="exampleFormControlInput1"
                            placeholder="<?= $kode_kerusakan ?>" name="kode_kerusakan" value="<?= $kode_kerusakan ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kerusakan</label>
                        <input type="Text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nama Kerusakan" name="nama_kerusakan">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai Probabilitas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nilai Probabilitas" name="probabilitas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Solusi</label>
                        <textarea id="" cols="30" rows="5" class="form-control" name="solusi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Masukan Gambar Kerusakan</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="gambar">
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
<!-- Modal Update Kerusakan -->
<?php foreach($kerusakan as $k): ?>
<div class="modal fade" id="updateKerusakan<?=$k->id_kerusakan ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/UpdateKerusakan/<?=$k->id_kerusakan ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Kerusakan</label>
                        <input type="Text" readonly class="form-control" id="exampleFormControlInput1"
                            placeholder="<?= $k->kode_kerusakan ?>" name="kode_kerusakan"
                            value="<?= $k->kode_kerusakan ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kerusakan</label>
                        <input type="Text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nama Kerusakan" name="nama_kerusakan"
                            value="<?= $k->nama_kerusakan ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai Probabilitas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nilai Probabilitas" name="probabilitas"
                            value="<?= $k->probabilitas ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Solusi</label>
                        <textarea id="" cols="30" rows="5" class="form-control"
                            name="solusi"><?=$k->solusi ?></textarea>
                    </div>
                    <div class="form-group flex-col">
                        <label for="exampleFormControlInput1">Masukan Gambar Kerusakan</label>
                        <img src="/Assets/Img/Kerusakan/<?= $k->gambar ?>" alt="" class="img-fluid"
                            style="height:100px;">
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="gambar">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<!-- Modal Delete Kerusakan -->
<?php foreach($kerusakan as $k): ?>
<div class="modal fade" id="deleteKerusakan<?=$k->id_kerusakan ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kerusakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/DeleteKerusakan/<?=$k->id_kerusakan ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Kerusakan</label>
                        <input type="Text" readonly class="form-control" id="exampleFormControlInput1"
                            placeholder="<?= $k->kode_kerusakan ?>" name="kode_kerusakan"
                            value="<?= $k->kode_kerusakan ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Kerusakan</label>
                        <input type="Text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nama Kerusakan" name="nama_kerusakan" value="<?= $k->nama_kerusakan ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai Probabilitas</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nilai Probabilitas" name="probabilitas" value="<?= $k->probabilitas ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Solusi</label>
                        <textarea id="" cols="30" rows="5" class="form-control" name="solusi"
                            readonly><?=$k->solusi ?></textarea>
                    </div>
                    <div class="form-group flex-col">
                        <label for="exampleFormControlInput1">Gambar Kerusakan</label>
                        <img src="/Assets/Img/Kerusakan/<?= $k->gambar ?>" alt="" class="img-fluid"
                            style="height:100px;">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<?=$this->endSection() ?>