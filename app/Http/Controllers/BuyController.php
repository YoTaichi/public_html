<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BlackListModel;
use App\Models\SignInModel;


class BuyController extends Controller
{
    public function gem()
    {
        $user = Auth()->user()->id;
        $sex_set = Auth()->user()->sex_set;
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $yesterday = SignInModel::find($user);
        $yesupdate = $yesterday->updated_at;
        $datecount = $yesterday->count;
        $data = [
            'blacklists' => $blacklists,
            'sex_set' => $sex_set,
            'datecount' => $datecount
        ];
        return view('buygem', ['data' => $data]);
    }

    public function get_paid(Request $request)
    {

        $gem = $request->gem;
        auth()->user()->increment('diamond', $gem);
        return  redirect()->route('buy.gem_index');
    }

    public function get_paid_one()
    {
        $user = Auth()->user()->id;
        $sex_set = Auth()->user()->sex_set;
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $yesterday = SignInModel::find($user);
        $yesupdate = $yesterday->updated_at;
        $datecount = $yesterday->count;
        $data = [
            'blacklists' => $blacklists,
            'sex_set' => $sex_set,
            'datecount' => $datecount
        ];
        return view('googlepay.get_paid_one', ['data' => $data]);
    }
    public function get_paid_two()
    {
        $user = Auth()->user()->id;
        $sex_set = Auth()->user()->sex_set;
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $yesterday = SignInModel::find($user);
        $yesupdate = $yesterday->updated_at;
        $datecount = $yesterday->count;
        $data = [
            'blacklists' => $blacklists,
            'sex_set' => $sex_set,
            'datecount' => $datecount
        ];
        return view('googlepay.get_paid_two', ['data' => $data]);
    }

    // public function get_paid_seven(){
    //     auth()->user()->increment('diamond',10);
    //     return  redirect()->route('buy.gem_index');
    // }
    // public function get_paid_twelve(){
    //     auth()->user()->increment('diamond',10);
    //     return  redirect()->route('buy.gem_index');
    // }
    // public function get_paid_twentyfive(){
    //     auth()->user()->increment('diamond',10);
    //     return  redirect()->route('buy.gem_index');
    // }
    // public function get_paid_fiftytwo(){
    //     auth()->user()->increment('diamond',10);
    //     return  redirect()->route('buy.gem_index');
    // }
    // public function get_paid_eighty(){
    //     auth()->user()->increment('diamond',10);
    //     return  redirect()->route('buy.gem_index');
    // }

    public function money(Request $request)
    {
        $user = Auth()->user()->id;
        $sex_set = Auth()->user()->sex_set;
        $blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        $yesterday = SignInModel::find($user);
        $yesupdate = $yesterday->updated_at;
        $datecount = $yesterday->count;
        $data = [
            'blacklists' => $blacklists,
            'sex_set' => $sex_set,
            'datecount' => $datecount
        ];
        return view('buymoney', ['data' => $data]);
    }

    public function buy_money(Request $request)
    {
        $pay = $request->pay;
        $user = auth()->user();
        $user->increment('money', $pay * 100);
        $user->decrement('diamond', $pay);
        return  redirect()->route('buy.money_index');
    }
}
