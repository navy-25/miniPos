<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function list_users()
    {
        $data = User::orderBy('name')->get();
        return view('admin.users', compact('data'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function store_users(Request $request)
    {
        try {
            $user = User::create([
                'name' => ucfirst($request->name),
                'status' => "Admin",
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan ' . $user->name);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function destroy_users($id)
    {
        try {
            $user = User::find($id);
            $user->delete($user);
            return redirect()->back()->with('success', 'Berhasil menghapus ' . $user->name);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function update_users(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->update([
                'name' => ucfirst($request->name),
                'email' => $request->email,
            ]);
            return redirect()->back()->with('success', 'Berhasil memperbarui ' . $user->name);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
    public function update_password_users(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if ($request->password == $request->new_password) {
                return redirect()->back()->with('error', 'Password baru tidak boleh sama dengan password');
            }
            if (password_verify($request->password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->new_password),
                ]);
            } else {
                return redirect()->back()->with('error', 'Password lama anda salah');
            }
            return redirect()->back()->with('success', 'Berhasil memperbarui ' . $user->name);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
