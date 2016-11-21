<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF</title>
</head>
<body>

<p align="center"><h2>Laporan Data Barang</h2></p>

<table border="1">
    <thead>
        <tr>
            <th class="header">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = $this->uri->segment(3) + 1;
        foreach($barang as $row):
    	    echo '<tr>';
            echo '<td>'.$no++.'</td>';
            echo '<td>'.$row['kd_brg'].'</td>';
            echo '<td>'.$row['nama_brg'].'</td>';
            echo '<td>'.$row['nama_kat'].'</td>';
            echo '<td>Rp. '.$row['harga_beli'].'</td>';
            echo '<td>Rp. '.$row['harga_jual'].'</td>';
            echo '<td>'.$row['stok'].'</td>';
            echo '</tr>';
        endforeach;
        ?>      
    </tbody>
</table>

</body>
</html>