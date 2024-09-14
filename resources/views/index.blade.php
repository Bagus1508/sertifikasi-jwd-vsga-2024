@extends('layouts.app')
 
@section('title', 'Informasi Beasiswa')
 
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="text-center">Beasiswa Indonesia Hebat</h3>
        </div>
        <div class="card-body">
            <h4 class="text-center">Terdapat 2 jenis beasiswa:</h4>
            <ul class="list-group list-group-flush my-4">
                <li class="list-group-item">1. Beasiswa Akademik</li>
                <li class="list-group-item">2. Beasiswa Non-Akademik</li>
            </ul>

            <h5 class="mt-4">Ketentuan:</h5>
            <ol>
                <li>
                    Semester saat ini: Pilih salah satu dari semester 1 sampai 8 (untuk S1 maksimal pada saat mendaftar di semester 8).
                </li>
                <li>
                    IPK: Diatas 3.0
                    <ul>
                        <li>Jika IPK kurang dari 3.0, kamu tidak dapat melanjutkan pendaftaran beasiswa.</li>
                    </ul>
                </li>
                <li>
                    Persyaratan Dokumen :
                    <ul>
                        <li>KTP</li>
                    </ul>
                    <ul>
                        <li>KTM</li>
                    </ul>
                    <ul>
                        <li>Transkrip Nilai</li>
                    </ul>
                    <ul>
                        <li>KRS</li>
                    </ul>
                    <div class="alert alert-warning mt-2">
                        Dokumen dijadikan satu dalam bentuk PDF atau Arsip
                    </div>
                </li>
            </ol>
            
            <div class="alert alert-warning mt-4" role="alert">
                <strong>Catatan:</strong> Pastikan IPK kamu di atas 3.0 untuk bisa mendaftar program beasiswa ini.
            </div>
        </div>
    </div>
</div>
@endsection