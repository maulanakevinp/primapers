<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utility;
use File;
class UtilityController extends Controller
{
    public function slide()
    {
        $utility = Utility::find(1);
        $title = 'Utilities';
        return view('utilities.slide', compact('title','utility'));
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function header()
    {
        $title = "Utilities";
        $categories = Category::all();
        return view('category.index', compact('title', 'categories'));
    }
}
