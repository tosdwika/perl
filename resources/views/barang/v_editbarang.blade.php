@extends('ui.dashboard')
@section('title','Edit Barang')
@section('content')
<form action="/barang/update/{{ $barang->id_barang }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>ID Barang</label>
                <input name="id_barang" class="form-control" value="{{ $barang->id_barang }}" readonly>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">
                <div class="text-danger">
                    @error('nama_barang')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Harga Barang</label>
                <input name="harga_barang" class="form-control" value="{{ $barang->harga_barang }}">
                <div class="text-danger">
                    @error('harga_barang')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Jumlah Barang</label>
                <input name="jumlah_barang" class="form-control" value="{{ $barang->jumlah_barang }}">
                <div class="text-danger">
                    @error('jumlah_barang')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Foto Barang</label>
                <div class="col-sm-14">
                    <div class="col-sm-6">
                        <img src="{{ url('foto/'.$barang->foto_barang) }}" width="150px" alt="">
                    </div>
                    <div class="col-sm-8">
                        <input type="file" name="foto_barang" class="form-control">
                        
                    </div>
                </div>
            </div>
            <div class="form-group">
            <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection