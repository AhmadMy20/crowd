<?php

namespace App;

use App\Traits\UsesUuid as TraitsUsesUuid;
use App\Trits\UsesUuid;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    use TraitsUsesUuid;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
