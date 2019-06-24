<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeOfNews;
use App\Category;
use App\Http\Requests\CategoryValidation;

class TypeOfNewsController extends Controller
{
    public function list()
    {
        $typeOfNews = TypeOfNews::all();
        return view('admin.typeOfNews.list', compact('typeOfNews'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.typeOfNews.add', compact('category'));
    }

    public function store(CategoryValidation $request)
    {
        $request['name_slug'] = str_slug($request->name);
        $attribute = $request->all();
        $typeOfNews = TypeOfNews::create($attribute);
        return redirect('admin/typeOfNews/list')->with('message', 'Đã thêm Loại Tin!');
    }

    public function edit($id)
    {
        $category = Category::all();
        $typeOfNews = TypeOfNews::findOrFail($id);
        return view('admin.typeOfNews.edit', compact('typeOfNews', 'category'));
    }

    public function update(CategoryValidation $request, $id)
    {
        $typeOfNews = TypeOfNews::findOrFail($id);
        $request['name_slug'] = str_slug($request->name);
        $attribute = $request->all();
        $typeOfNews->update($attribute);
        return redirect('admin/typeOfNews/list')->with('message', 'Đã Sửa Thể Loại!');
    }

    public function destroy($id)
    {
        $typeOfNews = TypeOfNews::findOrFail($id);
        $typeOfNews->delete();
        return redirect('admin/typeOfNews/list')->with('message', 'Đã xóa Thể Loại!');
    }

}
