<?php

namespace App\Http\Controllers;

use App\Models\phone_numbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class PostsController extends Controller
{
    public function savePhone(Request $request){
        $newPhone = new phone_numbers;
        $newPhone->user = Auth::user()->name;
        $newPhone->first_name = $request->firstname;
        $newPhone->last_name = $request->lastname;
        $newPhone->phone_number = $request->phonenumber;
        Log::info(json_encode($request->phonenumber));
        $newPhone->save();
        return redirect('/');
    }
}
