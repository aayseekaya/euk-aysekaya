<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Core;
use App\Http\Models\Info2ImageModel;
use App\Http\Models\Info2Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class KindsController extends Controller
{
    //
    public function __construct()
    {
        Core::is_login();
    }

    public function index(Request $request){
        // $result["items"] = Info2Model::where("event_id",session("event_id"))->orderby("order_no","ASC")->get();
        // return Core::view("info2.list",$result);
        dd("eeeeeeeee");
        return view('kinds.list');
    }
    public function json(Request $request){
        return Info2Model::where("event_id",info("event_id"))->get();
    }
    public function edit($id,Request $request){
        $result["item"] = Info2Model::where("event_id",session("event_id"))->where("id",$id)->first();
        $result['item']['images'] = Info2ImageModel::where("item_id",$result["item"]->id)->get();
        //dd($result['item']['images']);
        return Core::view("info2.detail",$result);
    }
    public function add(Request $request){
        return Core::view("info2.detail");
    }
    public function editAction($id,Request $request){
        $arr = Core::requestToArr($request->all());
        $result = Info2Model::find($id)->update($arr);
        if(@$arr["imageurl_tr"]!=null) {
            Info2ImageModel::where("item_id",$id)->where("lang","tr")->delete();
            foreach ($arr["imageurl_tr"] as $key => $value) {
                Info2ImageModel::create(["item_id"=>$id,"imageurl"=>$value,"lang"=>"tr"]);
            }
        }
        if(@$arr["imageurl_en"]!=null) {
            Info2ImageModel::where("item_id",$id)->where("lang","en")->delete();
            foreach ($arr["imageurl_en"] as $key => $value) {
                Info2ImageModel::create(["item_id"=>$id,"imageurl"=>$value,"lang"=>"en"]);
            }
        }
        if($result) {
            return Core::redirect("/admin/infos2","Bilgi Düzenlendi","success");
        } else {
            return Core::redirect("back","Bilgi Düzenlenemedi.","error");
        }
    }
    public function addAction(Request $request){
        $arr = Core::requestToArr($request->all());
        $arr["event_id"] = session("event_id");
        $result = Info2Model::create($arr);
        $id=DB::getPdo()->lastInsertId();
        if(@$arr["imageurl_tr"]!=null) {
            Info2ImageModel::where("item_id",$id)->where("lang","tr")->delete();
            foreach ($arr["imageurl_tr"] as $key => $value) {
                Info2ImageModel::create(["item_id"=>$id,"imageurl"=>$value,"lang"=>"tr"]);
            }
        }
        if(@$arr["imageurl_en"]!=null) {
            $id=$result;
            Info2ImageModel::where("item_id",$id)->where("lang","en")->delete();
            foreach ($arr["imageurl_en"] as $key => $value) {
                Info2ImageModel::create(["item_id"=>$id,"imageurl"=>$value,"lang"=>"en"]);
            }
        }

        if($result) {
            return Core::redirect("/admin/infos2","Bilgi Eklendi","success");
        } else {
            return Core::redirect("back","Bilgi Eklenemedi","error");
        }
    }
    public function delete($id) {
        $result = Info2Model::destroy([$id]);
        if($result) {
            return Core::redirect("back","Bilgi Silindi.","success");
        } else {
            return Core::redirect("back","Bilgi Silinemedi.","error");
        }
    }
    public function orderAction(Request $request) {
        $result = json_decode($request->list_order,true);
        foreach($result as $key => $value) {
            if(isset($value["id"])) {
                Info2Model::find((int)$value["id"])->update(array("order_no"=>$key));
            }
        }
        return $request->list_order;
    }
}