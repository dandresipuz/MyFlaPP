<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residential extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'photo',
        'active',
        'phone',
        'address',
        'user_id',
        'city',
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function apartament(){
        return $this->hasMany('App\Models\Apartament');
    }
}
