@extends('ui.dashboard')
@section('title','Detail Pegawai')
@section('content')
<?php
//Membuat nilai saldo dan persen bunga
$saldo_awal = 75000;
$bunga = 0.06;
$bulan=12;
$saldoinject=800000;
$totalinject=0.03;

//membuat logika menghitung saldo akhir
$saldoakhir=($saldo_awal+($saldoinject*$totalinject))+($saldo_awal*$bunga*$bulan);

?>

{{-- Menampilkan saldo akhir --}}
{{ $saldoakhir }}
@endsection()