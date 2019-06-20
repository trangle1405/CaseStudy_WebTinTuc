<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\TypeOfNews;
use App\News;
use App\User;
use App\Slide;
use App\Comment;
use App\Http\Requests\AdminLoginValidation;
use App\Http\Requests\UserValidation;

class HomeController extends Controller
{
    public function __construct()
    {
        $category = Category::all();
        $slide = Slide::all();
        view()->share('category', $category);
        view()->share('slide', $slide);

    }

    public function index()
    {
        $category = Category::all();
        return view('page.home');
    }

    public function typeOfNews($id)
    {
        $typeOfNews = TypeOfNews:: findOrFail($id);
        $news = News::where('typeOfNews_id', $id)->paginate(5);
        return view('page.category', compact('typeOfNews', 'news'));
    }

    public function news($id)
    {
        $news = News:: findOrFail($id);
        $featured_new = News::where('featured_news', 1)->take(3)->get();
        $related_news = News::where('typeOfNews_id', $news->typeOfNews_id)->take(3)->get();
        return view('page.news', compact('news', 'featured_new', 'related_news'));
    }

    public function comment(Request $request, $id)
    {
        $news = News:: findOrFail($id);
        $attribute = $request->all();
        $attribute['news_id'] = $id;
        $attribute['user_id'] = Auth::user()->id;
        $comment = Comment::create($attribute);
        return redirect('news/' . $id . '/' . $news->title_slug . ".html")->with('message', 'Đã thêm comment!');

    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function postLogin(AdminLoginValidation $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect('/');
        else
            return redirect('/login')->with('message', 'Tên đăng nhập hoặc mật khẩu không đúng');

    }


    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getUserInfo()
    {
        $user = Auth::user();
        return view('page.user-profile', compact('user'));
    }

    public function postUserInfo(Request $request)
    {
        $user = Auth::user();
        if ($request->change_password == 1) {
            $request['password'] = bcrypt($request->password);
        }
        $attribute = $request->all();
        $user->update($attribute);
        return redirect('user_info')->with('message', 'Đã Sửa User!');

    }

    public function getRegister()
    {
        return view('page.register');
    }

    public function postRegister(UserValidation $request)
    {
        $request['password'] = bcrypt($request->password);
        $request['level'] = 0;
        $attribute = $request->all();
        $user = User::create($attribute);
        return redirect('/login')->with('message', 'Đã thêm user!');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $news = News::where('title', 'like', '%' . $keyword . '%')
            ->orwhere('summary', 'like', '%' . $keyword . '%')
            ->orwhere('content', 'like', '%' . $keyword . '%')
            ->take(10)->paginate(5);
        return view('page.search', compact('news', 'keyword'));
    }

}
