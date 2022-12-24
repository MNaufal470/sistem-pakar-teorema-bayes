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
                        DataTables Gejala
                    </h6>
                </div>
                <div class="col-lg-6" style="display: flex; flex-direction: row-reverse">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahGejala">
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
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1?>
                        <?php foreach($gejala as $g):?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $g->kode_gejala ?></td>
                            <td><?= $g->nama_gejala ?></td>
                            <td>
                                <button class="btn btn-success" data-toggle="modal"
                                    data-target="#updateGejala<?=$g->id_gejala?>">Edit</button>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteGejala<?=$g->id_gejala?>">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal Tambah Gejala -->

<div class="modal fade" id="tambahGejala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/TambahGejala" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Gejala</label>
                        <input type="Text" readonly class="form-control" id="exampleFormControlInput1"
                            placeholder=<?= $kode_gejala ?> name="kode_gejala" value=<?= $kode_gejala ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Gejala</label>
                        <input type="Text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nama Gejala" name="nama_gejala">
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
<!-- Modal Update Gejala -->
<?php foreach($gejala as $g): ?>
<div class="modal fade" id="updateGejala<?=$g->id_gejala ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/UpdateGejala/<?=$g->id_gejala ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Gejala</label>
                        <input type="Text" readonly class="form-control" id="exampleFormControlInput1"
                            name="kode_gejala" value="<?=$g->kode_gejala?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Gejala</label>
                        <input type="Text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nama Gejala" name="nama_gejala" value="<?=$g->nama_gejala ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>
<!-- Modal Delete Gejala -->
<?php foreach($gejala as $g): ?>
<div class="modal fade" id="deleteGejala<?=$g->id_gejala ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Gejala</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Admin/DeleteGejala/<?=$g->id_gejala ?>" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Gejala</label>
                        <input type="Text" readonly class="form-control" id="exampleFormControlInput1" placeholder="G1"
                            name="<?=$g->kode_gejala?>" value="<?=$g->kode_gejala?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Gejala</label>
                        <input type="Text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukan Nama Gejala" name="nama_gejala" value="<?=$g->nama_gejala ?>" readonly>
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