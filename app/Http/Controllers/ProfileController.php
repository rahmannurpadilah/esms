<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('employee.main_profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'fullname' => 'nullable|string|max:255',
            'no_ktp' => 'nullable|digits:16|unique:users,no_ktp,' . $user->id,
            'address' => 'nullable|string',
            'email' => 'nullable|email|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|digits_between:10,12|unique:users,no_hp,' . $user->id,
            'maritalstatus' => 'nullable|boolean',
            'gender' => 'nullable|boolean',
            'mothers_name' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            'no_hp.digits_between' => 'The handphone number field must be between 10 and 12 digits.',
        ]);

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();

            if ($user->profile_picture && Storage::exists( $user->profile_picture)) {
                Storage::delete($user->profile_picture);
            }

            $image->storeAs('profile_pictures', $imageName);
            $validatedData['profile_picture'] = 'profile_pictures/' . $imageName;
        } else {
            $validatedData['profile_picture'] = $user->profile_picture;
        }

        $user->update($validatedData);

        return redirect()->route('main-profile')->with('success', 'Update successful!');
    }
    
    public function changePassword(Request $request){

        $user = auth()->user();

        $validatedData = $request->validate([
            'current_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6|confirmed'
        ]);

        if(!Hash::check($validatedData['current_password'], $user->password)){
            return back()->withErrors(['current_password' => 'The old password is not suitable']);
        }

        $user->update([
            'password' => Hash::make($validatedData['new_password'])
        ]);

        return redirect()->route('main-profile')->with('success', 'Update successful!');
    }
}
