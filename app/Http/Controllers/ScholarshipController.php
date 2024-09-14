<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipParticipants;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index(){

        return view('scholarship.index');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|numeric|digits_between:10,15',
            'semester' => 'required|integer|between:1,8',
            'gpa' => 'required|numeric|min:0|max:4|regex:/^\d+(\.\d{1,2})?$/',
            'scholarship_type' => 'required|string',
            'file' => 'required|mimes:pdf,zip|max:2048',
        ], [
            'name.required' => 'Nama harus diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            
            'phone_number.required' => 'Nomor telepon harus diisi.',
            'phone_number.numeric' => 'Nomor telepon harus berupa angka.',
            'phone_number.digits_between' => 'Nomor telepon harus antara 10 hingga 15 digit.',
            
            'semester.required' => 'Semester harus diisi.',
            'semester.integer' => 'Semester harus berupa angka bulat.',
            'semester.between' => 'Semester harus berada antara 1 hingga 8.',
            
            'gpa.required' => 'IPK harus diisi.',
            'gpa.numeric' => 'IPK harus berupa angka.',
            'gpa.min' => 'IPK harus minimal 0.',
            'gpa.max' => 'IPK tidak boleh lebih dari 4.',
            'gpa.regex' => 'Format IPK tidak valid. Harus berupa angka dengan maksimal dua angka di belakang koma.',
            
            'scholarship_type.required' => 'Jenis beasiswa harus diisi.',
            'scholarship_type.string' => 'Jenis beasiswa harus berupa teks.',
            
            'file.required' => 'File harus diupload.',
            'file.mimes' => 'File harus berupa pdf atau zip.',
            'file.max' => 'File tidak boleh lebih dari 2MB.',
        ]);

        if($validated){
            $validated['submission_status'] = 1;
    
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filePath = $file->store('uploads', 'public');
    
                $validated['file'] = $filePath;
            }
    
            $storeData = ScholarshipParticipants::create($validated);

            return redirect(route('result-scholarship.index'))->with('success', 'Anda berhasil mendaftar beasiswa!');
        } else {
            return redirect()->back()->with('error', 'Maaf, Anda gagal mendaftar beasiswa!');
        }
    }

    public function result(){
        $data = ScholarshipParticipants::get()->all();

        return view('scholarship.result', compact('data'));
    }
}
