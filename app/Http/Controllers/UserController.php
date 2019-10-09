<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePassword()
    {
        $title = 'Utilities';
        return view('auth.change-password', compact('title'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6'
        ]);
        $user = User::find($id);
        if (Hash::check($request->current_password, $user->password)) {
            if ($request->current_password == $request->confirm_password) {
                return redirect('/change-password')->with('failed', 'Password tidak berubah');
            } else {
                if ($request->new_password == $request->confirm_password) {
                    User::where('id', $id)->update([
                        'password' => Hash::make($request->confirm_password)
                    ]);
                    return redirect('/change-password')->with('success', 'Password berhasil diubah');
                } else {
                    return redirect('/change-password')->with('failed', 'Konfirmasi password tidak sama');
                }
            }
        } else {
            return redirect('/change-password')->with('failed', 'Password berbeda dengan yang lama');
        }
    }
}
