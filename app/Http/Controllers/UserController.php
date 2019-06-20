<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\UserValidation;
use App\Http\Requests\AdminLoginValidation;

class UserController extends Controller
{
    public function list()
    {
        $user = User::all();
        return view('admin.user.list', compact('user'));
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(UserValidation $request)
    {
        $request['password'] = bcrypt($request->password);
        $attribute = $request->all();
        $user = User::create($attribute);
        return redirect('admin/user/list')->with('message', 'Đã thêm user!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->change_password == 1) {
            $request['password'] = bcrypt($request->password);
        }
        $attribute = $request->all();
        $user->update($attribute);
        return redirect('admin/user/list')->with('message', 'Đã Sửa User!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/user/list')->with('message', 'Đã Xóa Thanh Cong!');
    }

    public function getAdminLogin()
    {
        return view('admin.login');
    }

    public function postAdminLogin(AdminLoginValidation $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return redirect('admin/category/list');
        else
            return redirect('admin/login')->with('message', 'Đăng Nhập không thành công!');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }


}
