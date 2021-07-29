<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Kinds;
use App\SubTypes;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
class KindsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $result = Kinds::orderby("order","ASC")->get();
        return view('kinds.list');
    }
    public function json(Request $request){
        return Kinds::orderby("order","ASC")->get();
    }
    public function subtypesjson($kinds_id,Request $request){
        return SubTypes::where("kinds_id",$kinds_id)->orderby("order","ASC")->get();
    }
   
    public function add()
    {   $result=[];
        return view("kinds.detail",["result"=>$result]);
    }

    public function addAction(Request $request){
        $arr = BaseController::requestToArr($request->all());
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',

        ]);
     
        if ($validator->fails()) {
            return redirect('/admin/kinds/add')->withErrors($validator)->withInput();
        }
        $result = Kinds::create($arr);
        $id=DB::getPdo()->lastInsertId();

        if($result) {
            return BaseController::redirect("/admin/kinds","Bilgi Eklendi","success");
        } else {
            return BaseController::redirect("back","Bilgi Eklenemedi","error");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        $result = Kinds::where("id",$id)->first();

        return view("kinds.detail",["result"=>$result]);
        
    }
    public function editAction($id,Request $request){
        $arr = BaseController::requestToArr($request->all());
        if(isset($request->imageUrl)) {
         
            $arr["imageUrl"] = $arr["imageUrl"];
        }
       
        $result = Kinds::find($id)->update($arr);

        if($result) {
            return BaseController::redirect("/admin/kinds","Bilgi Düzenlendi","success");
        } else {
            return BaseController::redirect("back","Bilgi Düzenlenemedi.","error");
        }
    }
  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($kinds_id)

    {   $kinds = SubTypes::where("kinds_id",$kinds_id)->orderby("order","ASC")->get();
        $result["kinds_id"] = $kinds_id;
        $result["items"] = $kinds;
        return view("kinds.sublist",["result"=>$result]);
        
    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailEdit($kinds_id,$id)
    {   
        $result = SubTypes::where("id",$id)->first();

        return view("kinds.subdetail",["result"=>$result]);
        
    }
    public function detailAction($kinds_id,$id,Request $request){
        $arr = BaseController::requestToArr($request->all());

        if($request->file("video")!=""){
            $video = BaseController::uploadFile($request->file("video"));
            if(isset($request->video)) {
            
                $arr["video"] = "http://127.0.0.1:8000".$video;
            }
        }
        
        if($request->file("product_receipt")!=""){
            $product_receipt = BaseController::uploadFile($request->file("product_receipt"));
            if(isset($request->product_receipt)) {
            
                $arr["product_receipt"] = "http://127.0.0.1:8000".$product_receipt;
            }
        }
        $result = SubTypes::find($id)->update($arr);

        if($result) {
            return BaseController::redirect("/admin/kinds/$kinds_id","Bilgi Düzenlendi","success");
        } else {
            return BaseController::redirect("back","Bilgi Düzenlenemedi.","error");
        }
    }


    public function detailAdd($kinds_id,Request $request)
    {   $result=[];
        return view("kinds.subdetail",["result"=>$result]);
    }

    public function detailAddAction($kinds_id,Request $request){
        
        $arr = BaseController::requestToArr($request->all());
        $arr["kinds_id"] = $kinds_id;
        if(isset($request->imageUrl)) {
         
            $arr["imageUrl"] = $arr["imageUrl"];
        }
        if(isset($request->video)) {
         
            $arr["video"] = $arr["video"];
        }
        if(isset($request->video_thumb)) {
         
            $arr["video_thumb"] = $arr["video_thumb"];
        }
        $result = SubTypes::create($arr);
        $id=DB::getPdo()->lastInsertId();

        if($result) {
            return BaseController::redirect("/admin/kinds/$kinds_id","Bilgi Eklendi","success");
        } else {
            return BaseController::redirect("back","Bilgi Eklenemedi","error");
        }
    }

    
    public function orderAction(Request $request) {
        $result = json_decode($request->list_order,true);
        foreach($result as $key => $value) {
            if(isset($value["id"])) {
                Kinds::find((int)$value["id"])->update(array("order"=>$key));
            }
        }
        return $request->list_order;
    }
    public function subtypesOrderAction(Request $request) {
        $result = json_decode($request->list_order,true);

        foreach($result as $key => $value) {
            if(isset($value["id"])) {
                SubTypes::find((int)$value["id"])->update(array("order"=>$key));
            }
        }
        dd($request->list_order );
        return $request->list_order;
    }
}
