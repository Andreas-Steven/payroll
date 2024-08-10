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
                                <th>Gaji Pokok</th>
                                <th>Jumlah Hari Terlambat</th>
                                <th>Denda</th>
                                <th>Total Gaji</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $number++; ?></td>
                                    <td><?= $d['nama'] ?></td>
                                    <td><?= "Rp " . number_format($d['gaji_pokok'], 0, ",", ".");?></td>
                                    <td><?= $d['jumlah_hari_terlambat'] ?></td>
                                    <td><?= "Rp " . number_format($d['denda'], 0, ",", ".");?></td>
                                    <?php $totalGaji = $d['gaji_pokok'] - $d['denda'] ?>
                                    <td><?= "Rp " . number_format($totalGaji, 0, ",", ".");?></td>
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