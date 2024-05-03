<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
        'information',
        'created_at',
        'updated_at'
        
    ];
    public function images(){
        return $this->hasMany(Image::class);
    }


    public function ratings(){
        return $this->belongsToMany(Rating::class);
    }
}
