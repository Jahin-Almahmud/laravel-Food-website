<?php

use App\Models\Aboutsetting;
use App\Models\Booktable;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\User;

function users(){
    return User::all();
}
function sliders(){
    return Slider::all();
}
function book_a_tabel_number()
{
    return Setting::where('setting_name','Book_a_Table')->first();
}
function Emailaddress()
{
    return Setting::where('setting_name','Email')->first();
}
function Opening(){
    return Setting::where('setting_name','Opening')->first();
}
function address(){
    return Setting::where('setting_name','address')->first();
}

function abouts(){
    return Aboutsetting::all();
}
function aboutshows(){
    return Aboutsetting::where('status', 'show')->get();
}
function categories(){
    return Category::all();
}
function foods(){
    return Food::latest()->get();
}
function categorywisefoods($id){
    return Food::where('category_id', $id)->get();
}
function chefs()
{
    return Chef::latest()->get();
}
function gallerys(){
    return Gallery::latest()->get();
}
function messages(){
    return Message::latest()->get();
}
function bookedtables(){
    return Booktable::latest()->get();
}
