<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;

class ApiController extends Controller
{
    public function api_fun(Request $request)
    {
        $order=Order::find($request->order_id);
        $order->status=$request->status;
        $order->save();
        return response()->json(["res" =>$request->status], 200);
    }
}
