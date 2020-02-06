<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class AddressProvider extends Model
{
    use Notifiable , SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'provider_id', 'cep' , 'uf','county' , 'neighborhood' , 'street' , 'number' , 'complement' , 'reference_point'
    ];
}
