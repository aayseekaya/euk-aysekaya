<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    {  $result = Kinds::orderby("order","ASC")->get();
    //    dd($result);
        return view('kinds.list',["result"=>$result]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {   $result=[];
        return view("kinds.detail",["result"=>$result]);
    }

    public function addAction(Request $request){
        $arr = BaseController::requestToArr($request->all());
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
    // public function editAction($id,Request $request){
    //     $arr = BaseController::requestToArr($request->all());
    //     $result = Info2Model::find($id)->update($arr);
    //     if(@$arr["imageurl_tr"]!=null) {
    //         Info2ImageModel::where("item_id",$id)->where("lang","tr")->delete();
    //         foreach ($arr["imageurl_tr"] as $key => $value) {
    //             Info2ImageModel::create(["item_id"=>$id,"imageurl"=>$value,"lang"=>"tr"]);
    //         }
    //     }
    //     if(@$arr["imageurl_en"]!=null) {
    //         Info2ImageModel::where("item_id",$id)->where("lang","en")->delete();
    //         foreach ($arr["imageurl_en"] as $key => $value) {
    //             Info2ImageModel::create(["item_id"=>$id,"imageurl"=>$value,"lang"=>"en"]);
    //         }
    //     }
    //     if($result) {
    //         return Core::redirect("/admin/infos2","Bilgi Düzenlendi","success");
    //     } else {
    //         return Core::redirect("back","Bilgi Düzenlenemedi.","error");
    //     }
    // }
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
    public function detailAction($id,Request $request){
        $arr = BaseController::requestToArr($request->all());
        $result = SubTypes::find($id)->update($arr);

        if($result) {
            return BaseController::redirect("/admin/kinds/$id","Bilgi Düzenlendi","success");
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
