<?php

namespace App\Http\Controllers;

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
        $title = "Category";
        $subtitle = "Sub Category";
        return view('category.index', compact('title', 'subtitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
