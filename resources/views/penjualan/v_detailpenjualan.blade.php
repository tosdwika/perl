@extends('ui.dashboard')
@section('title','Detail Penjualan')
@section('content')
<table class="table table-borderless">
    <?php 
    $a = $penjualan->harga_barang;
    $b = $penjualan->jumlah_penjualan;

    $tot = $a * $b;
    ?>
    <tr>
        <th width="150px">ID Penjualan</th>
        <th width="30px">:</th>
        <th width="150px">{{ $penjualan->id_penjualan }}</th>
    </tr>
    <tr>
        <th width="150px">Nama Barang</th>
        <th width="30px">:</th>
        <th>{{ $penjualan->nama_barang }}</th>
    </tr>
    <tr>
        <th width="150px">Foto Barang</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto/'.$penjualan->foto_barang) }}" width="300px" alt=""></th>
    </tr>
    <tr>
        <th width="150px">Harga Barang</th>
        <th width="30px">:</th>
        <th>Rp. {{ $penjualan->harga_barang }}</th>
    </tr>
    <tr>
        <th width="150px">Jumlah Penjualan</th>
        <th width="30px">:</th>
        <th>{{ $penjualan->jumlah_penjualan }}</th>
    </tr>
    <tr>
        <th width="150px">Total Harga</th>
        <th width="30px">:</th>
        <th>Rp. {{ $tot }}</th>
    </tr>
    <tr>
        <th width="150px">Nama Pegawai</th>
        <th width="30px">:</th>
        <th>{{ $penjualan->nama_pegawai }}</th>
    </tr>
    <tr>
        <th width="150px"></th>
        <th width="30px"></th>
        <th width="30px"></th>
        <th>
            <a href="/penjualan" class="btn btn-sm btn-primary">Kembali</a>
        </th>
    </tr>
</table>
@endsection