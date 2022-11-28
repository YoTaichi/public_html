<?php

namespace App\Http\Controllers;

use App\Models\MessageModel;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {

    
            $requestData = $request->all();
            Auth()->user()->message()->create($requestData);
            return redirect()->back();
     
    }

    /*  public function show() {
        return view()

    } */
}
