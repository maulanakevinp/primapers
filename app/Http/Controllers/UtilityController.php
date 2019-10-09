<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utility;
use Exception;
use File;

class UtilityController extends Controller
{
    public function slide()
    {
        $utility = Utility::find(1);
        $title = 'Utilities';
        return view('utilities.slide', compact('title', 'utility'));
    }

    public function updateSlide(Request $request, $photo)
    {
        $request->validate([
            $photo => 'required|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $old_photo = Utility::find(1);

        $file = $request->file($photo);

        if (!empty($old_photo->$photo)) {
            File::delete(public_path('img/carousel/' . $old_photo->$photo));
        }

        $file_name = time() . "_" . $file->getClientOriginalName();

        $file->move(public_path('img/carousel'), $file_name);

        Utility::where('id', 1)->update([
            $photo => $file_name
        ]);

        return redirect('/slide')->with('success', 'Foto berhasil diupload');
    }

    public function destroySlide($photo)
    {
        $old_photo = Utility::find(1);
        File::delete(public_path('img/carousel/' . $old_photo->$photo));

        Utility::where('id', 1)->update([
            $photo => null
        ]);

        return redirect('/slide')->with('success', 'Foto berhasil dihapus');
    }

    public function header()
    {
        $utility = Utility::find(1);
        $title = 'Utilities';
        return view('utilities.header', compact('title', 'utility'));
    }

    public function updateHeader(Request $request)
    {
        $request->validate([
            'header' => 'required|image|mimes:jpeg,png,gif,webp|max:2048'
        ]);

        $old_photo = Utility::find(1);

        $file = $request->file('header');

        if (!empty($old_photo->header)) {
            File::delete(public_path('img/navbar/' . $old_photo->header));
        }

        $file_name = time() . "_" . $file->getClientOriginalName();

        $file->move(public_path('img/navbar'), $file_name);

        Utility::where('id', 1)->update([
            'header' => $file_name
        ]);

        return redirect('/header')->with('success', 'Header berhasil diperbarui');
    }

    public function updateColor(Request $request)
    {
        $request->validate([
            'color' => 'required'
        ]);

        Utility::where('id', 1)->update([
            'color' => $request->color
        ]);
        return redirect('/header')->with('success', 'font color berhasil diperbarui');
    }

    public function destroyHeader()
    {
        $utilitiy = Utility::find(1);
        File::delete(public_path('img/navbar/' . $utilitiy->header));

        Utility::where('id', 1)->update([
            'header' => null
        ]);

        return redirect('/header')->with('success', 'header berhasil dihapus');
    }
}
