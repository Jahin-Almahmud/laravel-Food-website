<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
  public function setting(){
    return view('dashboard.setting');
  }
  public function settingupdate(Request $request){
    //  return $request;
    $request->validate([
      'address' => 'required|unique:settings',
    ]);
    return back();

  }
}
