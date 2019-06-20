<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\SlideValidation;

class SlideController extends Controller
{
    public function list()
    {
        $slide = Slide::all();
        return view('admin.slide.list', compact('slide'));
    }

    public function create()
    {

        return view('admin.slide.add');
    }

    public function store(SlideValidation $request)
    {
        $attribute = $request->all();
        if (!$request->hasFile('image')) {
            $request['image'] = '';
        } else {
            $file = $request->file('image');

            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $newFileName = rand(11111, 99999) . "_" . $fileName . "." . $fileExtension;
            $request->file('image')->storeAs('public/images', $newFileName);
            //$request['image'] = $newFileName;
            //dd($newFileName);
            $attribute['image'] = $newFileName;

        }

        $slide = Slide::create($attribute);
        return redirect('admin/slide/list')->with('message', 'Đã thêm  Slide!');
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);

        return view('admin.slide.edit', compact('slide'));
    }

    public function update(SlideValidation $request, $id)
    {   $slide = Slide::findOrFail($id);
        $attribute = $request->all();
        if (!$request->hasFile('image')) {
            $request['image'] = '';
        } else {
            $file = $request->file('image');

            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
            $newFileName = rand(11111, 99999) . "_" . $fileName . "." . $fileExtension;
            $request->file('image')->storeAs('public/images', $newFileName);
            $attribute['image'] = $newFileName;

        }

        $slide->update($attribute);
        return redirect('admin/slide/list')->with('message', 'Đã sua  Slide!');
    }

    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return redirect('admin/slide/list')->with('message', 'Đã xoa Slide!');
    }
}
