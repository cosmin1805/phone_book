<?php

namespace App\Http\Controllers;

use App\Models\phone_numbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class PostsController extends Controller
{
    public function savePhone(Request $request){
        $newPhone = new phone_numbers;
        $newPhone->user = Auth::user()->name;
        $newPhone->first_name = $request->firstname;
        $newPhone->last_name = $request->lastname;
        $newPhone->phone_number = $request->phonenumber;
        $newPhone->save();
        return redirect('/');
    }
    public function updatePhone(Request $request){
        $Phone= phone_numbers::find($request->id);
        $Phone->first_name = $request->firstname;
        $Phone->last_name = $request->lastname;
        $Phone->phone_number = $request->phonenumber;
        $Phone->save();
        return redirect("/");
    }
    public function deletePhone(Request $request){
        $id=$request->id;
        $id_array = explode(",",$id);
        foreach($id_array as $value)
        {
           DB::delete('delete from phone_numbers where id = ?',[$value]); 
        }
        return redirect("/");
    }
}
