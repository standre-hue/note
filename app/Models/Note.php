<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = "notess";
    protected $fillable = [
        'number',
        'rating_id',
        'user_id',
        //'school_id',
        'created_at',
        'updated_at',
        'comment'
        
    ];

    public function rating(){
        return $this->belongsTo(Rating::class);
    }

    public function user(){
        return $this->belongsTo(School::class);
    }
}
