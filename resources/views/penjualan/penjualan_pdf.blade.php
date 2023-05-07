<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pejualan</title>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
</head>
<body>

	<center>
		<h3>LAPORAN PENJUALAN</h3>
		<h3>PT. HANA STAR INDONESIA</h3>
	</center>
 
	<table class='table table-bordered' id="customers">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal Penjualan</th>
				<th>Nama Barang</th>
				<th>Harga Barang</th>
				<th>Jumlah Penjualan</th>
				<th>Total Penjualan</th>
				<th>Pegawai</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($penjualan as $data)
            <?php
            $date = $data->tanggal_penjualan;
            $a = $data->harga_barang; 
            $b = $data->jumlah_penjualan;

            $tot = $a * $b;
            ?>
			<tr>
				<td>{{ $i++ }}</td>
                <td>{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d M Y H:i') }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>Rp. {{ $data->harga_barang }}</td>
                <td>{{ $data->jumlah_penjualan }}</td>
                <td>Rp. {{ $tot }}</td>
                <td>{{ $data->nama_pegawai }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>