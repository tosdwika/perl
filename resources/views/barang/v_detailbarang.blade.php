@extends('ui.dashboard')
@section('title','Detail Barang')
@section('content')
<table class="table table-borderless">
    <tr>
        <th width="150px">ID Barang</th>
        <th width="30px">:</th>
        <th width="150px">{{ $barang->id_barang }}</th>
    </tr>
    <tr>
        <th width="150px">Nama Barang</th>
        <th width="30px">:</th>
        <th>{{ $barang->nama_barang }}</th>
    </tr>
    <tr>
        <th width="150px">Harga Barang</th>
        <th width="30px">:</th>
        <th>{{ $barang->harga_barang }}</th>
    </tr>
    <tr>
        <th width="150px">Jumlah Barang</th>
        <th width="30px">:</th>
        <th>{{ $barang->jumlah_barang }}</th>
    </tr>
    <tr>
        <th width="150px">Foto Barang</th>
        <th width="30px">:</th>
        <th><img src="{{ url('foto/'.$barang->foto_barang) }}" width="300px" alt=""></th>
    </tr>
    <tr>
        <th width="150px"></th>
        <th width="30px"></th>
        <th width="30px"></th>
        <th>
            <a href="/barang" class="btn btn-sm btn-primary">Kembali</a>
        </th>
    </tr>
</table>
@endsection