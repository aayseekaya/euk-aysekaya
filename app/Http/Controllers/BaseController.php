<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function upload(Request $request){
        return self::singleUpload("files",$request);
    }
    public static function singleUpload($filename, $request) {
        $arr = self::multiUpload($filename,$request);
        return env("APP_URL").$arr[0];
    }
    public static function multiUpload($filename, $request) {
        if($request->hasFile($filename))
        {
            foreach ($request->file($filename) as $file) {
                $arr[] = self::uploadFile($file);
            }
            return $arr;
        }
        return false;
    }
    public static function uploadFile($file) {

        $name = rand(1000000000,999999999999).'.'.$file->getClientOriginalExtension();
        $image['filePath'] = $name;
        $file->move(public_path().'/uploads/', $name);
        return '/uploads/'.$name;
    }
    public static function requestToArr($requestall)
    {
        $newArr = [];
        foreach ($requestall as $key => $value) {
            if(is_null($value)) {
                $newArr[$key] = "";
                //$arr["description_tr"] = str_replace('','',$arr["description_tr"]);
            } else {
                $newArr[$key] = str_replace('"/public','"http://127.0.0.1:8000',$value);
            }
        }
        return $newArr;
    }
    public static function redirect($url = '', $message_text = "", $message_type = "success")
    {
        if($message_text != "") {
            $message = array(
                "message_text" => $message_text,
                "message_type" => $message_type,
            );
            session(["message" => $message]);
        }
        if($url == "back") {
            return back()->withInput();
        } else {
            return redirect($url);
        }
    }
}
