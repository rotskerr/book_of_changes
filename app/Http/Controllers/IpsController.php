<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use Illuminate\Http\Request;

class IpsController extends Controller
{
    public function index($ips){
        $ip = Ip::where('text', '=', $ips)->first();
        if (is_null($ip)){
           $user = new Ip();
           $user->text = $ips;
           $user->save();
        }
        $count = Ip::count();
        return response()->json($count);
    }
}
