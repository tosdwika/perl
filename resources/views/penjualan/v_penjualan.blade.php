@extends('ui.dashboard')
@section('title','Penjualan')
@section('content')
<a href="/penjualan/tambah" class="btn btn-sm btn-primary">Tambah</a>
<a href="/penjualan/cetak_pdf" class="btn btn-sm btn-warning" target="_blank">Cetak Laporan</a>
@if (session('pesan'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ session('pesan') }}
</div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Harga Barang</th>
        <th>Jumlah Penjualan</th>
        <th>Total Penjualan</th>
        <th>Pegawai</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($penjualan as $data)
    <?php
    $date = $data->tanggal_penjualan;
    $a = $data->harga_barang; 
    $b = $data->jumlah_penjualan;

    $tot = $a * $b;
    ?>
        <tr>
            <td>{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d M Y H:i:s') }}</td>
            <td>{{ $data->nama_barang }}</td>
            <td>Rp. {{ $data->harga_barang }}</td>
            <td>{{ $data->jumlah_penjualan }}</td>
            <td>Rp. {{ $tot }}</td>
            <td>{{ $data->nama_pegawai }}</td>
            <td>
                <a href="/penjualan/detail/{{ $data->id_penjualan }}" class="btn btn-sm btn-primary">Detail</a>
                <a href="/penjualan/edit/{{ $data->id_penjualan }}" class="btn btn-sm btn-warning">Edit</a>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_penjualan }}">
                    Hapus
                </button>
            </td>
        </tr>
    @endforeach
</tbody>
</table>

@foreach ($penjualan as $data)
<div class="modal fade" id="delete{{ $data->id_penjualan }}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">{{ $data->nama_barang }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Yakin ingin meghapus {{ $data->nama_barang }}</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Tidak</button>
          <a href="/penjualan/delete/{{ $data->id_penjualan }}" class="btn btn-sm btn-warning">Ya</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endforeach
@endsection