<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembelian</title>
</head>
<body>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Pembelian.xls");
?>

<p align="center"><h2>Laporan Data Pembelian</h2></p>

<table border="1">
    <thead>
        <tr>
            <th class="header">No</th>
            <th class="yellow header headerSortDown">No. Pembelian</th>
            <th class="yellow header headerSortDown">Nama Barang</th>
            <th class="yellow header headerSortDown">Tanggal</th>
            <th class="yellow header headerSortDown">Harga</th>
            <th class="yellow header headerSortDown">Jumlah</th>
            <th class="yellow header headerSortDown">Total</th>
            <th class="yellow header headerSortDown">Nama Supplier</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = $this->uri->segment(3) + 1;
        $totals = 0;
        foreach($pembelian as $row):
            $total = ($row['harga']*$row['jumlah']);
            $totals += $total;
            echo '<tr>';
            echo '<td>'.$no++.'</td>';
            echo '<td>'.$row['no_pembelian'].'</td>';
            echo '<td>'.$row['nama_brg'].'</td>';
            echo '<td>'.$row['tanggal'].'</td>';
            echo '<td>Rp. '.$row['harga'].'</td>';
            echo '<td>'.$row['jumlah'].'</td>';
            echo '<td>Rp. '.$total.'</td>';
            echo '<td>'.$row['nama_suplier'].'</td>';
            echo '</tr>';
        endforeach;
        ?>      
    </tbody>
</table>
<br>

Total Penjualan : Rp. <?php echo $totals; ?>

</body>
</html>