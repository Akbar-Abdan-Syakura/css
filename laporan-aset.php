<?php

require 'koneksi.php';

$date = date('Y-m-d');
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Monitoring-AOD-$date.xls");

$aset = tampil_aset("SELECT * FROM aset 
INNER JOIN divisi ON aset.id_divisi = divisi.id_divisi 
INNER JOIN kondisi_aset ON aset.id_kondisi_aset = kondisi_aset.id_kondisi_aset 
INNER JOIN prioritas ON aset.id_prioritas = prioritas.id_prioritas 
INNER JOIN tahun_ekonomis ON aset.id_ekonomis = tahun_ekonomis.id_ekonomis 
INNER JOIN satuan ON aset.id_satuan = satuan.id_satuan
WHERE status_aset = '1' ");



?>

<p align="center" style="font-weight:bold;font-size:20pt">LAPORAN MONITORING ASET <?php echo $date; ?></p>
<table border = "1" align="center">
    <thead>
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Kode Aset</th>
            <th scope="col" class="text-center">Nama Aset</th>
            <th scope="col" class="text-center">Merk</th>
            <th scope="col" class="text-center">Type</th>
            <th scope="col" class="text-center">Serial Number</th>
            <th scope="col" class="text-center">Divisi</th>
            <th scope="col" class="text-center">Qty</th>
            <th scope="col" class="text-center">Tanggal Masuk</th>
            <th scope="col" class="text-center">Tanggal Habis</th>
            <th scope="col" class="text-center">Harga Aset</th>
            <th scope="col" class="text-center">Prioritas Aset</th>
            <th scope="col" class="text-center">Kondisi Aset</th>
            <th scope="col" class="text-center">Keterangan</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    foreach ($aset as $ast) : ?>
        <tbody>
            <tr>
                <td class="text-center"><?= $no; ?></td>
                <td class="text-center"><?= sprintf("%03d", $ast["id_aset"]); ?><?= sprintf("%03d", $ast["id_divisi"]); ?><?= date('Y', strtotime($ast["tanggal_masuk"])); ?></td>
                <td class="text-center"><?= $ast["nama_aset"]; ?></td>
                <td class="text-center"><?= $ast["merk"]; ?></td>
                <td class="text-center"><?= $ast["type"]; ?></td>
                <td class="text-center"><?= $ast["SN"]; ?></td>
                <td class="text-center"><?= $ast["nama_divisi"]; ?></td>
                <td class="text-center"><?= $ast["qty"]; ?> <?= $ast["satuan"]; ?></td>
                <td class="text-center"><?= $ast["tanggal_masuk"]; ?></td>
                <td class="text-center"><?= $ast["tanggal_habis"]; ?></td>
                <td class="text-center"><?= $ast["harga_aset"]; ?></td>
                <td class="text-center"><?= $ast["prioritas"]; ?></td>
                <td class="text-center"><?= $ast["kondisi"]; ?></td>
                <td class="text-center"><?= $ast["keterangan"]; ?></td>
            </tr>
            <?php $no++; ?>
        </tbody>
    <?php endforeach; ?>
</table>