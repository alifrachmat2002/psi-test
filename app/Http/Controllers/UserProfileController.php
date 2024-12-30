<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user-profile.show', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $userId = $user->id; // ID user yang sedang diedit
        $rules = [
            'name' => ['sometimes', 'string', 'max:255'],
            'username' => ['sometimes', 'numeric', 'max_digits:100', 'unique:users,username,' . $userId],
            'jenis_kelamin' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'lowercase', 'email', 'max:255', 'ends_with:undip.ac.id', 'unique:users,email,' . $userId],
            'password' => ['sometimes', 'confirmed', Password::defaults()],
        ];

        // Kalau password kosong, skip validasi password
        if (!$request->filled('password')) {
            unset($rules['password']);
        }

        $request->validate($rules);

        $data = $request->only(['name', 'username', 'jenis_kelamin', 'email']);

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect('profile')->with('success', 'Profil berhasil diperbarui');
    }    
}
