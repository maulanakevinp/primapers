<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Profile";
        $profile = Profile::find(1);
        return view('profile.index', compact('title', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $profile = Profile::find($id);
        $request->validate([
            'title' => 'required',
            'photo' => 'image|mimes:jpeg,png,gif,webp|max:2048',
            'vision' => 'required',
            'mision' => 'required',
            'history' => 'required',
            'about' => 'required'
        ]);

        $file = $request->file('photo');
        $photo = $profile->photo;
        if (!empty($file)) {
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('img/profile'), $file_name);
            File::delete(public_path('img/profile/' . $profile->photo));
            $photo = $file_name;
        }

        Profile::where('id', $id)->update([
            'title' => $request->title,
            'photo' => $photo,
            'vision' => $request->vision,
            'mision' => $request->mision,
            'history' => $request->history,
            'about' => $request->about
        ]);

        return redirect('/profile')->with('success', 'Profile berhasil diperbarui');
    }
}
