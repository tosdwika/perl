@extends('ui.dashboard')
@section('title','Tambah Barang')
@section('content')
<form action="/barang/insert" method="POST" enctype="multipart/form-data">
@csrf

<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>ID Barang</label>
                <input name="id_barang" class="form-control" value="{{ old('id_barang') }}">
                <div class="text-danger">
                    @error('id_barang')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input name="nama_barang" class="form-control" value="{{ old('nama_barang') }}">
                <div class="text-danger">
                    @error('nama_barang')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Harga Barang</label>
                <input name="harga_barang" class="form-control" value="{{ old('harga_barang') }}">
                <div class="text-danger">
                    @error('harga_barang')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Jumlah Barang</label>
                <input name="jumlah_barang" class="form-control" value="{{ old('jumlah_barang') }}">
                <div class="text-danger">
                    @error('jumlah_barang')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Foto Barang</label>
                <input type="file" name="foto_barang" class="form-control">
                <div class="text-danger">
                    @error('foto_barang')
                        {{ $message }}
                    @enderror
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