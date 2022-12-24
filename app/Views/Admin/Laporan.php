<?=$this->extend('Template/TemplateAdmin/Template') ?>
<?=$this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <h6 class="m-0 font-weight-bold text-primary text-center">
                        DataTables Laporan
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Kerusakan</th>
                        <th>Probalitas</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1?>
                        <?php foreach($laporan as $l) : ?>
                        <tr>
                            <td><?=$i++?></td>
                            <td><?=date('d F Y', $l['waktu'])?></td>
                            <td><?=$l['nama_user']?></td>
                            <td><?=$l['nama_kerusakan']?></td>
                            <td><?=$l['hasil_probabilitas']?></td>
                            <td><button class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteHasil<?=$l['id_hasil']?>">Delete</button></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php foreach($laporan as $l): ?>
<div class="modal fade" id="deleteHasil<?=$l['id_hasil']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <form action="/Admin/DeleteHasil/<?=$l['id_hasil']?>" method="post" enctype="multipart/form-data">
                    <p>Hapus Laporan ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach ?>

<?=$this->endSection() ?>