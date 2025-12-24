<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTO(Education::class, 'user_id');
    }
}
