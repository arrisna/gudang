<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
</head>
<body>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Penjualan.xls");
?>

<p align="center"><h2>Laporan Data Penjualan</h2></p>

<table border="1">
    <thead>
        <tr>
            <th class="header">No</th>
            <th class="yellow header headerSortDown">No. Penjualan</th>
            <th class="yellow header headerSortDown">Nama Barang</th>
            <th class="yellow header headerSortDown">Tanggal</th>
            <th class="yellow header headerSortDown">Harga</th>
            <th class="yellow header headerSortDown">Jumlah</th>
            <th class="yellow header headerSortDown">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = $this->uri->segment(3) + 1;
            $totals = 0;
            foreach($penjualan as $row):
                $total = ($row['harga']*$row['jumlah']);
                $totals += $total;
                echo '<tr>';
                echo '<td>'.$no++.'</td>';
                echo '<td>'.$row['no_penjualan'].'</td>';
                echo '<td>'.$row['nama_brg'].'</td>';
                echo '<td>'.$row['tanggal'].'</td>';
                echo '<td>Rp. '.$row['harga'].'</td>';
                echo '<td>'.$row['jumlah'].'</td>';
                echo '<td>Rp. '.$total.'</td>';
                echo '</tr>';
            endforeach;
        ?>      
    </tbody>
</table>
<br>

Total Penjualan : Rp. <?php echo $totals; ?>

</body>
</html>