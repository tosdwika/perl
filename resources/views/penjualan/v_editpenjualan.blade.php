@extends('ui.dashboard')
@section('title', 'Edit Penjualan')
@section('content')
<form action="/penjualan/update/{{ $penjualan->id_penjualan }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="content">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Nama Barang</label>
                <div class="form-group">
                  <select class="custom-select form-control-border" id="exampleSelectBorder" name="id_barang">
                    <option selected value="{{ $penjualan->id_barang }}">{{ $penjualan->nama_barang }}</option>
                    @foreach ($barang as $data)
                    <option value="{{ $data->id_barang }}">{{ $data->nama_barang }}</option>
                    @endforeach
                  </select>
                  <div class="text-danger">
                    @error('id_barang')
                      {{ $message }}
                    @enderror
                  </div>
                </div>
            </div>
            <div class="form-group">
              <label>Jumlah Penjualan</label>
              <input class="form-control" name="jumlah_penjualan" value="{{ $penjualan->jumlah_penjualan }}">
              <div class="text-danger">
                @error('jumlah_penjualan')
                  {{ $message }}
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label>Nama Pegawai</label>
              <div class="form-group">
                <select class="custom-select form-control-border" id="exampleSelectBorder" name="nip">
                  <option selected value="{{ $penjualan->nip }}">{{ $penjualan->nama_pegawai }}</option>
                  @foreach ($pegawai as $data)
                  <option value="{{ $data->nip }}">{{ $data->nama_pegawai }}</option>
                  @endforeach
                </select>
                <div class="text-danger">
                  @error('nip')
                    {{ $message }}
                  @enderror
                </div>
              </div>
              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
        </div>
    </div>
</div>
</form>
@endsection