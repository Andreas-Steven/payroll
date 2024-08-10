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
                    <h3 class="card-title">Hari Dan Masuk Kerja</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Hari Kerja</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $number++; ?></td>
                                    <td><?= $d['hari'] ?></td>
                                    <td><?= $d['jam_masuk'] ?></td>
                                    <td><?= $d['jam_pulang'] ?></td>
                                    <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <form method="GET" action="/edit/<?= $d['id'] ?>">
                                                        <?= csrf_field() ?>
                                                        <button type="submit" class="btn btn-tool" title="Edit" disabled>
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <!-- <div class="col-sm-3">
                                                    <form method="POST" action="/delete/<?= $d['id'] ?>">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-tool" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div> -->
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