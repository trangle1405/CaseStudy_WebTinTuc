<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\News;
use App\Category;
use App\TypeOfNews;
use App\Http\Requests\NewsValidation;

class CommentController extends Controller
{

    public function destroy($id, $news_id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect('admin/news/edit/'.$news_id)->with('message', 'Đã Xóa Comment!');
    }

}
