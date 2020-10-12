<?php

namespace App\Http\Controllers;
use App\Models\itemInsert;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class itemInsertController extends Controller
{
    use Notifiable;

    public function insert(Request $request) {
        $item = new ItemInsert;

        $item->user_name = $request->name;
        $item->user_email = $request->email;
        $item->user_phoneNumber = $request->phone;
        $item->item_name = $request->item;

       $data = array('item_name'=>$item->item_name, 'user_name'=>$item->user_name, 'user_email'=>$item->user_email,
        'user_PhoneNumber'=>$item->user_phoneNumber);
        DB::table('orders')->insert($data);

        return response("Thanks for Buying!");

    }

};