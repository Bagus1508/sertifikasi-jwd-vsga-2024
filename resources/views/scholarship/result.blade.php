@extends('layouts.app')
 
@section('title', 'Informasi Beasiswa')
 
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="overflow-auto my-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th class="text-nowrap" scope="col">No</th>
                    <th class="text-nowrap" scope="col">Nama</th>
                    <th class="text-nowrap" scope="col">Email</th>
                    <th class="text-nowrap" scope="col">No HP</th>
                    <th class="text-nowrap" scope="col">Semester</th>
                    <th class="text-nowrap" scope="col">IPK Terakhir</th>
                    <th class="text-nowrap" scope="col">Pilihan Beasiswa</th>
                    <th class="text-nowrap" scope="col">Berkas</th>
                    <th class="text-nowrap" scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)                        
                    <tr>
                        <th scope="row">{{$loop->index + 1}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone_number}}</td>
                        <td>{{$item->semester}}</td>
                        <td>{{$item->gpa}}</td>
                        <td>{{$item->scholarship_type}}</td>
                        <td>
                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary px-4 py-2">Lihat</a>
                        </td>
                        <td>
                            @if ($item->submission_status == 1)
                                <span class="badge bg-primary">Belum di verifikasi</span> 
                            @elseif($item->submission_status == 2)
                                <span class="badge bg-success">Lolos</span>
                            @elseif($item->submission_status == 3)
                                <span class="badge bg-danger">Tidak Lolos</span>
                            @elseif($item->submission_status == 4)
                                <span class="badge bg-warning">Review</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection