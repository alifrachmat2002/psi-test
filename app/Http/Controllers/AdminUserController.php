<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required','numeric', 'max_digits:100', 'unique:'.User::class],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class, 'ends_with:undip.ac.id'],
            'role' => ['required', 'in:1,2'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'level' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'User ' . $user->name . ' berhasil dibuat');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
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

        return redirect()->route('admin.users')->with('success', 'User berhasil diupdate');
    }
}
