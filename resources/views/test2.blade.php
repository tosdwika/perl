@extends('ui.dashboard')
@section('title','Detail Pegawai')
@section('content')
<?php
//membuat bilangan 1/100
for($bil = 1; $bil <= 100; $bil++){
    $a =0;
    //membuat perulangan bilangan
    for($j=1;$j<=$bil;$j++){
        //logika mencari bilangan prima
        if ($bil % $j == 0) {
            $a++;
        }
    }
    if ($a == 2){
        echo $bil.'';
    } 
    }
?>

{{-- Memanggil Hasil --}}
{{ $bil }}
@endsection()