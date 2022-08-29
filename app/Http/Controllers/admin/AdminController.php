<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booktable;
use App\Models\Message;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }
    public function profile()
    {
        return view('dashboard.profile');
    }
    public function passwordchange(Request $request)
    {
        $request->validate([
            'old_password'=> 'required',
            'new_password'=> 'required|min:6',
            'confirm_password'=> 'required|same:new_password',
        ]);
    

        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user_id = Auth::user()->id;
            User::find($user_id)->update([
                'password' => Hash::make($request->new_password),
            ]);

        }
        else {
            Toastr::error('Old password does not match');

            return back();
        }

        Toastr::success('password changed successfully');
        return back();
    }
    public function booktable()
    {
        return view('dashboard.bookedtable');
    }
    public function booktabledelete($id)
    {
        Booktable::find($id)->delete();
        Toastr::success('Deleted successfully');
        return back();
    }
    public function message()
    {
        return view('dashboard.message');
    }
    public function delete($id)
    {
        Message::find($id)->delete();
        Toastr::success('Deleted successfully');
        return back();
    }
}
