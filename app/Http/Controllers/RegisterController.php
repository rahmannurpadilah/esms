<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showRegisterForm()
    {
        return view('login-register.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi semua inputan dari form registrasi lalu menyimpannya ke database user
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255', 
            'no_ktp' => 'required|integer|unique:users,no_ktp|digits:16',
            'address' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'no_hp' => 'required|integer|unique:users,no_hp|digits_between:10,12',
            'maritalstatus' => 'required|boolean',
            'gender' => 'required|boolean',
            'mothers_name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengambil gambar dari form lalu mengubah nama gambarnya menjadi format time.now-(4 angka random) lalu menyimpannya di storage
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('profile_pictures', $imageName);
            $validatedData['profile_picture'] = 'profile_pictures/' . $imageName;
        } else {
            $validatedData['profile_picture'] = null;
        }

        // Buat user baru
        User::create([
            'fullname' => $validatedData['fullname'],
            'no_ktp' => $validatedData['no_ktp'],
            'address' => $validatedData['address'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'no_hp' => $validatedData['no_hp'],
            'maritalstatus' => $validatedData['maritalstatus'],
            'gender' => $validatedData['gender'],
            'mothers_name' => $validatedData['mothers_name'],
            'profile_picture' => $validatedData['profile_picture'],
        ]);


        // Pindah ke halaman login jika registrasi berhasil
        return redirect()->route('show-login')->with('success', 'Registration successful! Please log in.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
