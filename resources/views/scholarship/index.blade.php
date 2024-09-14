@extends('layouts.app')
 
@section('title', 'Daftar Beasiswa')
 
@section('content')
<div class="container form-container">
    <div class="card shadow-sm my-5">
        <div class="card-header bg-primary text-white text-center">
            <h4>Registrasi Beasiswa</h4>
        </div>
        <div class="alert alert-danger mt-4" role="alert" id="alert_register">
            <strong>Catatan:</strong> Mohon maaf anda tidak bisa mendaftar dikarenakan IPK kurang dari 3.0 .
        </div>
        <div class="card-body">
            <form id="beasiswaForm" method="POST" action="{{route('scholarship.store')}}" enctype="multipart/form-data">
                @csrf
                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">Masukkan Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                    @if ($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Masukkan Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    @if ($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
    
                <!-- Nomor HP -->
                <div class="mb-3">
                    <label for="hp" class="form-label">Nomor HP</label>
                    <input type="number" class="form-control" id="hp" name="phone_number" placeholder="08xxxxxxxxxx" required>
                    @if ($errors->has('phone_number'))
                        <div class="text-danger">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                </div>
    
                <!-- Semester -->
                <div class="mb-3">
                    <label for="semester" class="form-label">Semester saat ini</label>
                    <select class="form-select" id="semester" name="semester" required>
                        <option disabled selected>Pilih Semester</option>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                    </select>
                    @if ($errors->has('semester'))
                        <div class="text-danger">
                            {{ $errors->first('semester') }}
                        </div>
                    @endif
                </div>
    
                <!-- IPK -->
                <div class="mb-3">
                    <label for="ipk" class="form-label">IPK terakhir</label>
                    <input type="text" class="form-control" name="gpa" id="ipk" placeholder="Masukan IPK Contoh : 3.8" readonly>
                    @if ($errors->has('gpa'))
                        <div class="text-danger">
                            {{ $errors->first('gpa') }}
                        </div>
                    @endif
                </div>
    
                <!-- Pilihan Beasiswa -->
                <div class="mb-3">
                    <label for="beasiswa" class="form-label">Pilihan Beasiswa</label>
                    <select class="form-select" id="beasiswa" name="scholarship_type" disabled>
                        <option disabled selected>Pilihan Beasiswa</option>
                        <option value="Beasiswa Akademik">Beasiswa Akademik</option>
                        <option value="Beasiswa Non-Akademik">Beasiswa Non-Akademik</option>
                    </select>
                    @if ($errors->has('scholarship_type'))
                        <div class="text-danger">
                            {{ $errors->first('scholarship_type') }}
                        </div>
                    @endif
                </div>
    
                <!-- Upload Berkas -->
                <div class="mb-3">
                    <label for="file" class="form-label">Upload Berkas Syarat</label>
                    <input type="file" class="form-control" name="file" id="file" disabled>
                    @if ($errors->has('file'))
                        <div class="text-danger">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                </div>
    
                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="reset" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-primary" id="submit" disabled>Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Array IPK yang mungkin
    const ipkValues = [3.40, 2.90];

    function initializeForm(ipk) {
        const beasiswaSelect = document.getElementById('beasiswa');
        const file = document.getElementById('file');
        const submit = document.getElementById('submit');

        if (ipk < 3) {
            beasiswaSelect.disabled = true;
            file.disabled = true;
            submit.disabled = true;
            alert_register.classList.remove('d-none');
        } else {
            beasiswaSelect.disabled = false;
            file.disabled = false;
            submit.disabled = false;
            alert_register.disabled = false;
            alert_register.classList.add('d-none');

            // Pindahkan fokus ke pilihan beasiswa
            beasiswaSelect.focus();
        }
    }

    
    document.addEventListener('DOMContentLoaded', function() {
        // Misalnya kita ambil IPK pertama dari array untuk demonstrasi
        const ipk = ipkValues[Math.floor(Math.random() * 2)];
        document.getElementById('ipk').value = ipk.toFixed(2);
        initializeForm(ipk);
    });
</script>
@endsection