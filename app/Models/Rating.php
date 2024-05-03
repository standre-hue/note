<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function schools(){
        return $this->belongsToMany(School::class);
    }
}
