<?php
/**
 * Created by PhpStorm.
 * User: swifta
 * Date: 10/4/18
 * Time: 10:22 AM
 */

namespace App\Http\Controllers;


class Token extends Controller
{

    /**
     * Token constructor.
     */
    public function __construct()
    {}

    public function generateToken($token){
        return response()->json(base64_encode($token));
    }
}