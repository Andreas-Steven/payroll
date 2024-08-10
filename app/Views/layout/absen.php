<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php helper('form'); ?>
<?php helper('form_validation'); ?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content pt-3">

    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Pegawai Yang Belum Absen</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Email Pegawai</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; foreach ($data as $d) : ?>
                            <tr>
                                <td><?= $number++; ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->email ?></td>
                                <td>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <form method="POST" action="/masuk/<?= $d->id ?>">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="POST">
                                                    <input type="hidden" name="pegawai_id" value="<?= $d->id ?>">
                                                    <button type="submit" class="btn btn-tool" title="Absen Masuk">
                                                        <i class="fas fa-indent"></i>
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

    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Pegawai Masuk Hari ini</h3>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1; foreach ($absen as $a) : ?>
                            <tr>
                                <td><?= $number++; ?></td>
                                <td><?= $a['nama'] ?></td>
                                <td><?= date("d F Y",strtotime($a['tanggal'])) ?></td>
                                <td><?= $a['jam_masuk'] ?></td>
                                <td><?= $a['jam_pulang'] ?></td>
                                <td>
                                    <?php if($a['jam_pulang'] == '00:00:00') : ?>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <form method="POST" action="/pulang/<?= $a['id'] ?>">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="_method" value="POST">
                                                        <input type="hidden" name="id" value="<?= $a['id'] ?>">
                                                        <button type="submit" class="btn btn-tool" title="Absen Pulang">
                                                            <i class="fas fa-indent"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
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