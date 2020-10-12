<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Controller for getting all items and rooms from the database tables
class allItemController extends Controller
{
    public function getAllItems($id){
        if ($id == 0){
            $items = DB::table("items")->get();
            return view('data.data', compact('items'));
        }   else {
            $items = DB::table("items")->where("room_id", $id)->get();
            return view('data.data', compact('items'));
        }
    }

    public function items($id){
        $items = DB::table("items")->where("item_type_id", $id)->get();
        return view('data.data', compact('items'));
    }

    public function rooms(){
        $rooms = DB::table("rooms")->get();
        return view('welcome', compact('rooms'));
    }

    public function getItemCat($id){
        echo json_encode(DB::table("item_type")->where("room_id", $id)->get());
    }

    public function getOneItem(Request $request){
        $items = DB::table("items")->where("item_name", $request->name)->get();
        return view('data.item', compact('items'));
    }

}

