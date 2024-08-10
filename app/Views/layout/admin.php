<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php helper('form'); ?>
<?php helper('form_validation'); ?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3" >
        <div class="col-md-12">
            
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Pegawai</h3>
                </div>
                
                <?= validation_list_errors() ?>

                <form method="POST" action="/">
                    <?= csrf_field() ?>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Pegawai" name="nama">
                            <?php if ((session('errors.nama')) != null) { ?>
                                <div class="invalid-feedback"> 
                                    <p><?= session('errors.nama') ?></p> 
                                </div>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email Pegawai" name="email">
                            <?php if (session('errors.pertanggungan')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.pertanggungan') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Riwayat Penawaran Asuransi</h3>
                </div>
                <div class="card-body table-responsive p-0">

                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $number++; ?></td>
                                    <td><?= $d['nama'] ?></td>
                                    <td><?= $d['email'] ?></td>
                                    <td><?= $d['role'] ?></td>
                                    <td>
                                        <div class="form-group">
                                            <div class="row">

                                                <div class="col-sm-3">
                                                    <?php if($d['email'] != user()->email) { ?>
                                                        <form method="POST" action="/update/<?= $d['id'] ?>">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <button type="submit" class="btn btn-tool" title="Make Admin">
                                                                <?php if($d['role_id'] == 1) { ?>
                                                                    <i class="fas fa-lock"></i>
                                                                <?php } else { ?>
                                                                    <i class="fas fa-unlock-alt"></i>
                                                                <?php } ?>
                                                            </button>
                                                        </form>
                                                    <?php } ?>
                                                </div>

                                                <div class="col-sm-3">
                                                <form method="POST" action="/delete/<?= $d['id'] ?>">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-tool" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        
    </section>
    <!-- /.Main content -->
</div>

<?= $this->endSection(); ?>