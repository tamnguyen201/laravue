<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('categoryRank')->get();
        return response()->json(['categories'=>$categories],200);
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $category = new Category([
            'categoryName' => $request->get('categoryName'),
            'categoryRank' => $request->get('categoryRank')
            ]);
        $category->save();
        $categories = Category::orderBy('categoryRank')->get();
        return response()->json(['categories'=>$categories,'alert'=>'Create category successfully']);
    }

    
    public function show(Category $category)
    {
        return response()->json($category);
    }

    
    public function edit(Category $category)
    {
        return response()->json($category);
    }

    
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json(['alert'=>'Cập nhật thành công!']);
    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        $categories = Category::orderBy('categoryRank')->get();
        return response()->json(['categories'=>$categories, 'alert'=>'Xóa thành công!']);
    }
}
