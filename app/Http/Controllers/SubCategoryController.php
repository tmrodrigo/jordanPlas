<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;

class SubCategoryController extends Controller
{
    
    public function create(Request $request){

        SubCategory::create($request->all());

        return back()->with('message', 'Sub categoría creada');

    }

    public function update(Request $request, SubCategory $sub_category)
    {

        $sub_category->update($request->all());

        return back()->with('message', 'Sub categoría ' . $sub_category->name . ' editada');
    }


    public function delete(SubCategory $sub_category){

        $sub_category->delete();

        return back()->with('message', 'Sub categoría ' . $sub_category->name . ' eliminada');

    }


}
