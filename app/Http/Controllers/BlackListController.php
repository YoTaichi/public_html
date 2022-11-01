<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlackListModel;
use Illuminate\Console\View\Components\Alert;

class BlackListController extends Controller
{
    public function index(){
        $blacklists = BlackListModel::where('user_id' , Auth()->user()->id )->get();
        $data = [
            'blacklists' => $blacklists
        ];
        return view('nav.blacklist', ['data' => $data]);
    }

    public function blacklist(Request $request) {
        $add = $request->all();
        $content = $request->blacklist;
        $id = Auth()->user()->id;
        $blacklist = BlackListModel::where('user_id',$id )->where('blacklist',$content)->get();
        /* dd($blacklist); */

        if(count($blacklist) === 0){
            Auth()->user()->blacklist()->create($add);
        }
        /* $content = $request->validate([
            'blacklist' => 'unique:blacklist,blacklist'
        ]); */
        
        return redirect()->back()->withInput();
    }

    public function blacklist_del(Request $request , $id){
        
        $del = BlackListModel::where('id' , $id)->delete();
        return redirect()->back();
    }
}
