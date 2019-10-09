<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Pengumuman";
        $announcements = Announcement::all();
        return view('announcement.index', compact('title', 'announcements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'announcement' => 'required|string'
        ]);
        Announcement::create([
            'description' => $request->announcement
        ]);
        return redirect('/announcement')->with('success', 'Pengumuman baru berhasil ditambahkan');
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
        $request->validate([
            'announcement' => 'required|string'
        ]);
        Announcement::where('id', $id)->update([
            'description' => $request->announcement
        ]);
        return redirect('/announcement')->with('success', 'Pengumuman berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announcement::destroy($id);
        return redirect('/announcement')->with('success', 'Pengumuman berhasil dihapus');
    }
}
