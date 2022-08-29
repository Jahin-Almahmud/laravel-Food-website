<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.home');
    }
    public function booktable(Request $request)
    {
       $fail =  $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|nullable',
            'date' => 'required',
            'people' => 'required',
            'message' => 'nullable',
        ]);
   
        DB::table('booktables')->insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'date'=> $request->date,
            'people'=> $request->people,
            'message'=> $request->message,
            'created_at'=> Carbon::now(),
        ]);
        Toastr::success('successfully', 'success');
        return redirect('/#book-a-table');
    }
    public function message(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);
        Message::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'Message' => $request->message,
        ]);

        Toastr::success('Message send successfully', 'success');
        return redirect('/#contact');
    }
}
