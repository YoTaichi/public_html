<?php

namespace App\Http\Controllers;

use App\Models\MessageModel;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request) {

        $content = $request->validate([

            'message' => 'required',
            'article_id' => 'required'

        ]);
        Auth()->user()->message()->create($content);
        return redirect()->back();
    }

   /*  public function show() {
        return view()

    } */
}
