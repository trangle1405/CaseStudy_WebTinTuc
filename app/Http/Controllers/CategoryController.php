<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryValidation;

class CategoryController extends Controller
{
    public function list(){
        $category = Category::all();
        return view('admin.category.list', compact('category'));
    }
    public function create(){
        return view('admin.category.add');
    }
    public function store(CategoryValidation $request){
        $request['name_slug'] = str_slug($request->name);
        $attribute = $request->all();
        $category = Category::create($attribute);
        return redirect('admin/category/list')->with('message','Đã thêm Thể Loại!');
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(CategoryValidation $request, $id){
        $category = Category::findOrFail($id);
        $request['name_slug'] = str_slug($request->name);
        $attribute = $request->all();
        $category->update($attribute);
        return redirect('admin/category/list')->with('message','Đã Sửa Thể Loại!');
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('admin/category/list')->with('message','Đã Xóa Thể Loại!');
    }
}
