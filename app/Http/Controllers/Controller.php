<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;
use App\Models\BlackListModel;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $sex_set ;
    protected $blacklists ;

    public function ball() 
    {
 
        $this->sex_set = Auth()->user()->sex_set;
        $this->blacklists = BlackListModel::where('user_id', Auth()->user()->id)->get();
        
    }


}
