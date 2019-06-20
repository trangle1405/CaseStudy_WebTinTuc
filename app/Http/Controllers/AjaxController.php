<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\TypeOfNews;

class AjaxController extends Controller
{
    public function getTypeOfNews($category_id){
        $typeOfNews = TypeOfNews::where('category_id', $category_id)->get();
        foreach($typeOfNews as $value) {
             echo "<option value='". $value->id ."'>". $value->name."</option>";
            }
    }
}
