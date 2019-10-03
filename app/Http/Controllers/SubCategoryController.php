<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        $title = "Kategori";
        $subtitle = "Sub Kategori";
        $subcategories = Subcategory::where('category_id', $category)->get();
        $category = Category::find($category);
        return view('subcategory.index', compact('title', 'subtitle', 'subcategories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $category)
    {
        $request->validate([
            'sub_category' => 'required|string'
        ]);
        Subcategory::create([
            'category_id' => $category,
            'sub_category' => $request->sub_category
        ]);
        return redirect('/subcategory' . '/' . $category)->with('success', 'Sub Kategori baru berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $category)
    {
        $request->validate([
            'sub_category' => 'required|string'
        ]);
        Subcategory::where('id', $id)->update([
            'sub_category' => $request->sub_category
        ]);
        return redirect('/subcategory' . '/' . $category)->with('success', 'Sub Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $category)
    {
        Subcategory::destroy($id);
        return redirect('/subcategory' . '/' . $category)->with('success', 'Sub Kategori berhasil diperbarui');
    }

    public function getSubCategories(Request $request)
    {
        $id = $request->id;
        $sub_categories = Subcategory::where('category_id', $id)->get();

        echo "<option value=''> Pilih Sub Kategori </option>";
        foreach ($sub_categories as $sub_category) {
            echo "<option value='" . $sub_category['id'] . "'>" . $sub_category['sub_category'] . "</option>";
        }
    }
}
