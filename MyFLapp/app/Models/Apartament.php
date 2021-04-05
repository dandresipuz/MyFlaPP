<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartament extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'description',
        'slider',
        'price',
        'active',
        'photo',
        'user_id',
        'residential_id',
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function residential(){
        return $this->belongsTo('App\Models\Residential');
    }
}
