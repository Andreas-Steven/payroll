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
                    <h3 class="card-title">Data Gaji Karyawan</h3>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $number++; ?></td>
                                    <td><?= $d['nama'] ?></td>
                                    <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <form method="POST" action="/print">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" class="form-control" name="id" value="<?= $d['id'] ?>">
                                                        <button type="submit" class="btn btn-tool" title="Print Slip Gaji">
                                                            <i class="fas fa-print"></i>
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