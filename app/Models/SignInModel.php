<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignInModel extends Model
{
    protected $primaryKey = 'user_id';
    protected $table = 'sign_in';
    protected $fillable = ['user_id', 'count', 'created_at','updated_at' ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
}