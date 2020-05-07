<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userMonthlyUsage extends Model
{
    //
    protected $fillable = ['user_id', 'used', 'month', 'year'];

}
