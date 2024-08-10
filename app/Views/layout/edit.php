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
                    <h3 class="card-title">Form Edit Asuransi</h3>
                </div>
                
                <?= validation_list_errors() ?>

                <form method="POST" action="/update/<?= $edit['id']; ?>">
                    <?= csrf_field() ?>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Nasabah</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Nasabah" name="nama" value="<?= $edit['name']; ?>">
                            <?php if ((session('errors.nama')) != null) { ?>
                                <div class="invalid-feedback"> 
                                    <p><?= session('errors.nama') ?></p> 
                                </div>
                            <?php } ?>
                        </div>

                        <!-- <div class="form-group">
                            <label>Periode Pertanggungan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation" name="durasi">
                                <?php if (session('errors.durasi')): ?>
                                    <div class="invalid-feedback">
                                        <?= session('errors.durasi') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="exampleInputEmail1">Kendaraan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Nasabah" name="pertanggungan" value="<?= $edit['coverage']; ?>">
                            <?php if (session('errors.pertanggungan')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.pertanggungan') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga Pertanggungan</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Harga Pertanggungan" name="harga" value="<?= $edit['price']; ?>">
                            <?php if (session('errors.harga')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.harga') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label>Jenis Pertanggungan</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="jenis">
                                <option value="1" <?php if ($edit['type'] == 1): ?> selected <?php endif; ?>>Comprehensive</option>
                                <option value="2" <?php if ($edit['type'] == 2): ?> selected <?php endif; ?>>Total Loss Only</option>
                            </select>
                            <?php if (session('errors.jenis')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.jenis') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group">
                            <label>Risiko Pertanggungan</label>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="banjir" value="true" <?php if ($edit['flood'] == '1'): ?> checked <?php endif; ?>>
                                        <label class="form-check-label">Banjir</label>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="gempa" value="ture" <?php if ($edit['earthQuake'] == '1'): ?> checked <?php endif; ?>>
                                        <label class="form-check-label">Gempa</label>
                                    </div>
                                </div>
                            </div>
                            <?php if (session('errors.risiko')): ?>
                                <div class="invalid-feedback">
                                    <?= session('errors.risiko') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="_method" value="PUT">
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
                                <th>Nama Nasabah</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Kendaraan</th>
                                <th>Harga</th>
                                <th>Jenis</th>
                                <th>Risiko</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1; foreach ($data as $d) : ?>
                                <tr>
                                    <td><?= $number++; ?></td>
                                    <td><?= $d['name'] ?></td>
                                    <td>
                                        <?php
                                            $tanggal = new \DateTime($d['start']);
                                            echo $tanggal->format('d F Y');
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $tanggal = new \DateTime($d['end']);
                                            echo $tanggal->format('d F Y');
                                        ?>
                                    </td>
                                    <td><?= $d['coverage'] ?></td>
                                    <td><?= "Rp " . number_format($d['price'], 0, ",", ".");?></td>
                                    <td>
                                        <?php 
                                            if($d['type'] == 1) {
                                                echo "Comprehensive";
                                            } else {
                                                echo "Total Loss Only";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($d['type'] == 2 && ($d['flood'] == false && $d['earthQuake'] == false)) {
                                                echo "-";
                                            } elseif($d['flood'] == true && $d['earthQuake'] == false) {
                                                echo "Banjir";
                                            } elseif($d['earthQuake'] == true && $d['flood'] == false) {
                                                echo "Gempa";
                                            } else {
                                                echo "Bajir, Gempa";
                                            }
                                        ?>
                                    </td>
                                    <!-- <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <form method="POST" action="/print">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" class="form-control" name="id" value="<?= $d['id'] ?>">
                                                        <button type="submit" class="btn btn-tool" title="Print">
                                                            <i class="fas fa-print"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-3">
                                                <form method="GET" action="/edit/<?= $d['id'] ?>">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="GET">
                                                    <button type="submit" class="btn btn-tool" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </form>
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
                                    </td> -->
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        
    </section>
    <!-- /.Main content -->
</div>

<?= $this->endSection(); ?>