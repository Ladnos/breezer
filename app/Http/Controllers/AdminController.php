<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function store(Request $request)
    {
        if(Auth::guard('admin')->attempt($request->only('login','password'))){
            $request->session()->regenerate(); 
            return Redirect::route('admin.dashboard');
        }
        return redirect('admin/login')->withErrors(['errors'=>'неверные данные']);
    }

    public function dash()
    {
        $Users = User::all();
        return view('admin.dashboard',['users'=>$Users]);
    }
    public function download($id, $fileName){
        // dd(Storage::exists($id.'\\'.$fileName),$fileName,Storage::path($id)."\\".$fileName);
      
      return Storage::download($id.'\\'.$fileName);

    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('welcome'));
    }

}
