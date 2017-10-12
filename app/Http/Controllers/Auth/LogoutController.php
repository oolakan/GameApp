<?php
/**
 * Created by PhpStorm.
 * User: swifta
 * Date: 10/11/17
 * Time: 8:42 PM
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LogoutController  extends Controller
{
    public function logout(){
        \Illuminate\Support\Facades\Auth::logout();
        return view('auth.login');
    }
}
