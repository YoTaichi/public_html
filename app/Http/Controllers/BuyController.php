<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlackListModel;
use App\Models\SignInModel;


class BuyController extends Controller
{
    public function gem(){
        $user = Auth()->user()->id;
        $sex_set = Auth()->user()->sex_set;
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $yesterday = SignInModel::find($user);
        $yesupdate = $yesterday->updated_at;
        $datecount = $yesterday->count;
        $data = [
            'blacklists' => $blacklists,
            'sex_set' =>$sex_set,
            'datecount' => $datecount
        ];
       return view('buygem',['data'=>$data]);
    }

    public function get_paid(){

        auth()->user()->increment('diamond',10);

        return  redirect()->route('buy.gem');
    }

    public function money(){
        $user = Auth()->user()->id;
        $sex_set = Auth()->user()->sex_set;
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $yesterday = SignInModel::find($user);
        $yesupdate = $yesterday->updated_at;
        $datecount = $yesterday->count;
        $data = [
            'blacklists' => $blacklists,
            'sex_set' =>$sex_set,
            'datecount' => $datecount
        ];
       return view('buymoney',['data'=>$data]);
    }

}
