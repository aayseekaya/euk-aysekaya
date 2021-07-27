<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\User;
use App\Kinds;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function loginSubmit(Request $request){



        $result = User::where("email",$request->email)->where("password",md5($request->password))->first();

        if($result) {
            $result = Kinds::orderby("order","ASC")->get();
            return view('kinds.list',["result"=>$result]);
        } else {
            return Core::redirect("back","Giriş Yapılamadı","error");
        }
    }

}
