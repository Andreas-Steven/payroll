<img src="https://www.fourbest.co.id/img/logo.png" size="50%">



<div class="col-md-12">
    <?php foreach ($data as $d) : ?>
    <div class="row">
        <div class="col-sm-3">
            <h1>Slip Gaji Pegawai PT Four Best Synergy</h1>
            <p>Nama Pegawai &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  : <?= $d['nama'] ?></p>
            <p>Email &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  : <?= $d['email'] ?></p>
            <p>Gaji Pokok &nbsp;&nbsp; : <?= "Rp " . number_format($d['gaji_pokok'], 0, ",", ".");?></p>

            <?php if($d['jumlah_hari_terlambat'] == null) :  ?>
                <p>Jumlah Hari Terlambat &nbsp;&nbsp; : 0 Hari</p>
            <?php else : ?>
                <p>Jumlah Hari Terlambat &nbsp;&nbsp; : <?= $d['jumlah_hari_terlambat'] ?> Hari</p>
            <?php endif; ?>

            <p>Total Denda &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  : <?= "Rp " . number_format($d['denda'], 0, ",", ".");?></p>

            <?php $totalGaji = $d['gaji_pokok'] - $d['denda'] ?>
            <p><strong>Total Gaji Yang Diberikan &nbsp;&nbsp; : <?= "Rp " . number_format($totalGaji, 0, ",", ".");?></strong></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>