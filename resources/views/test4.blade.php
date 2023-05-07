@extends('ui.dashboard')
@section('title','Detail Pegawai')
@section('content')
<?php
$arrayz = array(1,4,5,3,2,5,3,4,8,5,4,3,6,0,4,3,2,1,5,9,9,4,3,1,3,0,2,2,4,6,2,4,7,4);

$jumlah_array = count($arrayz);
$tambah_array = array_sum($arrayz);

?>

{{ $jumlah_array }}<br>
{{ $tambah_array }}
@endsection()