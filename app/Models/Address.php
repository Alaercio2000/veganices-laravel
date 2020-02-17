<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use App\Models\State_brazil;

class Address extends Model
{
    use Notifiable , SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id', 'title' , 'zip_code' , 'state_id','county' , 'neighborhood' , 'street' , 'number' , 'complement' , 'reference_point'
    ];

    public function state(){
        $this->hasOne(State_brazil::class, 'state_id' , 'id');
    }
}
